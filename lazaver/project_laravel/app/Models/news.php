<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $table="news";
    protected $fillable=['img_poster','title','img_content','content_one','content_two','img_content_two'];
}
