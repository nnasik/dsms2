<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Session;
use App\Models\Post;
use App\Models\PostMedia;
class BlogController extends Controller
{
    public function posts(){
        $data['posts'] = Post::where('status','Published')->get()->reverse();
        $data['user'] = Auth::user();
        return view('features.blog.posts')->with($data);
    }

    public function post($id){
        $post = Post::find($id);
        $data['post'] = $post;
        $data['post_medias'] = $post->medias;
        return view('features.blog.post')->with($data);
    }

    public function create_post(Request $request){
        $logged_in_user = Auth::user();

        $post = New Post();
        $post->author = $logged_in_user->id;
        $post->status = 'Created';
        $post->save();
        return redirect('/blog/post/'.$post->id);
    }

    public function upload_media(Request $request){
        $validator = Validator::make($request->all(),[
            'post_id'=>'required',
            'media'=>'required|mimes:jpg,jpeg,png,gif|max:10240'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $post = Post::find($request->post_id);
        $media_count = $post->medias->count()+1;

        if (isset($request->post_id)) {
            $media = $post->id."_".$media_count.".".$request->media->extension();
            $request->media->storeAs('public/blog/', $media);
            
            $post_media = New PostMedia;
            $post_media->post_id = $post->id;
            $post_media->type = $request->media->extension();
            $post_media->file = $media;
            $post_media->save();
            $post->save();
        }

        return Redirect::back();
    }

    public function publish_post(Request $request){
        $logged_in_user = Auth::user();
        //$post = Post::where('id',$request->post_id)->where('author',$request->$logged_in_user->id)->get();
        $post = Post::find($request->post_id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->location = $request->location;
        $post->hashtags = $request->hashtags;
        $post->status = 'Published';
        $post->save();
        return redirect('/blog');
    }
}