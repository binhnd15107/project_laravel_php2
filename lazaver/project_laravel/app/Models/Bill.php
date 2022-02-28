<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\transaction;
class Bill extends Model
{
    use HasFactory;
    protected $table = "bill";
    protected $fillable = ['id_products', 'id_user', 'so_luong', 'tong_tien', 'id_transaction'];
  
    public function joinTran()
    {
        return $this->belongsTo(transaction::class);
    
    }
    public function joinPro(){
        return $this->hasOne(Products::class,'id','id_products');
    }
}
