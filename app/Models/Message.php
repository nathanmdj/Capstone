<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'msg_thread_id',
        'user_id'
    ];

    public function thread()
    {
        return $this->belongsTo(MessageThread::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
