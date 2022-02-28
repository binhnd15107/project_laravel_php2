<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\users;
use App\Models\Products;
use App\Models\Category;
use App\Models\comments;
use App\Models\img_deltai;
use App\Models\LoveProducts;
use App\Models\news;
use Dflydev\DotAccessData\Data;
use App\Models\repComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class homePage extends Controller
{
    public function index(Request $request)
    {

        if ($request->session()->has('user')) {
            $user = $request->session()->get('user');
            // $request->session()->flush();
            //   dd( $request->session()->get('user')[0]->id)  ;

        }

        $dataCate = Category::all();
        $dataDog = Products::orderBy('id', 'DESC')->where('category_id', '=', 44)->get();
        $dataCat = Products::orderBy('id', 'DESC')->where('category_id', '=', 52)->get();
        $dataPk = Products::orderBy('id', 'DESC')->where('category_id', '=', 53)->get();
        return view('fontend.homePage.Main', [

            'dataCate' => $dataCate,
            'dataDog' => $dataDog,
            'dataPk' => $dataPk,
            'dataCat' => $dataCat


        ]);
    }
    public function Products(Request $request)
    {

        $dataCate = Category::all();
        $dataProduct = Products::orderBy('id', 'DESC')->paginate(12);
        $keyCate = $request->idCate;
        $keySearch = $request->search;
        $keyLove = $request->love;
        $keySale = $request->sale;
        if (isset($keyCate)) {
            $dataProduct = Products::orderBy('id', 'DESC')->where('category_id', '=', $keyCate)->paginate(12);
        } elseif ($keySearch) {
            $dataProduct = Products::orderBy('id', 'DESC')->where('name_product', 'like', '%' . $keySearch . '%')->paginate(12);
            //   dd(   $dataProduct[0]);
        } elseif ($keySale) {
            $dataProduct = Products::orderBy('id', 'DESC')->where('sale', '>', 1)->paginate(12);
            //    dd($dataProduct);
        } elseif ($keyLove) {
            if (session('user')) {
                $user = session('user');

                // dd($dataProduct);
            } else {
                return redirect(route('login.index'));
            }
            $dataProduct  = DB::table('loveproduct')
                ->join('products', 'loveproduct.id_products', '=', 'products.id')

                ->select('products.*', 'loveproduct.id_user')
                ->where('loveproduct.id_user', '=', $user[0]->id)
                ->paginate(12);
            //    dd($dataProduct);
        }
        return view('fontend.homeProducts.Products', ['dataCate' => $dataCate, 'dataDog' => $dataProduct,]);
    }
    public function deltaiProducts(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->get('user');
        } else {
            return redirect(route('login.index'));
        }
        $idPro = $request->idPro;
        $dataCate = Category::all();
        $dataDeltaiPro = Products::find($idPro);
        $idCate = $dataDeltaiPro->category_id;
        $dataWhereCate = Products::orderBy('id', 'DESC')->where('category_id', $idCate)->get();
        // dd($dataWhereCate);
        $dataImg = img_deltai::where('id_products', '=', $idPro)->get();
        if ($request->ajax() || 'NULL') {
            $dataComment  = DB::table('comments')
                ->join('users', 'comments.id_user', '=', 'users.id')
                ->select('users.name', 'users.img', 'comments.*')
                ->where('id_products', '=', $request->idPro)
                ->orderBy('comments.id', 'DESC')
                ->paginate(3);

            return view('fontend.homeproducts.deltaiProduct', [
                'dataComment' => $dataComment,
                'dataCate' => $dataCate,
                'dataDeltaiPro' => $dataDeltaiPro,
                'dataImg' => $dataImg,
                'dataWhereCate' => $dataWhereCate
            ]);
        }
    }
    public function loveproduct(Request $request)
    {
        if (session('user')) {
            $user =   session('user');
        } else {
            return   redirect(route('login.index'));
        }

        $flight = LoveProducts::where('id_products', '=', $request->idPro)->get();
        if (!empty($flight[0])) {
            LoveProducts::destroy($flight[0]->id);
            // dd($flight);
            return redirect()->back();
        } else {

            $data = [
                'id_user' => $user[0]->id,
                'id_products' => $request->idPro,
                'so_tim' => 1,
            ];
            $flight = LoveProducts::create(
                $data
            );
            // $listLove = LoveProducts::where('id_user', '=', $user[0]->id)->get();

            return redirect()->back();
        }
    }
    public function showLove()
    {
        if (session('user')) {
            $user = session('user');
        } else {
            return redirect(route('login.index'));
        }

        $listLove = LoveProducts::where('id_user', '=', $user[0]->id)->get();
        return  response()->json(['listLove' => $listLove], 200);;
    }




    // COMMENTS 
    // thêm bình luận
    public function comments(Request $request)
    {


        $validation = Validator::make($request->all(), [
            'comment' => "required|min:5|max:500"
        ], [
            'comment.required' => 'Bạn đang bỏ trống bình luận !!!',
            'comment.min' => 'Tối thiểu 5 kí tự',
            'comment.max' => 'nhiều nhất 500 kí tự',

        ]);
        if ($validation->passes()) {

            if (session('user')) {
                $user = session('user');
            } else {
                return redirect(route('login.index'));
            }

            $data = [
                'id_products' => $request->idPro,
                'id_user' => $user[0]->id,
                'content' => $request->comment
            ];
            $comment =  comments::create($data);

            return response()->json(['comment' => $comment]);
        }
        return response()->json(['erro' => $validation->errors()->all()]);
    }
    //xóa bình luận
    public function delteleComent(Request $request)
    {
        $dataRep = repComment::where('id_comment', '=', $request->id_comment)->get();
        foreach ($dataRep as $value) {
            repComment::destroy($value->id);
        }
        comments::destroy($request->id_comment);


        return response()->json(['delete' => 'xóa thành công']);
    }


    //trả lời bình luận

    public function repComment(Request $request)
    {
        if (session('user')) {
            $user = session('user');
        } else {
            return redirect(route('login.index'));
        }
        $data = [
            'id_user' => $user[0]->id,
            'id_comment' => $request->idComment,
            'repContent' => $request->repComment
        ];
        $insert =  repComment::create($data);
        return response()->json(['insert' => $insert]);
    }

    // xóa trả lời bình luận
    public function deleteRep(Request $request)
    {
        repComment::destroy($request->id_Repcomment);


        return response()->json(['delete' => 'xóa thành công']);
    }



    // TIN TỨC
    public function newlearning()
    {
        $dataCate = Category::all();
        $news = news::orderBy('id', 'DESC')->paginate(5);
        $dataDog = Products::orderBy('id', 'DESC')->where('category_id', '=', 44)->get();
        return view('fontend.homePage.tintuc', [
            'dataCate' => $dataCate,
            'dataDog' => $dataDog,
            'news' => $news
        ]);
    }
    public function newsDeltai(Request $request)
    {
        $dataCate = Category::all();
        $news = news::where('id',$request->id)->get();
        $dataDog = Products::orderBy('id', 'DESC')->where('category_id', '=', 44)->get();
        return view('fontend.homePage.deltainews', [
            'dataCate' => $dataCate,
            'dataDog' => $dataDog,
            'news' => $news[0]
        ]);
    }

    // LIỆN HỆ
    public function lienHe()
    {
        return view('fontend.homePage.lienhe');
    }
    // public function loadComment(Request $request ,$index=0)
    // {
    //     if (session('user')) {
    //         $user = session('user');
    //     } else {
    //         return redirect(route('login.index'));
    //     }
    // $dataComment= comments::where('id_products','=',$request->idPro);

    // $ouput = "";
    // if (empty($dataComment[0])) {
    //         $ouput .= '<li>
    //         <div ">
    // => Chưa có phản hồi cho sản phẩm !!!
    //         </div>
    //     </li>';

    //         echo $ouput;
    //         } else {

    //             foreach ($dataComment as $value) {

    //                 $ouput .= '                <li>


    //                  <span><img style="border-radius: 50%;
    // border: 2px solid black;
    // width: 70px;
    // height: 70px;" src="../../public/backend/img/' . $value->img . '" alt=""></span>
    //                  <div style="position: relative;top:-70px;left:100px">
    //                      <span>' . $value->name . '</span>
    //                      (
    //                      <span>
    //                         ' . date('d-m-Y', strtotime($value->created_at)) . '
    //                      </span>
    //                      )
    //                  </div>
    //                <div>
    //                      <span style="position: relative;top:-40px;left:100px">' . $value->content . '</span>
    //              </div>


    //      </li>
    // <hr>';
    //         }
    //             echo $ouput;
    //         }
    //     }
}
