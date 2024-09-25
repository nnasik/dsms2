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

class MovementCardController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $data['frontpages'] = FrontPage::where('user_id',$user_id)->get()->reverse();
        return view('features.movementcard.index')->with($data);
    }

    public function generatePDF(Request $request){
        $request->validate([
            'pages' => 'required|array',
        ]);

        $selectedPages = $request->input('pages');

        

        $data['frontpages'] = $selectedPages;
        
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
        */
        
    }
}
