@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mail Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Mail</li>
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
        <h5 class="m-2">Summary of Mails</h5>
      </div>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        @include('features.mail.dashboard.summary')
      </div>
      <!-- /.row -->



      <div class="row">
        <div class="col-9">
          <h5 class="m-2">My Mails</h5>
        </div>
        <div class="col-3 float-right">
          <a href="/mail/new" class="btn btn-block btn-success align-right"><i class="fa fa-solid fa-plus"></i> New</a>
        </div>
      </div>

      <!-- Small boxes (Stat box) -->
      <div class="row mt-2 mb-2">
        @include('features.mail.dashboard.my_mails')
      </div>
      <!-- /.row -->
      
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection