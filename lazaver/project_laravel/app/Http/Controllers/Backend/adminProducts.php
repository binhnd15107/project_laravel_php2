<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\img_deltai;

class adminProducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPro = Products::orderBy('id', "DESC")->paginate(4);
        if ($keySearch = request()->search) {
            // dd($keySearch);
            $listPro = Products::orderBy('id', 'DESC')->where('name_product', 'like', '%' . $keySearch . '%')->paginate(5);
        }
        elseif ($idCate= request()->idCate) {
            $listPro = Products::orderBy('id', 'DESC')->where('category_id','=',$idCate)->paginate(5);
        }
        echo view('Backend.adminProducts.listProducts', compact('listPro'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCate = Category::orderBy('id', 'DESC')->get();
        echo view('Backend.adminProducts.formProducts', compact('listCate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // Update ảnh
        if ($request->hasFile('fileUpdate')) {
            $file = $request->file('fileUpdate');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('backend/img'), $filename);
            $request->merge(['img_produc' => $filename]);
        }

        // dd($request->all());
        // hàm merge dùng để nối 2 mảng với nhau.
        // nếu mảng sau có key giống mảng trước thì sẽ dc thay thế.
        //$request 1 mảng gồm các thông tin dc gửi từ clien lên sever
        //  dd($request->all());
        $request->validate([
            'name_product' => 'required|min:10|max:100',
            "intro" => 'required|min:20',
            'category_id' => 'required',
            'price' => 'required|numeric|min:1',

            'so_luong' => 'required|numeric|min:1',
            'img_produc' => 'required',
        ], [
            'name_product.required' => 'không được bỏ trống',
            'name_product.min' => 'Tên phải lớn hơn 10 kí tự',
            'name_product.max' => 'Tên phải nhỏ hơn 100 kí tự',
            'intro.required' => 'Bạn đã bỏ trống thông tin',
            'intro.min' => 'Thông tin phải hơn 20 kí tự',

            'category_id.required' => 'Bạn đang bỏ trống danh mục',
            'price.required' => 'Bạn đang bỏ trống giá',
            'price.numeric' => 'Giá Phải là số',
            'price.min' => 'Giá phải lớn hơn 1',

            'so_luong.required' => 'Bạn đang bỏ trống số lượng',
            'so_luong.numeric' => 'So Lượng Phải là số',
            'so_luong.min' => 'Số lượng phải lớn hơn 1',
            'img_produc.required' => 'Bạn đang bỏ trống Ảnh',



        ]);
        // dd($request->all());
        if (Products::create($request->all())) {
            $last_inserted_id = Products::orderBy('id', 'DESC')->get();
            if ($request->hasFile('fileUpdates')) {
                $files = $request->file('fileUpdates');
                for ($i = 0; $i < count($files); $i++) {

                    $filenames = $files[$i]->getClientOriginalName();
                    $files[$i]->move(public_path('backend/img'), $filenames);

                    $flight = new img_deltai();

                    $flight->id_products = $last_inserted_id[0]['id'];
                    $flight->image = $filenames;
                    $flight->save();
                }


                // $file->move(public_path('backend/img'), $filename);
                // $request->merge(['img_produc' => $filename]);
            }
            return redirect(route('product.create'))->with('success', 'thêm thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($products, Products $pro)
    {
        $listCate = Category::orderBy('id', 'DESC')->get();
        $produc = Products::find($products);
        echo view('Backend.adminProducts.editProducts', compact('produc', 'listCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $products)
    {
        // dd( $request->all());
        // dd($products);
        if ($request->hasFile('fileUpdate')) {
            $file = $request->file('fileUpdate');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('backend/img'), $filename);
            $request->merge(['img_produc' => $filename]);
        }

        // dd($request->all());
        // hàm merge dùng để nối 2 mảng với nhau.
        // nếu mảng sau có key giống mảng trước thì sẽ dc thay thế.
        //$request 1 mảng gồm các thông tin dc gửi từ clien lên sever
        //  dd($request->all());
        $request->validate([
            'name_product' => 'required|min:10|max:100',
            "intro" => 'required|min:20',
            'category_id' => 'required',
            'price' => 'required|numeric|min:1',

            'so_luong' => 'required|numeric|min:1',
            'img_produc' => 'required',
        ], [
            'name_product.required' => 'không được bỏ trống',
            'name_product.min' => 'Tên phải lớn hơn 10 kí tự',
            'name_product.max' => 'Tên phải nhỏ hơn 100 kí tự',
            'intro.required' => 'Bạn đã bỏ trống thông tin',
            'intro.min' => 'Thông tin phải hơn 20 kí tự',

            'category_id.required' => 'Bạn đang bỏ trống danh mục',
            'price.required' => 'Bạn đang bỏ trống giá',
            'price.numeric' => 'Giá Phải là số',
            'price.min' => 'Giá phải lớn hơn 1',

            'so_luong.required' => 'Bạn đang bỏ trống số lượng',
            'so_luong.numeric' => 'So Lượng Phải là số',
            'so_luong.min' => 'Số lượng phải lớn hơn 1',
            'img_produc.required' => 'Bạn đang bỏ trống Ảnh',



        ]);
        // dd($request->all());
        if ($Pro = Products::find($products)) {
            $Pro->name_product = $request->name_product;
            $Pro->intro = $request->intro;
            $Pro->category_id = $request->category_id;
            $Pro->price = $request->price;
            $Pro->sale = $request->sale;
            $Pro->img_produc = $request->img_produc;
            $Pro->so_luong = $request->so_luong;
            $Pro->save();
            return redirect(route('product.index'))->with('success', 'Sửa thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products
     * @return \Illuminate\Http\Response
     */
    public function destroy($products, Products $pro)
    {


        $img_deltais = img_deltai::all()->where('id_products', $products);

        Products::destroy($products);
        foreach ($img_deltais as $value) {
            $value->delete();
        }

        return redirect(route('product.index'))->with('success', 'Xóa Thành Công');
    }
}
