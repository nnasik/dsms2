<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\ServiceRequestUpdate;
use App\Rules\CxSearchRule;
use Carbon\Carbon;
use Auth;
use Session;

class ServiceConsumerController extends Controller
{
    public function index(){
        $data['startOfDay']=Carbon::now()->startOfDay();
        $data['endOfDay']=Carbon::now()->endOfDay();

        // Getting SR Count
        $data['sr_count_today'] = ServiceRequest::whereBetween('opened_on',[
            $data['startOfDay'],
            $data['endOfDay']
        ])->get()->count();

        $data['sr_count_total'] = ServiceRequest::all()->count();
        // End of SR Count

        $data['service_requests'] = ServiceRequest::whereBetween('opened_on',[
            $data['startOfDay'],
            $data['endOfDay']
        ])->get();

        return view('features.cx.index')->with($data);
    }

    public function dashboard(){
        $data['startOfDay']=Carbon::now()->startOfDay();
        $data['endOfDay']=Carbon::now()->endOfDay();
        $data['startOfMonth']=Carbon::now()->startOfMonth();
        $data['endOfMonth']=Carbon::now()->endOfMonth();
        $data['startOfYear']=Carbon::now()->startOfYear();
        $data['endOfYear']=Carbon::now()->endOfYear();

        // Getting SR Count
        $data['sr_count_today'] = ServiceRequest::whereBetween('opened_on',[
            $data['startOfDay'],
            $data['endOfDay']
        ])->get()->count();

        $data['sr_count_this_month'] = ServiceRequest::whereBetween('opened_on',[
            $data['startOfMonth'],
            $data['endOfMonth']
        ])->get()->count();

        $data['sr_count_this_year'] = ServiceRequest::whereBetween('opened_on',[
            $data['startOfYear'],
            $data['endOfYear']
        ])->get()->count();
        
        $data['sr_count_total'] = ServiceRequest::all()->count();
        // End of SR Count

        // Getting Closed Count
        $data['service_provided_today'] = ServiceRequest::where('status','Service Provided')->whereBetween('opened_on',[
            $data['startOfDay'],
            $data['endOfDay']
        ])->get()->count();

        $data['service_provided_this_month'] = ServiceRequest::where('status','Service Provided')->whereBetween('opened_on',[
            $data['startOfMonth'],
            $data['endOfMonth']
        ])->get()->count();

        $data['service_provided_this_year'] = ServiceRequest::where('status','Service Provided')->whereBetween('opened_on',[
            $data['startOfYear'],
            $data['endOfYear']
        ])->get()->count();
        
        $data['service_provided_total'] = ServiceRequest::where('status','Service Provided')->get()->count();
        // End of Closed Count

        // Getting data for Pie Chart
        $data['sr_count_today_open'] = ServiceRequest::whereBetween('opened_on',[
            $data['startOfDay'],
            $data['endOfDay']
        ])->where('status','Open')->get()->count();

        $data['sr_count_today_completed'] = ServiceRequest::whereBetween('opened_on',[
            $data['startOfDay'],
            $data['endOfDay']
        ])->where('status','Completed')->get()->count();

        $data['sr_count_today_others'] = $data['sr_count_today'] - $data['sr_count_today_open'] - $data['sr_count_today_completed'];
        // End of Pie Chart

        // Count for Repearing SR
        $data['repeating_sr'] = ServiceRequest::select('cs_nic')->groupBy('cs_nic')->havingRaw('COUNT(*) > 1')->count();


        $data['service_requests'] = ServiceRequest::whereBetween('opened_on',[
            $data['startOfDay'],
            $data['endOfDay']
        ])->get();

        return view('features.cx.dashboard')->with($data);
    }

