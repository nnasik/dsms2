@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0">New Event Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
              <li class="breadcrumb-item active">Event</li>
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
                            <h3 class="card-title">Event Post : {{$post->id}}</h3>
                        </div>
                        <!-- /.card-header -->
              
                        <!-- form start -->
                        <form action="/blog/publishevent" method="POST">
                            <div class="card-body">
                                @csrf
                                <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                                <div class="mb-2">
                                    Photos :<br>
                                    @foreach($post_medias as $media)
                                        <img src="/storage/blog/{{$media->file}}" height="70" />
                                    @endforeach
                                        <img src="/img/mail/add_file.png" role="button" height="70" onclick="openFileMenu()"/>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 my-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                               Title
                                                </span>
                                            </div>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Programme / Subject">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Department
                                                </span>
                                            </div>
                                            <input type="text" name="department" id="department" class="form-control" placeholder="Department / Ministry">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Coordination
                                                </span>
                                            </div>
                                            <input type="text" name="coordination" id="coordination" class="form-control" placeholder="Coordination with other institutions / departments">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Date
                                                </span>
                                            </div>
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Time
                                                </span>
                                            </div>
                                            <input type="time" name="time" id="time" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                <i class="fa fa-location-dot"></i>
                                                </span>
                                            </div>
                                            
                                            <input type="text" name="location" class="form-control" id="location" placeholder="Location">
                                        </div>
                                    </div>
            
                                </div>
                                

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <textarea name="outcome" id="outcome" class="form-control" rows="3" placeholder="Expected outcome..."></textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 my-3">
                                        <div class="input-group">
                                            <textarea name="content" id="content" class="form-control" rows="8" placeholder="Describe the event..."></textarea>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>

                                

                            <div class="card-footer mt-2 text-right">
                                <button type="submit" class="btn btn-success">Post</button>
                            </div>
                        </form>

                        <form action="/blog/uploadmedia" method="post" id="media-form" enctype="multipart/form-data" style="display:none">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="file" name="media" id="post_media"  onchange="submitMedia()">
                        </form>
                        <script>
                            function submitMedia(){
                                let form = document.getElementById("media-form");
                                form.submit();
                            }
                            
                            function openFileMenu(){
                                let input = document.getElementById("post_media");
                                input.click();
                            }
                            
                        </script>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>      
</div>
@endsection