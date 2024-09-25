<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseRegisterEntry;
use App\Models\FrontPage;
use Auth;
use Session;
use Redirect;


class CaseRegisterController extends Controller
{
    public function index(){
    $user = Auth::user();
    
    $data['case_register_sub_files'] = CaseRegisterEntry::where('owner', $user->id)
    ->whereHas('file', function ($query){
        // Add conditions here for the File model
        $query->where('type', 'subjectfile');
    })->get();

    $data['case_register_personal_files'] = CaseRegisterEntry::where('owner', $user->id)
    ->whereHas('file', function ($query){
        // Add conditions here for the File model
        $query->where('type', 'personalfile');
    })->get();

    $data['case_register_registers'] = CaseRegisterEntry::where('owner', $user->id)
    ->whereHas('file', function ($query){
        // Add conditions here for the File model
        $query->where('type', 'register');
    })->get();

    //$data['case_register_registers'] = CaseRegisterEntry::where('owner', $user->id)->where('type','registers')->get();
    
    
    $case_register_entry_ids = CaseRegisterEntry::where('owner', $user->id)->pluck('front_page_id');
    $documents = FrontPage::where('user_id', $user->id)->get();
    
    $filteredDocuments = $documents->filter(function ($document) use ($case_register_entry_ids) {
        return !$case_register_entry_ids->contains($document->id);
    });
    $data['filteredDocuments'] = $filteredDocuments;

    return view('features.caseregister.index')->with($data);
}

    public function store(Request $request){
        $request->validate([
            'front_page_id'=>'required',
            'incoming_type'=>'required',
            'incoming_date'=>'required',
        ]);

        $case_register_entry = New CaseRegisterEntry;
        $case_register_entry->front_page_id = $request->front_page_id;
        $case_register_entry->incoming_type = $request->incoming_type;
        if ($request->incoming_type=='Officers') {
            $case_register_entry->incoming_from = $request->incoming_from;
        }
        elseif ($request->incoming_type=='Other') {
            $case_register_entry->incoming_from_custom = $request->incoming_other;
        }
        $case_register_entry->incoming_date = $request->incoming_date;
        $case_register_entry->owner = Auth::user()->id;
        $case_register_entry->save();

        $request->session()->flash('success', 'Added to Case Register');
        return Redirect::back();
    }
}
