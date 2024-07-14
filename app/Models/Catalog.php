<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = ['custom_design_id','name', 'front_image', 'back_image'];

    public function customDesign()
    {
        return $this->belongsTo(CustomDesign::class);
    }
}
