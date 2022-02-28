<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\img_deltai;
class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name_product', 'price', 'sale', 'intro', 'img_produc', 'so_luong', 'category_id'
    ];
    public function joinCate()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function joinDeltai()
    {
        return $this->hasMany(img_deltai::class,'id_products','id');
    }
     
  

}
