<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'title', 'text',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function interests()
    {
        return $this->hasMany(\App\Models\Interest::class);
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'taggings');
    }
}
