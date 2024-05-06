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
                    <h2 class="m-0">Front Page</h2>
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('frontpage.index')}}">Frontpage</a>
                        </li>
                        <li class="breadcrumb-item">Index</li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-4 col-md-2">
                            <div class="card m-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{asset('img/frontpage/subject-file.png')}}" class="img-fluid rounded-start p-2" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="mt-0">Subject File</h5>
                                            <p class="card-text">Subject Files used in all branches, units, divisions
                                            </p>
                                            <a href="" class="btn btn-outline-success" data-toggle="modal"
                                                data-target="#create-subject-file-modal">Create</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-2"></div>
                        <div class="col-lg-4 col-md-2"></div>
                    </div>

                </div>
            </div>
            <h2 class="">My Front Pages</h2>
            <div class="row">
                <div class="card p-3">
                    <div class="card-header"><h3>Subject Files</h3></div>
                    <div class="row mt-2">
                        @foreach($frontpages as $frontpage)
                        <div class="col-lg-3 col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>{{$frontpage->heading}}</h5>
                                    <h6 class="card-title">{{$frontpage->sub_heading}}</h6>
                                    <p class="card-text">
                                        {{$frontpage->file_no}}
                                        <br>
                                        {{$frontpage->year}}

                                    </p>
                                    <a href="{{route('frontpage.pdf',$frontpage->id)}}" target="_blank" class="btn btn-primary"><i
                                            class="fa fa-download" aria-hidden="true"></i>
                                        PDF</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


</div>

@include('features.frontpage.modals.create_subject_file')
@endsection
