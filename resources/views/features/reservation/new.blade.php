@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0">New Reservation</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reservations">Reservation</a></li>
              <li class="breadcrumb-item active">New</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">New Reservation</h3>
                        </div>
                        <!-- /.card-header -->
              
                        <!-- form start -->
                        <form action="/mail/add" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Resource
                                                </span>

                                            </div>
                                            
                                            <select class="custom-select form-control" id="resource" name="resource">
                                                <option value="Conference Hall">Conference Hall</option>
                                            </select>
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Reserver
                                                </span>

                                            </div>
                                            <input type="text" name="reserver" class="form-control" id="reserver" value="{{Auth::user()->name}} - {{Auth::user()->designation}}">
                                            
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                     
                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                 From
                                                </span>
                                            </div>
                                            
                                            <input type="datetime-local" name="from" class="form-control" id="from">
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                To
                                                </span>
                                            </div>
                                            
                                            <input type="datetime-local" name="to" class="form-control" id="to">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                 Event
                                                </span>
                                            </div>
                                            
                                            <input type="text" name="date_of_receipt" class="form-control" id="date_of_receipt" value="">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Note
                                                </span>
                                            </div>
                                            <textarea name="note" id="note" class="form-control" rows="4"></textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                            <div class="card-footer mt-2 text-right">
                                <button type="submit" class="btn btn-success">Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>      
</div>
<script>
    window.onload = function(){
        $('#from').change(function(){
            $("#to").val($("#from").val());
        });
    }
</script>
@endsection