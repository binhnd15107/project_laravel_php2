<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\comments;
use App\Models\Products;
use App\Models\repComment;
use App\Models\transaction;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminMain extends Controller
{
  public function index(Request $request)
  {
    if ($request->session()->has('user') && session('user')[0]->id_role == 2) {
      $request->session()->get('user');
    } else {
      return redirect(route('login.index'));
    }
    $dataPro = Products::all();
    $dataComment = comments::all();
    $numberComment = count($dataComment);
    $dataUser = users::where('id_role', '=', 1)->get();
    $numberUser = count($dataUser);
    $numberPro = count($dataPro);
    $dataTransaction = transaction::all();

    $tong_tien = 0;
    foreach ($dataTransaction as $valueTran) {
      $tong_tien += $valueTran->tong_tien;
    }
    $numberBill = count($dataTransaction);
    return view('backend.adminMain.main', [
      'numberBill' => $numberBill,
      'tong_tien' => $tong_tien,
      'numberPro' => $numberPro,
      'numberUser' => $numberUser,
      'numberComment' => $numberComment
    ]);
  }

  // danh sách bình luận theo sản phẩm
  public function Comments(Request $request)
  {
    if ($request->session()->has('user') && session('user')[0]->id_role == 2) {
      $request->session()->get('user');
    } else {
      return redirect(route('login.index'));
    }
    $dataComment  = DB::table('comments')
      ->join('users', 'comments.id_user', '=', 'users.id')
      ->select('users.name', 'users.img', 'comments.*')
      ->where('id_products', '=', $request->idPro)
      ->orderBy('comments.id', 'DESC')
      ->paginate(10);
    // dd($dataComment);

    return view('backend.adminComment.listComment', ['dataComment' => $dataComment]);
  }
  //xóa comment 
  public function DeleteComments(Request $request)
  {
    $dataRep = repComment::where('id_comment', '=', $request->idComment)->get();
    foreach ($dataRep as $value) {
      repComment::destroy($value->id);
    }
    comments::destroy($request->idComment);
  }
}
