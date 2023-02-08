<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mail;
use App\Models\Note;

use Session;
use Redirect;
use Auth;
use Validator;

class MailController extends Controller
{
    public function dashboard(){
        // Getting logged in user's info
        $user = Auth::user();
        $user_id = Auth::user()->id;

        //Calculating Dashboard counts
        $today = date("Y-m-d");
        $data['mail_count_all'] = Mail::all()->count();
        $data['mail_count_new'] = Mail::whereDate('date_of_receipt','=',$today)->count();
        $data['mail_count_due'] = Mail::whereDate('expected_date_of_reply' ,'=',$today)->where('status','<>','Replied')->count();
        $data['mail_count_over_due'] = Mail::whereDate('expected_date_of_reply' ,'<',$today)->where('status','<>','Replied')->count();
        $data['mail_count_temporary'] = Mail::where('status','Temporary Reply')->count();
        $data['mail_count_non_assigned'] = Mail::where('assigned_to',NULL)->count();
        $data['mail_count_replied'] = Mail::where('status','Replied')->whereDate('replied_date','=',$today)->count();
        // getting assigned mail for the logged in user.

        $data['my_mails'] = Mail::where('assigned_to',$user->id)->orWhere('subject_officer',$user->id)->get();
        return view('features.mail.dashboard')->with($data);
    }

    public function view($id){
        $mail = Mail::find($id);
        
        // Checking for permissions
        if(!(Auth::user()->hasPermissionTo('manage.mail') || Auth::user()->hasPermissionTo('summary.mail') || $mail->assigned_to == Auth::user()->id || $mail->subject_officer == Auth::user()->id)){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }
        
        $data['mail'] = $mail;
        $data['users'] = User::where('status','Active')->get();
        $data['notes'] = $mail->notes->reverse();
        return view('features.mail.view')->with($data);
    }

