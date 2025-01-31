<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Format;
use Dompdf\Dompdf;
use Dompdf\Options;

class FormatController extends Controller{
    public function index(){
        return view('features.format.index');
    }

    public function pubMeetingPDF(Request $request){

        $pdf = new Dompdf();
        $data['program_name'] = $request->program_name;
        $data['venue'] = $request->venue;
        $data['date'] = $request->date;
        $data['time'] = $request->time;
        $data['header_line'] = $request->header_line;
        $data['rows'] = $request->rows;
        $data['no_of_participants'] = 50;
        if (isset($request->no_of_participants)) {
            $data['no_of_participants'] = $request->no_of_participants;
        }
        $data['numbered'] = $request->numbered;

        //$html = view('features.format.pdf.pub_attendance')->with($data)->render();
        $html = view('features.format.pdf.pub_attendance',['title' => 'Public Meeting Attendance'])->with($data)->render();
        $pdf->loadHtml($html);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

         
        
        $pdf->setOptions($options);
        
        $pdf->setBasePath(public_path());

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        // Create a response with PDF content and appropriate headers
        return new Response($pdf->output(),200,[
            'Content-Type'=> 'application/pdf',
            'Content-Disposition' => 'inline; filename="Attendance_Public_Meeting.pdf"',
        ]);
    }

    public function intMeetingPDF(Request $request){

        $pdf = new Dompdf();
        $data['program_name'] = $request->program_name;
        $data['venue'] = $request->venue;
        $data['date'] = $request->date;
        $data['time'] = $request->time;
        $data['header_line'] = $request->header_line;
        $data['rows'] = $request->rows;
        $data['no_of_participants'] = 50;
        if (isset($request->no_of_participants)) {
            $data['no_of_participants'] = $request->no_of_participants;
        }
        $data['numbered'] = $request->numbered;

        //$html = view('features.format.pdf.pub_attendance')->with($data)->render();
        $html = view('features.format.pdf.int_attendance',['title' => 'Internal Meeting Attendance'])->with($data)->render();
        $pdf->loadHtml($html);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

         
        
        $pdf->setOptions($options);
        
        $pdf->setBasePath(public_path());

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        // Create a response with PDF content and appropriate headers
        return new Response($pdf->output(),200,[
            'Content-Type'=> 'application/pdf',
            'Content-Disposition' => 'inline; filename="Attendance_Internal_Meeting.pdf"',
        ]);
    }

    public function trainingAttendancePDF(Request $request){

        $pdf = new Dompdf();
        $data['program_name'] = $request->program_name;
        $data['venue'] = $request->venue;
        $data['date'] = $request->date;
        $data['header_line'] = $request->header_line;
        $data['rows'] = $request->rows;
        $data['no_of_participants'] = 50;
        if (isset($request->no_of_participants)) {
            $data['no_of_participants'] = $request->no_of_participants;
        }
        $data['numbered'] = $request->numbered;

        //$html = view('features.format.pdf.pub_attendance')->with($data)->render();
        $html = view('features.format.pdf.traning_attendance',['title' => 'Training Attendance'])->with($data)->render();
        $pdf->loadHtml($html);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

         
        
        $pdf->setOptions($options);
        
        $pdf->setBasePath(public_path());

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        // Create a response with PDF content and appropriate headers
        return new Response($pdf->output(),200,[
            'Content-Type'=> 'application/pdf',
            'Content-Disposition' => 'inline; filename="Attendance_Training.pdf"',
        ]);
    }
}
