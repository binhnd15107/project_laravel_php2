<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\fontend\cartHelper;
use App\Models\Bill;
use App\Models\Category;
use App\Models\Products;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Cartcontroller extends Controller
{

    public function add(cartHelper $cart, Request $request)
    {
        $dataCate = Category::all();
        $cart->index($request);

        //  dd(session('cart'));
        return view('fontend.Bill.listcart', [
            'carts' => session('cart'),
            'dataCate' => $dataCate,
        ]);
    }

    public function remove(cartHelper $cart, Request $request)
    {
        $cart->remove($request);
        $dataCate = Category::all();
        //   dd(session('cart'));
        return view('fontend.Bill.listcart', [
            'carts' => session('cart'),
            'dataCate' => $dataCate,
        ]);
    }
    public function update(cartHelper $cart, Request $request)
    {

        $cart->update($request);
        $dataCate = Category::all();
        //   dd(session('cart'));
        return view('fontend.Bill.listcart', [
            'carts' => session('cart'),
            'dataCate' => $dataCate,
        ]);
    }

    public function clear(cartHelper $cart)
    {
        $cart->clear();
        $dataCate = Category::all();
        return view('fontend.Bill.listcart', [
            'carts' => session('cart'),
            'dataCate' => $dataCate,
        ]);
    }

    public function mycart()
    {
        // SELECT SUM(so_luong) as sl ,transaction.* FROM bill JOIN transaction on bill.id_transaction =transaction.id WHERE bill.id_user=16 GROUP BY bill.id_transaction
        $user = session('user') ? session('user') : redirect(route('login.index'));
        $dataCate = Category::all();

        // hàm  join 2 bảng + grouBy SUM
        $latestPosts = DB::table('bill')
            ->select('id_transaction', DB::raw('SUM(so_luong) as sl'))
            ->where('id_user', '=', $user[0]->id)
            ->groupBy('id_transaction');

        $dataBill = DB::table('transaction')
            ->joinSub($latestPosts, 'latest_posts', function ($join) {
                $join->on('transaction.id', '=', 'latest_posts.id_transaction');
            })->get();

        ///end
        return view('fontend.Bill.mycart', [

            'dataBill' => $dataBill,
            'dataCate' => $dataCate,
        ]);
    }

    // chi tiết đơn hàng của bạn
    public function deltaiMyCart()
    {
        $id = request()->id_transaction;
        $dataBill = Bill::orderBy('id', 'DESC')->where('id_transaction', '=', $id)->paginate(5);

        $dataCate = Category::all();
        return view('fontend.Bill.deltaiMyCart', [

            'dataBill' => $dataBill,
            'dataCate' => $dataCate,
        ]);
    }
    // Hủy Đơn hàng
    public function cancelCart()
    {
        $id_transaction = request()->id_transaction;
        $bills = Bill::where('id_transaction', '=', $id_transaction)->get();
        // dd($bills);

        foreach ($bills as $value) {
            $flight = Products::find($value->id_products);

            $flight->so_luong = $flight->so_luong + $value->so_luong;
            $flight->save();
            Bill::destroy($value->id);
        }
      
        transaction::destroy($id_transaction);
        session(['success'=>'Xóa Thành Công']);
        return redirect()->back();
    }
    public function deleteCart()
    {
        $id_transaction = request()->id_transaction;
        $bills = Bill::where('id_transaction', '=', $id_transaction)->get();
        // dd($bills);

        foreach ($bills as $value) {
            Bill::destroy($value->id);
        }
        transaction::destroy($id_transaction);
        session(['success' => 'Xóa Thành Công']);
        return redirect()->back();
    }
}
