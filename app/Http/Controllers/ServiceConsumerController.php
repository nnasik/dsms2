<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceConsumerController extends Controller
{
    public function index(){
        return view('features.cx.index');
    }

    public function find(){
        return view('features.cx.find');
    }
    public function create($id){
        $data['id'] = $id;
        return view('features.cx.create')->with($data);
    }

    public function show($id){
        
    }

    public function store(Request $request){
        $request->validate([
            'nic'=>'required',
            'sc_name'=>'required',
            'serviceID'=>'required',
            'phone'=>'required'
        ]);

        
    }

    public function update(){

    }

    public function getAllServices($keyword){
        $services = Service::where('name', 'LIKE', "%$keyword%")
        ->orWhere('branch', 'LIKE', "%$keyword%")
        ->get();
        return response()->json($services);
    }
    
}
