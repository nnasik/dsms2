<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user(){
         return $this->belongsTo(User::class,'author');
    }

    public function medias(){
        return $this->hasMany(PostMedia::class,'post_id','id');
    }

    public function likes(){
        return $this->hasMany(PostLike::class,'post_id','id');
    }

    public function comments(){
        return $this->hasMany(PostComment::class, 'post_id', 'id');
    }

}
