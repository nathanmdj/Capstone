<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'post_id',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes_comment()
    {
        return $this->belongsToMany(User::class, 'likes_comment')->withTimestamps();
    }

    public function isLike()
    {
        return $this->likes_comment()->where('user_id', auth()->id())->exists();
    }
}
