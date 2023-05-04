@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
  <div class="row p-3">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form action="/blog/create" method="post">
        @csrf
        <input type="submit" value="Create New Post" class="btn btn-primary p-2" style="width:100%">
      </form>
    </div>
    <div class="col-md-4"></div>
  </div>
    @foreach($posts as $post)
      @include('features.blog.post_view')
    @endforeach
</div>

@endsection