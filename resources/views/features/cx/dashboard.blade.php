@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
            
            <div class="row mt-3">
                <div class="col-md-8 offset-md-2">
                    <form action="{{route('cx.find')}}" method="get">
                        <div class="input-group">
                            <input type="search" name="keyword" class="form-control form-control-lg" placeholder="Search NIC or Phone for New SR" autocomplete="off">
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
                <h3>Today Summary</h3>
                <div class="card">
                    <div class="row mt-3">
                        @include('features.cx.partials.today_summary')
                    </div>
                    <div class="row">
                        @include('features.cx.partials.today_pie_chart')
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <h3>Month Summary</h3>
                <div class="card">
                    <div class="row py-3">
                        @include('features.cx.partials.month_summary')
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <h3>Year Summary</h3>
                <div class="card">
                    <div class="row py-3">
                        @include('features.cx.partials.year_summary')
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <h3>Total Summary</h3>
                <div class="card">
                    <div class="row py-3">
                        @include('features.cx.partials.total_summary')
                    </div>
                </div>
            </div>
        
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


</div>

@include('features.caseregister.modals.case_register_in')
@endsection
