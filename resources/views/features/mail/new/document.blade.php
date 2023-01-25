@extends('layouts.cms')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0">New Mail</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/mail">Mail</a></li>
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
                            <h3 class="card-title">Create Mail (1/2)</h3>
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
                                                Mode
                                                </span>

                                            </div>
                                            
                                            <select class="custom-select form-control" id="mode" name="mode">
                                                <option value="Post">Post</option>
                                                <option value="Fax">Fax</option>
                                                <option value="Phone">Phone</option>
                                                <option value="Email">Email</option>
                                                <option value="By Hand">By Hand</option>
                                                <option value="Social Media">Social Media</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Manual Record
                                                </span>

                                            </div>
                                            
                                            <select class="custom-select form-control" id="manual_record" name="manual_record">
                                                <option value="Inward Normal">Inward Normal</option>
                                                <option value="Inward Register">Inward Register</option>
                                            </select>
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                     
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Manual Record Number
                                                </span>
                                            </div>
                                            
                                            <input type="text" name="manual_record_no" class="form-control" id="manual_record_no">
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                 Date in Letter
                                                </span>
                                            </div>
                                            
                                            <input type="date" name="letter_date" class="form-control" id="letter_date">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Received Date
                                                </span>
                                            </div>
                                            
                                            <input type="date" name="inward_no" class="form-control" id="inward_no" value="{{date('Y-m-d')}}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                 Date of Reply
                                                </span>
                                            </div>
                                            
                                            <input type="date" name="date_of_receipt" class="form-control" id="date_of_receipt" value="{{date('Y-m-d',strtotime('+3 Weekdays'))}}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                From
                                                </span>
                                            </div>
                                            
                                            <input type="text" name="from_whom" class="form-control" id="from_whom">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Subject
                                                </span>
                                            </div>
                                            
                                            <input type="text" name="subject" class="form-control" id="subject">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Assigned To
                                                </span>
                                            </div>
                                            
                                            <select class="custom-select form-control" id="assigned_to" name="assigned_to">
                                                @foreach($users as $user)   
                                                    <option value="{{$user->id}}">{{$user->name}} - {{$user->designation}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1 col-4  mb-3">
                                        <img src="/img/mail/add_file.png" class="d-flex" role="button" width="90" alt="">
                                    </div>
                                    <div class="col-lg-1  col-4 mb-3">
                                        <img src="/img/mail/add_file.png" class="d-flex" role="button" width="90" alt="">
                                    </div>
                                    <div class="col-lg-1  col-4 mb-3">                      
                                        <img src="/img/mail/add_file.png" class="d-flex" role="button" width="90" alt="">
                                    </div>
                                </div>

                            <div class="card-footer mt-2 text-right">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>      
</div>
@endsection