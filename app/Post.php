<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'date', 'workout','weight','repetition','set', 'user_id',
        ];

    // 一対多数
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
