<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;

class adminNews extends Controller
{
    //
    public function index()
    {
        $dataNews = news::orderBy('id', 'desc')->paginate(5);
        // dd($dataNews);
        return view('backend.adminNews.listNews', ['dataNews' => $dataNews]);
    }
    public function insert()
    {

        return view('backend.adminNews.formNews');
    }
    public function store(Request $request)
    {

        if ($request->hasFile('imgone')) {
            $file = $request->file('imgone');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('backend/img'), $filename);
            $request->merge(['img_poster' => $filename]);
        }
        if ($request->hasFile('imgtwo')) {
            $file2 = $request->file('imgtwo');
            $filename2 = $file2->getClientOriginalName();
            $file2->move(public_path('backend/img'), $filename2);
            $request->merge(['img_content' => $filename2]);
        }
        if ($request->hasFile('imgthree')) {
            $file3 = $request->file('imgthree');
            $filename3 = $file3->getClientOriginalName();
            $file3->move(public_path('backend/img'), $filename3);
            $request->merge(['img_content_two' => $filename3]);
        }
        // dd($request->all());
        $request->validate(
            [
                'title' => "required",
                'content_two' => "required",
                'content_one' => "required",
                'img_poster' => 'required',
                'img_content' => 'required',
                'img_content_two' => 'required'
            ],
            [
                'title.required' => 'không được bỏ trống',
                'content_two.required' => 'không được bỏ trống',
                'content_one.required' => 'không được bỏ trống',
                'img_poster.required' => 'không được bỏ trống',
                'img_content.required' => 'không được bỏ trống',
                'img_content_two.required' => 'không được bỏ trống',

            ]
        );
        session(['success' => 'Thêm Thành Công']);
        news::create($request->all());
        return redirect(route('adminNews.index'));
    }
    public function delete(Request $request)
    {

        news::destroy($request->idNews);
        return response()->json(['delete' => 'xóa thành công']);
    }
    public function edit(Request $request)
    {
        $new = news::where('id', $request->idNews)->get();

        return view('backend.adminNews.editNews', ['new' => $new[0]]);
    }
    public function update(Request $request)
    {
        if ($request->hasFile('imgone')) {
            $file = $request->file('imgone');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('backend/img'), $filename);
            $request->merge(['img_poster' => $filename]);
        }
        if ($request->hasFile('imgtwo')) {
            $file2 = $request->file('imgtwo');
            $filename2 = $file2->getClientOriginalName();
            $file2->move(public_path('backend/img'), $filename2);
            $request->merge(['img_content' => $filename2]);
        }
        if ($request->hasFile('imgthree')) {
            $file3 = $request->file('imgthree');
            $filename3 = $file3->getClientOriginalName();
            $file3->move(public_path('backend/img'), $filename3);
            $request->merge(['img_content_two' => $filename3]);
        }
        // dd($request->all());
        $request->validate(
            [
                'title' => "required",
                'content_two' => "required",
                'content_one' => "required",
                'img_poster' => 'required',
                'img_content' => 'required',
                'img_content_two' => 'required'
            ],
            [
                'title.required' => 'không được bỏ trống',
                'content_two.required' => 'không được bỏ trống',
                'content_one.required' => 'không được bỏ trống',
                'img_poster.required' => 'không được bỏ trống',
                'img_content.required' => 'không được bỏ trống',
                'img_content_two.required' => 'không được bỏ trống',

            ]
        );

        $flight = news::find($request->id);


        $flight->title = $request->title;

        $flight->content_two = $request->content_two;

        $flight->content_one = $request->content_one;

        $flight->img_poster = $request->img_poster;

        $flight->img_content = $request->img_content;
        $flight->img_content_two = $request->img_content_two;
        $flight->save();
        session(['success' => 'Sửa Thành Công']);
        return redirect(route('adminNews.index'));
    }
    public function deltai(Request $request)
    {
        $flight = news::find($request->idNews);
        // dd($flight);
        return view('backend.adminNews.deltaiNews', ['news' => $flight]);
    }
}
