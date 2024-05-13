<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Auth;
use Session;

class ReservationController extends Controller
{
    public function reservations(){
        return view('features.reservation.reservations');
    }

    public function json(){
        $events = Reservation::select('id', 'name_of_event as title', 'event_date', 'start_time', 'end_time', 'status')
                   ->get()
                   ->map(function ($event) {
                       return [
                           'id' => $event->id,
                           'title' => $event->title,
                           'start' => $event->event_date->format('Y-m-d') . 'T' . $event->start_time, // Combine date and time
                           'end' => $event->event_date->format('Y-m-d') . 'T' . $event->end_time, // Combine date and time
                           'status' =>$event->status,
                       ];
                   });

    return response()->json($events);
    }

    public function create(){
        return view('features.reservation.create');
    }

    public function store(Request $request){
        $request->validate([
            'event_date'=>'required',
            'name_of_event'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'participations'=>'required',
            'note'=>'required',
        ]);

        $reservation = New Reservation;
        
        $reservation->event_date=$request->event_date;
        $reservation->name_of_event=$request->name_of_event;
        $reservation->start_time=$request->start_time;
        $reservation->end_time=$request->end_time;
        $reservation->participations=$request->participations;
        $reservation->note=$request->note;
        $reservation->reserver=Auth::user()->id;
        $reservation->requested_on=now();
        $reservation->save();
        Session::flash('success','Event Requested');

        return redirect()->back();
        //return redirect('/reservation/'.$reservation->id());
    }
}