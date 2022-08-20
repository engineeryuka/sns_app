<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'body',
    ];

    // CommentモデルからPostモデルに紐づける
    public function post() {
        return $this->belongsTo(Post::class);
    }

    // CommentモデルからUserモデルに紐づける
    public function user() {
        return $this->belongsTo(User::class);
    }
}
