<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\FrontPage;
use Dompdf\Dompdf;
use Dompdf\Options;
use Session;
use Redirect;
use Auth;
use App\Services\NumberToWordsService;


class FrontPageController extends Controller{


    public function index(){
        $user_id = Auth::user()->id;
        $data['frontpages'] = FrontPage::where('user_id',$user_id)->get()->reverse();
        return view('features.frontpage.index')->with($data);
    }

    public function storeSubjectFile(Request $request){
        $request->validate([
            'type'=>'required',
            'file_no'=>'required',
            'branch'=>'required',
            'heading'=>'required'
        ]);

        $front_page = New FrontPage;
        $front_page->type = $request->type;
        $front_page->file_no = $request->file_no;
        $front_page->branch = $request->branch;
        $front_page->heading = $request->heading;
        $front_page->sub_heading = $request->sub_heading;
        $front_page->year = $request->year;
        $front_page->user_id = Auth::user()->id;

        $front_page->save();

        Session::flash('success','Front page saved');
        //return redirect()->route('frontpage.index');
        return redirect()->back();
    }

    public function storePersonalFile(Request $request){
        $request->validate([
            'type'=>'required',
            'name_of_the_officer'=>'required',
            'designation'=>'required',
            'dob'=>'required',
            'nic'=>'required',
            'date_of_appointment'=>'required',
            'wnop_no'=>'required',
            'date_of_increment'=>'required',
            'date_of_retirement'=>'required',
            'private_address'=>'required',
        ]);

        $front_page = New FrontPage;
        $front_page->type = $request->type;
        $front_page->file_no = $request->file_no;

        $front_page->branch = "ADMINISTRATION BRANCH";
        $front_page->heading = "Personal File";
        
        $front_page->name_of_the_officer = $request->name_of_the_officer;
        $front_page->designation = $request->designation;
        $front_page->dob = $request->dob;
        $front_page->nic = $request->nic;
        $front_page->date_of_appointment = $request->date_of_appointment;
        $front_page->appoint_letter_no = $request->appoint_letter_no;
        $front_page->wnop_no = $request->wnop_no;
        $front_page->date_of_increment = $request->date_of_increment;
        $front_page->date_of_retirement = $request->date_of_retirement;
        $front_page->private_address = $request->private_address;
        
        $front_page->user_id = Auth::user()->id;

        $front_page->save();

        Session::flash('success','Personal saved');
        
        return redirect()->back();
    }

    public function generatePDF($id){
        $frontpage = FrontPage::findOrFail($id);
        $data['frontpage'] = $frontpage;
    
        $pdf = new Dompdf();

        
        if($frontpage->type=='personalfile') {
            $html = view('features.frontpage.templates.personalfile')->with($data)->render();
        }
        elseif($frontpage->type=='subjectfile') {
            $html = view('features.frontpage.templates.subjectfile')->with($data)->render();
        }
        elseif($frontpage->type=='register') {
            $html = view('features.frontpage.templates.register')->with($data)->render();
        }
        
        
        $pdf->loadHtml($html);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        //$options->set('defaultFont', 'Helvetica');
        $pdf->setOptions($options);
        
        $pdf->setBasePath(public_path());

        
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Create a response with PDF content and appropriate headers
        return new Response($pdf->output(),200,[
            'Content-Type'=> 'application/pdf',
        ]);
        
    }

    public function sheetsPdf(Request $request){
        $request->validate([
            'sheet_page_id'=>'required',
            'no_of_sheets'=>'required',
            'no_of_name_list_sheets'=>'required',
            'no_of_total_sheets'=>'required',
            'prepared_by'=>'required',
            'checked_by'=>'required',
            'certified_by'=>'required',
        ]);

        $frontpage = FrontPage::findOrFail($request->sheet_page_id);
        $data['frontpage'] = $frontpage;
        $data['request'] = $request;

        $numberToWordsService = new NumberToWordsService();
        $data['no_of_sheets_in_words'] = $numberToWordsService->convert($request->no_of_sheets);
        $data['no_of_name_list_sheets_in_words'] = $numberToWordsService->convert($request->no_of_name_list_sheets);
        $data['no_of_total_sheets_words'] = $numberToWordsService->convert($request->no_of_total_sheets);
    
        $pdf = new Dompdf();
        $html = view('features.frontpage.templates.sheets')->with($data)->render();
        $pdf->loadHtml($html);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        //$options->set('defaultFont', 'Helvetica');
        $pdf->setOptions($options);
        
        $pdf->setBasePath(public_path());

        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Create a response with PDF content and appropriate headers
        return new Response($pdf->output(),200,[
            'Content-Type'=> 'application/pdf',
        ]);
        
    }
    
    public function minutesPdf($id){

        $frontpage = FrontPage::findOrFail($id);
        $data['frontpage'] = $frontpage;

        $pdf = new Dompdf();
        $html = view('features.frontpage.templates.minutes')->with($data)->render();
        $pdf->loadHtml($html);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        $pdf->setOptions($options);
        
        $pdf->setBasePath(public_path());

        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Create a response with PDF content and appropriate headers
        return new Response($pdf->output(),200,[
            'Content-Type'=> 'application/pdf',
        ]);
        
    }
}
