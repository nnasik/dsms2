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
                            <a href="{{route('frontpage.index')}}">Service Consumer</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item "></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="card">
                    dashboard
                </div>
            </div>
        
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


</div>

@include('features.caseregister.modals.case_register_in')
@endsection
