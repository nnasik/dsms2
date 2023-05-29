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
            <div class="card-body" style="overflow:hidden">
                @if(isset($post->location))
                <p class="text-muted"><i class="fa fa-location-dot text-danger"></i> {{$post->location}}</p>
                @endif
                <h5 style="font-weight:bold">{{$post->title}}</h5>
                <div class="mt-2">
                    @foreach($post->medias as $media)
                        <img class="m-1" src="/storage/blog/{{$media->file}}" height="200" />
                    @endforeach
                </div>

                <p class="text-justify mt-2" style="line-height: 1.8">{{$post->content}}</p>
                <p>
                @if(isset($post->hashtags))
                    <span class="text-muted"><i class="fa fa-hashtag"></i> {{$post->hashtags}}</span>
                @endif
                </p>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">
                @if($post->likes->count()>0)
                {{$post->likes->count()}}
                @endif

                @if($post->likes->count()>0 && $post->comments->count()>0)
                 likes - 
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