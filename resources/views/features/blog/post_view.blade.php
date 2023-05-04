<div class="row" style="display:flex">
    <div class="col-md-12">
        <!-- Box Comment -->
        <div class="card card-widget m-3">
            <div class="card-header row">
                <div class="user-block">
                    @if(file_exists('storage/user/dp/'.$post->user->profile_pic))
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
            <div class="card-body">
                <p class="text-muted"><i class="fa fa-location-dot text-danger"></i> {{$post->location}}</p>
                <h5 style="font-weight:bold">{{$post->title}}</h5>
                <p class="text-justify" style="line-height: 1.8">{{$post->content}}</p>
                <p>
                    <span class="text-muted"></span>
                    <span class="text-muted"><i class="fa fa-hashtag"></i> {{$post->hashtags}}</span>
                </p>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">127 likes - 3 comments</span>
            </div>
            <!-- /.card-body -->
            <div class="card-footer card-comments">
                <div class="card-comment">
                    <!-- User image -->
                    <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                    <div class="comment-text">
                        <span class="username">
                            Maria Gonzales
                            <span class="text-muted float-right">8:03 PM Today</span>
                        </span><!-- /.username -->
                        It is a long established fact that a reader will be distracted
                        by the readable content of a page when looking at its layout.
                    </div>
                    <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                <div class="card-comment">
                    <!-- User image -->
                    <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                    <div class="comment-text">
                        <span class="username">
                            Luna Stark
                            <span class="text-muted float-right">8:03 PM Today</span>
                        </span><!-- /.username -->
                        It is a long established fact that a reader will be distracted
                        by the readable content of a page when looking at its layout.
                    </div>
                    <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
                <form action="#" method="post">
                    @if(file_exists('storage/user/dp/'.$user->profile_pic))
                    <img src="{{asset('storage/user/dp/'.$user->profile_pic)}}" class="img-circle img-sm " alt="User Image">
                    @else
                    <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
                    @endif
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <input type="text" class="form-control form-control-sm"
                            placeholder="Press enter to post comment">
                    </div>
                </form>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
</div>