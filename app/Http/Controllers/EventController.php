<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Session;
use App\Models\Post;
use App\Models\PostMedia;
use App\Models\PostComment;
use App\Models\PostLike;
use Validator;

class EventController extends Controller
{
    public function create_post(Request $request){
        $logged_in_user = Auth::user();

        $event = New Post();
        $event->author = $logged_in_user->id;
        $event->status = 'Created';
        $event->save();
        return redirect('/event/post/'.$post->id);
    }

    public function post($id){
        $post = Post::find($id);
        $data['post'] = $post;
        $data['post_medias'] = $post->medias;
        return view('features.blog.post')->with($data);
    }

}
