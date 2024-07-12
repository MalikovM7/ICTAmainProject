<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{

    use HasFactory;             
    protected $fillable = ['user_id', 'category_id','file_path', 'details', 'is_vip', 'expires_at','status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}