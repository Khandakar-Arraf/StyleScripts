<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $table = "instructor_information";
    protected $fillable = [
        'user_id',
        'image',
        'file',
        'address',
        'birthday',
        'profession', 'subject'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'creator_id', 'user_id');
    }
    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
