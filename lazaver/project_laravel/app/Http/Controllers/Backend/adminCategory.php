<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;

class adminCategory extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(session()->has('success'));
        // $data=DB::table('category')->get();
        $listCate = Category::orderBy('id', 'DESC')->paginate(10);
        // dd($listCate);
        if ($keySearch = request()->search) {
            $listCate = Category::orderBy('id', 'DESC')->where('name', 'like', '%' . $keySearch . '%')->paginate(5);
        }
        echo view('backend.adminCategory.listCategory', compact('listCate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $listCate = Category::orderBy('id', 'DESC')->paginate(6);
        if ($keySearch = request()->search) {
            $listCate = Category::orderBy('id', 'DESC')->where('name', 'like', '%' . $keySearch . '%')->paginate(5);
        }
        echo view('backend.adminCategory.formCategory', compact('listCate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            ['name' => "required|min:5|max:100"],
            [
                'name.required' => 'Không được bỏ trống',
                'name.min' => 'Độ dài phải hơn 5',
                'name.max' => 'Độ Dài phải nhỏ hơn 100'
            ]
        );
        if (Category::create($request->all()))
            return redirect(route('category.index'))->with('success', 'thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $listCate = Category::orderBy('id', 'DESC')->paginate(6);
        if ($keySearch = request()->search) {
            $listCate = Category::orderBy('id', 'DESC')->where('name', 'like', '%' . $keySearch . '%')->paginate(5);
        }
        return  view('backend.adminCategory.edit', compact('listCate', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            ['name' => "required|min:5|max:100"],
            [
                'name.required' => 'Không được bỏ trống',
                'name.min' => 'Độ dài phải hơn 5',
                'name.max' => 'Độ Dài phải nhỏ hơn 100'
            ]
        );
        $category->name = $request->name;
        $category->save();
        return redirect(route('category.index'))->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
    //  dd($category->id);
        // dd($category->joinPro[0]->name_product);
        if ($category->joinPro->count() > 0) {
            return redirect(route('category.index'))->with('error', 'Không Thể xóa ');
        } else {
            $category->delete();
            return redirect(route('category.index'))->with('success', 'xóa thành công');
        }
    }
}
