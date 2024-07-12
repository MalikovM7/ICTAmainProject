<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    use HasFactory;

    protected $fillable = ['name', 'brand_id'];

    // Many Models belong to one Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}