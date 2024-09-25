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
                    <h2 class="m-0">Movement Card</h2>
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('movementcard.index')}}">Movement Card</a>
                        </li>
                        <li class="breadcrumb-item">Index</li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <form action="{{route('movementcard.pdf')}}" method="post">
                    @csrf
                    <div class="card p-3">
                        <div class="mt-3">
                            @foreach($frontpages as $frontpage)
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-11 col-10">
                                            <h5>{{$frontpage->file_no}}</h5>
                                            <h6 class="card-title">{{$frontpage->sub_heading}}</h6>
                                            <p class="card-text">
                                                {{$frontpage->heading}} - {{$frontpage->year}}
                                            </p>
                                        </div>
                                        <div class="col-lg-1 col-2 pt-3">
                                            <input class="align-middle" type="checkbox" name="pages[]"
                                                value="{{$frontpage->id}}" style="width:25px;height:25px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-11 text-end">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-download"
                                        aria-hidden="true"></i> Movement Card</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
