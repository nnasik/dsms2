@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0">View Service Request - {{$service_request->id}}</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="/cx">Service Requests</a>
                        </li>
                        <li class="breadcrumb-item">view</li>
                        <li class="breadcrumb-item active">{{$service_request->id}}</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('features.cx.sr.sr_data')
            @include('features.cx.sr.history')
        </div>
        <!-- /.card -->
    </section>
</div>

@include('features.cx.modals.update_sr')

<script>
    function closeModal(id){
        document.getElementById("sr_id").value = id;
    }
</script>

@endsection