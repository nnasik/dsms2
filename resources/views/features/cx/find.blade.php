@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h3 class="m-0">Service Consumers</h3>
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('cx.index')}}">Service Consumer</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>

            <div class="row mt-3">
                <div class="col-md-8 offset-md-2">
                    <form action="{{route('cx.find')}}" method="get">
                        <div class="input-group">
                            <input type="search" name="keyword" value="{{$keyword}}" class="form-control form-control-lg" placeholder="Search NIC or Phone" autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-3">
                <div class="card p-3">
                    <h5 class="">Service Consumers</h5>
                    <!-- Consumer Card -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="">
                                            <h4 class="mb-0">{{$service_requests->count() > 0 ? $service_requests->last()->cs_name : 'Not Set'}}</h4>
                                            <p class="text-muted mt-0">{{$service_requests->count() > 0 ? $service_requests->last()->cs_nic : 'Not Set'}}</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span>
                                                            {{$service_requests->count() > 0 ? $service_requests->last()->cs_phone : 'Not Set'}}</li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-calendar"></i></span>
                                                            {{$service_requests->count()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">

                                        <a href="/" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus"></i> New Complaint
                                        </a>
                                        <a href="{{route('cx.create',$keyword)}}" class="btn btn-sm bg-teal">
                                            <i class="fas fa-plus"></i> New SR
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Consumer Card End -->

                </div>

            </div>

            <div class="row">
                <div class="card p-3">
                    <h5 class="">Service Requests</h5>
                    <!-- SR Card -->
                    <div class="row">
                        @foreach($service_requests as $service_request)
                        <div class="col-lg-4">
                            
                            <div class="card d-flex flex-fill">
                                
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="">
                                            <ul class="ml-4 mb-0 fa-ul ">
                                                <li class="small my-2"><span class="fa-li"><i
                                                    class="fas fa-lg fa-ticket"></i></span>
                                                    SR No : {{$service_request->id}}</li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                        class="fas fa-lg fa-check"></i></span>
                                                        Status : 
                                                        @if ($service_request->status=='Completed')
                                                            <span class="badge bg-success">
                                                        @elseif ($service_request->status=='Deferred')
                                                            <span class="badge bg-secondary">
                                                        @elseif ($service_request->status=='Rejected')
                                                            <span class="badge bg-danger">
                                                        @elseif ($service_request->status=='Cancelled')
                                                            <span class="badge bg-info">
                                                        @else
                                                            <span class="badge bg-warning">
                                                        @endif
                                                        {{$service_request->status}}</span></li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-calendar"></i></span>
                                                    SR Created : {{$service_request->opened_on}}
                                                
                                                    
                                                <div id="elapsed-time" data-created-at="{{ $service_request->opened_on }}"></div>
                                                
                                                
                                                </li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-user"></i></span>
                                                            Name : {{$service_request->cs_name}}</li>
                                                
                                                
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-location-dot"></i></span>Assigned To : {{isset($service_request->Service->assigedTo) ? $service_request->service->assigedTo->name : ''}}
                                                </li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-info"></i></span>
                                                    Service Info : {{isset($service_request->Service) ? $service_request->service->name : ''}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">

                                        <a href="{{route('cx.sr.view',$service_request->id)}}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-user"></i> View SR
                                        </a>
                                        <a href="#" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#close-sr-modal" onclick="closeModal('{{$service_request->id}}')">
                                            <i class="fas fa-edit"></i> Update SR
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                    <!-- SR Card End -->
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


</div>

@include('features.cx.modals.update_sr')

<script>
    function closeModal(id){
        document.getElementById("sr_id").value = id;
    }
</script>
@endsection
