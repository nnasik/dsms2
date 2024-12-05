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

            <div class="row">
                <div class="card">
                    <div class="m-3 row">
                        <div class="col-lg-11">
                            <input class=" form-control" type="text" name="keyword" id="keyword"
                                placeholder="Search S/R No |  NIC | Phone No.">
                        </div>
                        <div class="col-lg-1">
                            <input class="btn btn-primary" type="button" value="Find">
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="card p-3">
                    <h5 class="">Service Consumers</h5>
                    <!-- Consumer Card -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="">
                                            <h4 class="mb-0">Service Consumer Name</h4>
                                            <p class="text-muted mt-0">987654321V</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-location-dot"></i></span> #365, Main
                                                    Street, Oddamavadi</li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span>
                                                    0771234567</li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-calendar"></i></span>
                                                    02</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">

                                        <a href="/" class="btn btn-sm btn-primary">
                                            <i class="fas fa-clock"></i> View SR History
                                        </a>
                                        <a href="{{route('cx.create','123')}}" class="btn btn-sm bg-teal">
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
                        <div class="col-lg-4">
                            <div class="card bg-warning d-flex flex-fill">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="">
                                            <h2 class=" lead mb-0"><b>Service Consumer Name</b></h2>
                                            <p class=" mt-0"><b>10-032 </b><span class="badge bg-warning">Open</span>
                                            </p>
                                            <ul class="ml-4 mb-0 fa-ul ">
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-calendar"></i></span>
                                                    SR Created : 2024-10-03 10:23</li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-location-dot"></i></span>Assigned To :
                                                    Thasim CRPO
                                                </li>
                                                <li class="small my-2"><span class="fa-li"><i
                                                            class="fas fa-lg fa-info"></i></span>
                                                    Service Info : </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">

                                        <a href="/" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View SR
                                        </a>
                                        <a href="#" class="btn btn-sm bg-danger">
                                            <i class="fas fa-close"></i> Close SR
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SR Card End -->
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


</div>

@include('features.caseregister.modals.case_register_in')
@endsection
