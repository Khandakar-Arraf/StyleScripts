<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable  = ['title', 'description', 'status', 'category_id', 'order', 'image'];
    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
