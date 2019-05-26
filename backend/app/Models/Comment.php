<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'article_id', 'reply_target_id',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function article()
    {
        return $this->belongsTo(\App\Models\Article::class);
    }

    public function replyTarget()
    {
        return $this->belongTo(Comment::class, 'reply_target_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_target_id');
    }
}
