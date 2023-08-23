@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
@can('view.blog')
  <div class="row p-3">
  <div class="col-md-2"></div>
    <div class="col-md-4 mt-2">
    <form action="/blog/create" method="post">
        @csrf
        <input type="submit" value="New Post" class="btn btn-primary p-2" style="width:100%">
      </form>
    </div>
    <div class="col-md-4 mt-2">
      <form action="/blog/createevent" method="post">
        @csrf
        <input type="submit" value="New Event" class="btn btn-success p-2" style="width:100%">
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
  @foreach($posts as $post)
    @include('features.blog.post_view')
  @endforeach
  @endcan
</div>
<script>
  function post_comment(element,id){
    if(event.key === 'Enter') { 
      var comment_body = element.value;
      var post_id = id
      $.post(
        "/blog/postcomment",
        {
          post_id:post_id,
          comment:comment_body,
          _token: "{{csrf_token()}}"
        },
      function(data, status){
        console.log(data,status);
      });

    }
  }
</script>
@endsection
