<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'user_id', 'article_id', 'interest_type_id',
        'type', // 1:いいね
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function article()
    {
        return $this->belongsTo(\App\Models\Article::class);        
    }
}
