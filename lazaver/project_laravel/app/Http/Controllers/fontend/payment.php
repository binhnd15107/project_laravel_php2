<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\transaction;

use Illuminate\Support\Facades\Bus;
use Symfony\Component\Routing\RequestContextAwareInterface;

class payment extends Controller
{
    public function index()
    {
        $user = session('user') ? session('user') : redirect(route('login.index'));
// dd($user[0]);
        return view('fontend.Payment.formPayment', [
            'carts' => session('cart'),
            'user' => $user[0],
        ]);
    }
    public function checkIntro(Request $request)
    {
        $user = session('user') ? session('user') : redirect(route('login.index'));
        $tongtien = 0;
        foreach (session('cart') as $value) {
            $tongtien += ($value['so_luong']) * ($value['price']);
        }

        $data = [
            'id_user' => $user[0]->id,
            'user_name' => $request->name ? $request->name : $user[0]->name,
            'user_email' => $request->email ? $request->email : $user[0]->email,
            'user_address' => $request->address ? $request->address : $user[0]->address,
            'tong_tien' => $tongtien,
            'user_phone' => $request->sdt ? $request->sdt : $user[0]->sdt,
            'noidung' => $request->ghichu
        ];

        transaction::create($data);
        $dataTransac = transaction::orderBy('id', 'DESC')->first();
        $idTransac = $dataTransac->id;
        foreach (session('cart') as $value) {
            $tongtien += ($value['so_luong']) * ($value['price']);

            $data2 = [
                'id_products' => $value['id'],
                'id_user' => $user[0]->id,
                'so_luong' => $value['so_luong'],
                'tong_tien' => $value['so_luong'] * $value['price'],
                'id_transaction' => $idTransac,
            ];

            $flight = Products::find($value['id']);

            $flight->so_luong = $flight->so_luong - $value['so_luong'];

            $flight->save();
            Bill::create($data2);
        };

        request()->session()->forget('cart');

        return redirect(route('trangchu'))->with('success', 'Đặt hàng thành công');
    }
}
