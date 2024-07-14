<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    use HasFactory;
    protected $table = 'purchase_request';
    protected $fillable = [
        'user_id',
        'item_id',
        'image_front',
        'image_back',
        'sizes',
    ];

    public function customDesign()
    {
        return $this->belongsTo(CustomDesign::class, 'item_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}