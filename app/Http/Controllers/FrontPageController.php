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

    public function generatePDF($id){
        $data['frontpage'] = FrontPage::findOrFail($id);
        //return view('features.frontpage.templates.subjectfile')->with($data);
    
        $pdf = new Dompdf();

        $html = view('features.frontpage.templates.subjectfile')->with($data)->render();
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
}
