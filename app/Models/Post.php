<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Postという名前のModelはpostsテーブルに紐づけられる
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body',
    ];

    // PostモデルからUserモデルに紐づける
    public function user() {
        return $this->belongsTo(User::class);
    }

    // PostモデルとCommentモデルを紐づける
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
