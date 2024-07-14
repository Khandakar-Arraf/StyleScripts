<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer_information";
    protected $fillable = [
        'user_id',
        'image',
        'file',
        'address',
        'birthday',
        'current_class',
        'current_school'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Order::class,'user_id');
    }
}
