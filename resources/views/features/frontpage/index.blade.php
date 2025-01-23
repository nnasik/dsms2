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
                                        <img src="{{asset('img/frontpage/subject-file.png')}}"
                                            class="img-fluid rounded-start p-2" alt="...">
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
                        <div class="col-lg-4 col-md-2">
                            <div class="card m-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{asset('img/frontpage/register.png')}}"
                                            class="img-fluid rounded-start p-2" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="mt-0">Registers</h5>
                                            <p class="card-text">Registers used in all Branches. Eg. Mail Register,
                                            </p>
                                            <a href="" class="btn btn-outline-success" data-toggle="modal"
                                                data-target="#create-register-modal">Create</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-2">
                            <div class="card m-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{asset('img/frontpage/personal-file.png')}}"
                                            class="img-fluid rounded-start p-2" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="mt-0">Personal File</h5>
                                            <p class="card-text">Personal Files used in Admin Branch for each employee.
                                            </p>
                                            <a href="" class="btn btn-outline-success" data-toggle="modal"
                                                data-target="#create-personal-file-modal">Create</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="">My Documents</h2>
                </div>
                <div class="col-lg-4 text-end">
                    <a class="btn btn-outline-primary"
                        href="{{route('movementcard.index')}}">Movement Card</a>
                    <a class="btn btn-outline-primary"
                        href="{{route('caseregister.index')}}">Case Register</a>
                    </div>
            </div>

            <div class="row">
                <div class="card p-3">

                    <div class="card-header">
                        <h3>Registers</h3>
                    </div>

                    <div class="row mt-3">
                        @foreach($frontpages as $frontpage)
                        @if($frontpage->type=='register')
                        <div class="col-lg-3 col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>{{$frontpage->file_no}}</h5>
                                    <h6 class="card-title">{{$frontpage->heading}}</h6>
                                    <p class="card-text">
                                        {{$frontpage->sub_heading}}
                                        <br>
                                        {{$frontpage->year}}

                                    </p>
                                    <a href="{{route('frontpage.pdf',$frontpage->id)}}" target="_blank"
                                        class="btn btn-primary m-1"><i class="fa fa-download" aria-hidden="true"></i>
                                        Front Page A4</a>
                                    <a data-toggle="modal" data-target="#create-sheets-page-modal" onclick="setSheetPageID({{$frontpage->id}})"
                                        class="btn btn-primary m-1"><i class="fa fa-download" aria-hidden="true"></i>
                                        Sheets Page A4</a>

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>

                    <div class="card-header">
                        <h3>Subject Files</h3>
                    </div>
                    <div class="row mt-3">
                        @foreach($frontpages as $frontpage)
                        @if($frontpage->type=='subjectfile')
                        <div class="col-lg-3 col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>{{$frontpage->file_no}}</h5>
                                    <h6 class="card-title">{{$frontpage->sub_heading}}</h6>
                                    <p class="card-text">
                                        {{$frontpage->heading}}
                                        <br>
                                        {{$frontpage->year}}

                                    </p>
                                    <a href="{{route('frontpage.pdf',$frontpage->id)}}" target="_blank"
                                        class="btn btn-primary m-1"><i class="fa fa-download" aria-hidden="true"></i>
                                        Front Page A4</a>

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>



                    <div class="card-header">
                        <h3>Personal Files</h3>
                    </div>
                    <div class="row mt-3">
                        @foreach($frontpages as $frontpage)
                        @if($frontpage->type=='personalfile')
                        <div class="col-lg-3 col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>{{$frontpage->file_no}}</h5>
                                    <h6 class="card-title">{{$frontpage->sub_heading}}</h6>
                                    <p class="card-text">
                                        {{$frontpage->name_of_the_officer}}
                                    </p>
                                    <a href="{{route('frontpage.pdf',$frontpage->id)}}" target="_blank"
                                        class="btn btn-primary m-1"><i class="fa fa-download" aria-hidden="true"></i>
                                        Front Page A4</a>

                                    <a href="{{route('frontpage.pdf',$frontpage->id)}}" target="_blank"
                                        class="btn btn-primary m-1"><i class="fa fa-download" aria-hidden="true"></i>
                                        Movement Card A4</a>

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<script>
    function setSheetPageID(page_id){
        document.getElementById("sheet_page_id").value =page_id;
    }
</script>
@include('features.frontpage.modals.create_subject_file')
@include('features.frontpage.modals.create_register')
@include('features.frontpage.modals.create_personal_file')
@include('features.frontpage.modals.sheets_page')
@endsection
