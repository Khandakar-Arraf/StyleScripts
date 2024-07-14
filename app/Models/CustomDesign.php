<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDesign extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'status'];

    public function catalogs()
    {
        return $this->hasMany(Catalog::class);
    }
}
