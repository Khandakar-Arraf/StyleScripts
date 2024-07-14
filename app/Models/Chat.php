<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'sender_id',
        'sender_role',
        'course_id',
        'text',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    /**
     * Get the customer associated with the chat.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the instructor associated with the chat.
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
