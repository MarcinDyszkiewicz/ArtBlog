<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected  $fillable = [
        'comment_body','user_id','post_id'
        ];


    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function commentReplies()
    {
        return $this->hasMany('App\CommentReply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
