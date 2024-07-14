<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'invoice',
        'order_id',
        'transaction_id',
        'instructor_id',
        'customer_id',
        'amount',
        'ratio',
        'instructor',
        'owner',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
