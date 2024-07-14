<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'price',
        'description',
        // 'class_id',
        'subject_id',
        'creator_id',
        'meeting_link',
        'duration',
        'image',
        'status'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function durationName()
    {
        return $this->belongsTo(Duration::class, 'duration')->select('timeline');
    }

    public function pcustomers()
    {
        return 'dd';
        return $this->belongsToMany(User::class, 'orders', 'item_id', 'user_id')
            ->where('orders.type', Course::class);
    }
}