    public function new(){
        if(!Auth::user()->hasPermissionTo('manage.mail')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $data['users'] = User::where('status','Active')->get();
        return view('features.mail.new')->with($data);
    }

    public function add(Request $request){
        $user = Auth::user();
        $user_id = Auth::user()->id;

        if(!Auth::user()->hasPermissionTo('manage.mail')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $request->validate([
            'inward_mode'=>'required',
            'inward_register_reference'=>'required',
            'date_in_letter'=>'required',
            'date_of_receipt'=>'required',
            'expected_date_of_reply'=>'required',
            'from_whom'=>'required',
            'subject'=>'required',
            'letter_no'=>'required',
        ]);

        $assigned_officer = User::find($request->assigned_to);

        $mail = New Mail;
        $mail->inward_mode = $request->inward_mode;
        $mail->inward_register_reference = $request->inward_register_reference;

        $mail->date_in_letter = $request->date_in_letter;
        $mail->date_of_receipt = $request->date_of_receipt;
        $mail->expected_date_of_reply = $request->expected_date_of_reply;

        $mail->from_whom = $request->from_whom;
        $mail->letter_no = $request->letter_no;
        $mail->subject = $request->subject;

        $mail->user_id = $user_id;
        $mail->assigned_to = $request->assigned_to;
        
        $mail->status = 'Created';
        $mail->save();

        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;
        $note->body = 'Mail entered';
        $mail->notes()->save($note);

        Session::flash('success','Mail created, Please upload scan copy');
        return redirect('/mail/view/'.$mail->id);
    }

    public function update(Request $request){
        $user = Auth::user();

        if(!Auth::user()->hasPermissionTo('manage.mail')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;

        $request->validate([
            'id'=>'required',
            'inward_mode'=>'required',
            'inward_register_reference'=>'required',
            'date_in_letter'=>'required',
            'date_of_receipt'=>'required',
            'expected_date_of_reply'=>'required',
            'from_whom'=>'required',
            'subject'=>'required',
            'letter_no'=>'required'
        ]);        

        $mail = Mail::find($request->id);
        $mail->inward_mode = $request->inward_mode;
        $mail->inward_register_reference = $request->inward_register_reference;

        $mail->date_in_letter = $request->date_in_letter;
        $mail->date_of_receipt = $request->date_of_receipt;
        $mail->expected_date_of_reply = $request->expected_date_of_reply;

        $mail->from_whom = $request->from_whom;
        $mail->letter_no = $request->letter_no;
        $mail->subject = $request->subject;

        $mail->user_id = $user_id;

        if ($mail->status=='Created') {
            $mail->save();
            // Creating Note
            $note = new Note;
            $note->user_id = $user_id;
            $note->body = 'Mail inward details updated';
            $mail->notes()->save($note);

            Session::flash('success','Mail inward details updated');
        }
        else {
            Session::flash('danger',"Can't update details after assigned");
        }
        
        return Redirect::back();
    }

    public function assign(Request $request){

        if(!Auth::user()->hasPermissionTo('manage.mail')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $request->validate([
            'id'=>'required',
            'assigned_to'=>'required'
        ]);

        $user = Auth::user();
        $user_id = Auth::user()->id;

        $mail = Mail::find($request->id);
        $mail->assigned_to = $request->assigned_to;
        $mail->note_to_assigned_officer = $request->note_to_assigned_officer;
        $mail->assigned_on = date('Y-m-d H:i:s');
        $mail->status = 'Assigned';
        $mail->save();

        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;
        $note->body = 'Mail assigned to ' .$mail->assignedTo->name. "(".$mail->assignedTo->designation.")";
        $mail->notes()->save($note);

        Session::flash('success',$note->body);
        return Redirect::back();
    }

    public function assignSubjectOfficer(Request $request){

        $request->validate([
            'id'=>'required',
            'subject_officer'=>'required'
        ]);

        $mail = Mail::find($request->id);

        if(!$mail->assigned_to == Auth::user()->id){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $user = Auth::user();
        $user_id = Auth::user()->id;

        $mail->subject_officer = $request->subject_officer;
        $mail->subject_officer_on = date('Y-m-d H:i:s');
        $mail->note_to_subject_officer = $request->note_to_subject_officer;
        $mail->save();

        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;
        $note->body = 'Subject officer assigned.( ' .$mail->subjectOfficer->name. "(".$mail->subjectOfficer->designation.")";
        $mail->notes()->save($note);

        Session::flash('success',$note->body);
        return Redirect::back();
    }

    public function uploadDocument(Request $request){

        if(!Auth::user()->hasPermissionTo('manage.mail')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }
        
        $validator = Validator::make($request->all(),[
            'id'=>'required',
            'document'=>'required|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:10240',
            'document_no'=>'required'
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $mail = Mail::find($request->id);
        
        if (isset($request->id)) {
            $document = $mail->id."_".$request->document_no.".".$request->document->extension();
            $request->document->storeAs('public/mail/', $document);
            if($request->document_no==1){
                $mail->document_1 = $document;
            }
            elseif($request->document_no==2){
                $mail->document_2 = $document;
            }
            
            $mail->save();
        }

        Session::flash('success','Mail document upload success');
        return Redirect::back();
    }

    public function upload_reply_document(Request $request){

        $validator = Validator::make($request->all(),[
            'id'=>'required',
            'reply_document'=>'required|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:10240',
            'reply_document_no'=>'required'
        ]);

        $mail = Mail::find($request->id);

         // Checking for permissions
        if(!($mail->assigned_to == Auth::user()->id || $mail->subject_officer == Auth::user()->id)){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $mail = Mail::find($request->id);
        
        if (isset($request->id)) {
            $reply_document = "r_".$mail->id."_".$request->reply_document_no.".".$request->reply_document->extension();
            $request->reply_document->storeAs('public/mail/', $reply_document);
            if ($request->reply_document_no==1) {
                $mail->reply_document_1 = $reply_document;
            }
            elseif($request->reply_document_no==2){
                $mail->reply_document_2 = $reply_document;
            }
            
            $mail->save();
        }

        Session::flash('success','Upload Success');
        return Redirect::back();
    }

    public function update_reply(Request $request){

        $request->validate([
            'mail_id'=>'required',
            'status'=>'required',
            'outward_mode'=>'required',
            'file_no'=>'required',
            'outward_register_reference'=>'required',
            'replied_date'=>'required'
        ]);

        $mail = Mail::find($request->mail_id);

         // Checking for permissions
        if(!($mail->assigned_to == Auth::user()->id || $mail->subject_officer == Auth::user()->id)){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;

        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;

        $note->body = 'Mail status changed. '.$mail->status.' --> ';
        $mail->status = $request->status;
        $mail->outward_mode = $request->outward_mode;
        $mail->file_no = $request->file_no;
        $mail->outward_register_reference = $request->outward_register_reference;
        $mail->replied_date = $request->replied_date;
        $mail->reply_note = $request->reply_note;
        $mail->save();
        
        $note->body = $note->body .$mail->status. " with outward register reference - ". $request->outward_register_reference . " on ". $request->replied_date;
        $mail->notes()->save($note);

        Session::flash('success','Updated');
        return Redirect::back();
    }

    public function remove(Request $request){

    }

    public function allMails(){
        $data['heading'] = 'All Mails';
        $data['mails'] = Mail::all()->reverse();
        return view('features.mail.list')->with($data);
    }

    public function newMails(){
        $today = date("Y-m-d");
        $data['mails'] = Mail::whereDate('date_of_receipt','=',$today)->get();
        $data['heading'] = "New Mails";
        return view('features.mail.list')->with($data);
    }

    public function dueMails(){
        $today = date("Y-m-d");
        $data['mails'] = Mail::whereDate('expected_date_of_reply','=',$today)->get();
        $data['heading'] = "Due Mails";
        return view('features.mail.list')->with($data);
    }

    public function overdueMails(){
        $today = date("Y-m-d");
        $data['mails'] = Mail::whereDate('expected_date_of_reply' ,'<',$today)->where('status','<>','Replied')->get();
        $data['heading'] = "Over Due Mails";
        return view('features.mail.list')->with($data);
    }

    public function repliedMails(){
        $today = date("Y-m-d");
        $data['mails'] = Mail::where('status','Replied')->whereDate('replied_date','=',$today)->get();
        $data['heading'] = "Replied Mails";
        return view('features.mail.list')->with($data);
    }

    public function temporaryRepliedMails(){
        $today = date("Y-m-d");
        $data['mails'] = Mail::where('status','Temporary Reply')->get();
        $data['heading'] = "Temporary Replied Mails";
        return view('features.mail.list')->with($data);
    }

    public function nonAssignedMails(){
        $today = date("Y-m-d");
        $data['mails'] = Mail::where('assigned_to',NULL)->get();
        $data['heading'] = "Non Assigned Mails";
        return view('features.mail.list')->with($data);
    }
}
