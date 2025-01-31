@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h2 class="m-0">Formats</h2>
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
                <div class="card p-3">
                    <div class="row">
                    @include('features.format.partials.pub_attendance')
                    @include('features.format.partials.int_attendance')
                    @include('features.format.partials.training_attendance')
                    </div>
                </div>
            </div>

            
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@include('features.format.modals.pub_attendance')
@include('features.format.modals.int_attendance')
@include('features.format.modals.training_attendance')
@endsection
