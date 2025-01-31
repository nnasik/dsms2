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
                    <h2 class="m-0">Documents</h2>
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('view.documents')}}">Documents</a>
                        </li>
                        <li class="breadcrumb-item">Index</li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>

            <div class="row mt-3">
                <div class="col-md-8 offset-md-2">
                    <form action="{{route('cx.find')}}" method="get">
                        <div class="input-group">
                            <input type="search" name="keyword" @if(isset($keyword)) value="{{$keyword}}" @endif  class="form-control form-control-lg" placeholder="Search Subject / File No. / Branch / Officer" autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="row m-3">
            <div class="card p-0">
              <div class="card-header border-0">
                <h3 class="card-title">Files / Registers / Personal Files</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th style="width: 30%;">File</th>
                    <th>File No</th>
                    <th>Branch</th>
                    <th>Officer</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($files as $file)
                  <tr>
                    <td>{{$file->heading}} @if($file->sub_heading)<br> {{$file->sub_heading}} @endif <br> {{$file->year}}</td>
                    <td>{{$file->file_no}}</td>
                    <td>{{$file->branch}}</td>
                    <td>
                      <div class="row">
                        <div class="col-3">
                        @if(isset($file->user->profile_pic) && file_exists('storage/user/dp/'.$file->user->profile_pic))
                        <img class="img-circle img-fluid" src="{{asset('storage/user/dp/'.$file->user->profile_pic)}}" alt="user-avatar">
                        @else
                        <img class="img-circle img-fluid" src="{{asset('storage/user/dp.png')}}" alt="user-avatar">
                        @endif
                        </div>
                        <div class="col-9">
                            {{$file->user->name}}
                        <br>{{$file->user->designation}}
                        </div>
                      </div>
                      
                      
                    </td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
