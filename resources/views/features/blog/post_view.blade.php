<div class="wrapper">
    <div class="col-12">
        <!-- Box Comment -->
        <div class="card card-widget m-3">
            <div class="card-header">
                <div class="user-block">
                    @if($post->user->profile_pic && file_exists('storage/user/dp/'.$post->user->profile_pic))
                    <img src="{{asset('storage/user/dp/'.$post->user->profile_pic)}}" class="img-circle img-sm " alt="User Image">
                    @else
                    <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
                    @endif
                    <span class="username">{{$post->user->name}}</span>
                    
                    <span class="description">{{$post->updated_at}}</span>
                </div>
                <!-- /.user-block -->
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-4" style="overflow:hidden">
                @if(isset($post->location))
                <p class="text-muted"><i class="fa fa-location-dot text-danger"></i> {{$post->location}}</p>
                @endif
                <h5 style="font-weight:bold">{{$post->title}}</h5>
                <div class="mt-2 row">
                    @foreach($post->medias as $media)
                        <img class="col-md-6 col-lg-4 my-1" src="/storage/blog/{{$media->file}}"/>
                    @endforeach
                </div>

                <p class="text-justify mt-2" style="line-height: 1.8">
                @php 
                    echo nl2br(e($post->content),false)
                @endphp
                </p>
                <p>
                @if(isset($post->hashtags))
                    <span class="text-muted"><i class="fa fa-hashtag"></i> {{$post->hashtags}}</span>
                @endif
                </p>
                @php
                $like_found = false;
                foreach($post->likes as $like){
                    if($like->liked_by == Auth::user()->id){
                        $like_found=true;
                        break;
                    }
                }
                @endphp
                @if($like_found)
                <button type="button" id="post-like-{{$post->id}}" class="text-primary btn btn-default btn-sm" onClick="unLikePost({{$post->id}})"><i class="fa fa-thumbs-up"></i> Liked</button>
                @else
                <button type="button" id="post-like-{{$post->id}}" class="btn btn-default btn-sm" onClick="likePost({{$post->id}})"><i class="far fa-thumbs-up"></i> Like</button>
                @endif
                
                <span class="float-right text-muted">
                @if($post->likes->count()>0)
                {{$post->likes->count()}}
                @endif

                @if($post->likes->count()>0)
                likes
                @endif

                @if($post->likes->count()>0 && $post->comments->count()>0)
                - 
                @endif
                
                @if($post->comments->count()>0)
                {{--$post->comments->count()--}} {{--comments--}}
                @endif
                
                </span>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
            <!--
            <div class="card-footer">
                @if($user->profile_pic && file_exists('storage/user/dp/'.$user->profile_pic))
                <img src="{{asset('storage/user/dp/'.$user->profile_pic)}}" class="img-circle img-sm " alt="User Image">
                @else
                <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
                @endif
                <div class="img-push">
                    <input type="text" id="comment{{$post->id}}" class="form-control form-control-sm"
                    onkeydown="post_comment(this,{{$post->id}})" placeholder="Press enter to post comment">
                </div>
            </div>
            -->
            <!-- /.card-footer -->
            <!--
            <div class="card-footer card-comments" id="post-{{$post->id}}-comments">
                @foreach($post->comments->reverse() as $comment)
                <div class="card-comment">
                   
                    @if($comment->posted_by->profile_pic && file_exists('storage/user/dp/'.$comment->posted_by->profile_pic))
                    <img src="{{asset('storage/user/dp/'.$comment->posted_by->profile_pic)}}" class="img-circle img-sm " alt="User Image">
                    @else
                    <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
                    @endif

                    <div class="comment-text">
                        <span class="username">
                            {{$comment->posted_by->name}}
                            <span class="text-muted float-right">{{$comment->updated_at}}</span>
                        </span>
                        {{$comment->comment}}
                    </div>
                    
                </div>
                @endforeach
            -->
        </div>
        <!-- /.card -->
    </div>

</div>
<script>
    function likePost(post_id){
        $.post(
        "/blog/likepost",
        {
          post_id:post_id,
          _token: "{{csrf_token()}}"
        },
        function(data, status){
            if (status=='success') {
                $("#post-like-"+data).html("<i class='fa fa-thumbs-up'></i> Liked");
                $("#post-like-"+data).addClass("text-primary");
                $("#post-like-"+data).attr("onclick","unLikePost("+data+")");

            }
        });
    }

    function unLikePost(post_id){
        $.post(
        "/blog/unlikepost",
        {
          post_id:post_id,
          _token: "{{csrf_token()}}"
        },
        function(data, status){
            if(status=='success') {
                $("#post-like-"+data).html("<i class='far fa-thumbs-up'></i> Like");
                $("#post-like-"+data).removeClass("text-primary");
                $("#post-like-"+data).attr("onclick","likePost("+data+")");
            }
        });
    }
</script>