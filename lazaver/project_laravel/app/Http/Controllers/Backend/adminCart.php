<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Controllers\fontend\cartHelper;
use App\Models\Bill;
use App\Models\Category;
use App\Models\Products;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminCart extends Controller
{
    //
    public function index( Request $request)
    {
        if ($request->session()->has('user') && session('user')[0]->id_role == 2) {
           $user=session('user');
          } else {
            return redirect(route('login.index'));
          }
        // hàm  join 2 bảng + grouBy SUM
        $latestPosts = DB::table('bill')
            ->select('id_transaction', DB::raw('SUM(so_luong) as sl'))
            ->groupBy('id_transaction');

        $dataBill = DB::table('transaction')
            ->joinSub($latestPosts, 'latest_posts', function ($join) {
                $join->on('transaction.id', '=', 'latest_posts.id_transaction');
            })->paginate(6);
    if($idUser= request()->id_user){
        $latestPosts = DB::table('bill')
        ->select('id_transaction', DB::raw('SUM(so_luong) as sl'))
        ->where('id_user', '=',$idUser)
        ->groupBy('id_transaction');

    $dataBill = DB::table('transaction')
        ->joinSub($latestPosts, 'latest_posts', function ($join) {
            $join->on('transaction.id', '=', 'latest_posts.id_transaction');
        })->paginate(6);
        // dd($dataBill);
    
    }
        
        return view('backend.adminCart.listCart', ['dataBill' => $dataBill]);
    }
    public function updateStatus(Request $request)
    {


        $flight = transaction::find($request->id_transaction);
        // dd($flight);
        $flight->trang_thai = $request->status;

        $flight->save();
        session(['success' => 'Update Thành Công']);
        return redirect()->back();
    }

    // chi tiết giỏ hàng trong admin
    public function deltaiMyCart()
    {
        $id = request()->id_transaction;
        $dataBill = Bill::orderBy('id', 'DESC')->where('id_transaction', '=', $id)->paginate(5);
        return view('backend.adminCart.deltaiCart', ['dataBill' => $dataBill,]);
    }
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
        session(['success' => 'Xóa Thành Công']);
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
