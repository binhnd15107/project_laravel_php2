<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class img_deltai extends Model
{
    protected $table = "img_deltai";
    protected $fillable = ['id_products', 'image'];
    public function JoinPro()
    {
        return $this->hasOne(Products::class, 'id', 'id_products');
    }
    use HasFactory;
}
