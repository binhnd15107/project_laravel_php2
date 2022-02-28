<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
class transaction extends Model
{
    use HasFactory;
    protected $table = "transaction";
    protected $fillable = ['id_user', 'user_name', 'user_phone', 'user_address', 'tong_tien', 'user_email', 'noidung'];
    public function joinBill()
    {
        return $this->hasMany(Bill::class, 'id_transaction', 'id');
    }
}
