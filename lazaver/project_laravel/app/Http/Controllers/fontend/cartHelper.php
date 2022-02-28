<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cartHelper extends Controller
{
    public $items = [];
    public $quantitys = 0;
    public $price = 0;
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->price = $this->get_price();
        $this->quantitys = $this->get_quantity();
    }
    public function index(Request $request)
    {

        $data = [
            'id' => $request->id,
            'name_product' => $request->name,
            'price' => $request->price_sale,
            'img_produc' => $request->img,
            'so_luong' => $request->quantity,
        ];

        if (isset($this->items[$request->id])) {
            $this->items[$request->id]['so_luong'] += $request->quantity;
        } else {
            $this->items[$request->id] = $data;
        }
        session(['cart' => $this->items]);
    }
    public function update(Request $request)
    {
      $so_luong= $request->so_luong ? $request->so_luong : 1;
        if (isset($this->items[$request->id])) {
            $this->items[$request->id]['so_luong'] = $so_luong;
        }
        session(['cart' => $this->items]);
    }
    public function remove(Request $request)
    {

        if (isset($this->items[$request->id])) {
            unset($this->items[$request->id]);
        }
        session(['cart' => $this->items]);
        // dd(session('cart'));
    }
    public function clear()
    {
        session(['cart' => '']);
    request()->session()->forget('cart');
    }
    public function get_price()
    {
        $tong = 0;
        foreach ($this->items as $value) {
            $tong += $value['price'] + $value['so_luong'];
        }
        return $tong;
    }
    public function get_quantity()
    {
        $tong = 0;
        foreach ($this->items as $value) {
            $tong += $value['so_luong'];
        }
        return $tong;
    }
}
