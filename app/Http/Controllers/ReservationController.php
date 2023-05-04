<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservations(){
        return view('features.reservation.reservations');
    }

    public function reservation_json(){
        $reservations=Reservation::all();
        return response()->json($reservations);
    }

    public function new(){
        return view('features.reservation.new');
    }

    public function add(Request $request){
        $request->validate([
            'resource'=>'required',
            'from'=>'required',
            'to'=>'required',
            'event'=>'required',
        ]);
        
        $reservation->resource=$request->resource;
        $reservation->from=$request->from;
        $reservation->to=$request->to;
        $reservation->event=$request->event;
        $reservation->request_on=$request->request_on;
        $reservation->reserver=Auth::user()->id;
        $reservation->request_on=now();
        $reservation->status=='Requested';
        $reservation->save();
        Session::flash();

        return redirect('/reservation/'.$reservation->id());
    }
}