<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->belongToMany(\App\Models\Article::class, 'taggings');
    }
}
