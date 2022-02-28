<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repComment extends Model
{
    use HasFactory;
    protected $table="repcomment";
    protected $fillable=['id_user','id_comment','repContent'];
}
