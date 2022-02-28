<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $table="social";
    protected $fillable=['provider_user_id','provider','user'];
    public function login(){
        return $this->belongsTo(users::class,'user');
    }
}
