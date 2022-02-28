<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoveProducts extends Model
{
    use HasFactory;
    protected $table="loveproduct";
    protected $fillable=['id_user','id_products','so_tim'];

}