    public function find(Request $request){
        $request->validate([
            'keyword'=>['required',new CxSearchRule()]
        ]);
        $data['keyword']=$request->keyword;
        $data['service_requests'] = ServiceRequest::where('cs_nic',$request->keyword)->orWhere('cs_phone',$request->keyword)->get()->reverse();

        return view('features.cx.find')->with($data);
    }
    public function create($keyword){
        $data['phone'] = "";
        $data['nic'] = "";
        $data['name'] = "";

        // Check if it starts with 0 and is exactly 10 characters (Phone Number)
        if (strlen($keyword) === 10 && $keyword[0] === '0') {
            $data['phone'] = $keyword;
        } 
        // Check if it is 10 characters long and ends with 'V', 'v', 'X', or 'x' (NIC Number)
        elseif (strlen($keyword) === 10 && in_array(strtolower($keyword[9]), ['v', 'x'])) {
            $data['nic'] = $keyword;
        } 
        // Check if it contains exactly 12 numeric characters (NIC Number)
        elseif (ctype_digit($keyword) && strlen($keyword) === 12) {
            $data['nic'] = $keyword;
        }

        $sr = ServiceRequest::where('cs_nic',$keyword)->orWhere('cs_phone',$keyword)->get();

        if ($sr->count() > 0) {
            if ($data['phone']=="") $data['phone']=$sr->last()->cs_phone;
            if ($data['nic']=="") $data['nic']=$sr->last()->cs_nic;
            if ($data['name']=="") $data['name']=$sr->last()->cs_name;
        }

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

        $service = Service::findOrFail($request->serviceID);

        $service_request = New ServiceRequest();
        $service_request->cs_name = $request->sc_name;
        $service_request->cs_phone = $request->phone;
        $service_request->cs_nic = $request->nic;
        $service_request->service_requested = $request->serviceID;
        $service_request->opened_on = now();
        $service_request->opened_by = Auth::user()->id;
        $service_request->status = 'Open';
        $service_request->save();

        $sr_update = New ServiceRequestUpdate();
        $sr_update->service_request_id = $service_request->id;
        $sr_update->update_by = Auth::user()->id;
        $sr_update->status = $service_request->status;
        $sr_update->note = "Service Request Opened by " . Auth::user()->name . "(" . Auth::user()->designation . ") on " . NOW();
        $sr_update->save();

        Session::flash('success','Successfully created new service request');
        return redirect('/cx');
    }

    public function getAllServices($keyword){
        $services = Service::where('name', 'LIKE', "%$keyword%")
        ->orWhere('branch', 'LIKE', "%$keyword%")
        ->get();
        return response()->json($services);
    }

    public function srs( $type=null, $from=null, $to=null){
        $query = ServiceRequest::query();
        if ($from=='any' && $to=='any'){
        }
        elseif ($from && $to) {
            $query->whereBetween('opened_on',[$from,$to]);
        }

        if ($type=='all') {
            
        }elseif ($type=='pending') {
            $query->where('status','!=','Provided');
        }elseif ($type=='repeating') {
            $query->select('cs_nic')->groupBy('cs_nic')->havingRaw('COUNT(*) > 1');
        }
        else{
            $query->where('status', $type);
        }
        $data['service_requests'] = $query->orderBy('created_at','desc')->get();

        return view('features.cx.srs')->with($data);
    }

    public function updateSR(Request $request){
        $request->validate([
            'sr_id' => 'required',
            'status' => 'required',
            'note' => 'required'
        ]);

        // Updating Service Request
        $sr = ServiceRequest::find($request->sr_id);
        $sr->status = $request->status;
        if ($sr->status=='complete'){
            $sr->closed_on = now();
            $sr->closed_by = Auth::user()->id;
        }
        $sr->save();

        // Creating Service Request Update
        $sr_update = New ServiceRequestUpdate();
        $sr_update->service_request_id = $sr->id;
        $sr_update->update_by = Auth::user()->id;
        $sr_update->note = $request->note;
        $sr_update->status = $sr->status;
        $sr_update->save();

        Session::flash('success','Service request updated');
        return redirect()->back();
    }

    public function viewSR($id){
        $service_request = ServiceRequest::findOrFail($id);
        $data['service_request'] = $service_request;
        $data['updates'] = ServiceRequestUpdate::where('service_request_id',$id)->with('user')->get()->reverse();
        //dd($updates);

        return view('features.cx.sr')->with($data);
    }
}