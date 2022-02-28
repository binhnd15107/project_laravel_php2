<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Image;

class documentController extends Controller
{
    public function createDocument()
    {
        Storage::cloud()->put('test.txt', 'hello poly');
        dd('created');
    }
    public function upload_file()
    {
        // tìm hiểu thue viện  để khi người submit ảnh lên sẽ chia thành 3 mobil máy tính và file gốc
        $filename = 'file ảnh gái';
        $filePath = public_path('backend/img/@𝑺𝒆𝒄𝒓𝒆𝒕.jpg');
        $image = Image::make($filePath);
        $image->fit(600, 600)->save(public_path('backend/img/@𝑺𝒆𝒄𝒓𝒆𝒕.jpg'));
        // $image->fit(400, 400)->save('backend/img/@𝑺𝒆𝒄𝒓𝒆𝒕.jpg');
        $fileData = File::get($filePath);
        Storage::cloud()->put($filename, $fileData);
        return "upload thành công";
    }

    public function add_img()
    {
        $contents= collect(Storage::disk('google')->listContents('/',false)) 
        -> where('type','!=','dir');
       
        return view('backend.googleDrive.addFileImg',['contents'=>$contents]);
        
    }
    public function store_img(Request $request)
    {

        $request->validate([
            'nameFile' => "required",
            'img' => "required|mimes:jpeg,bmp,png|max:500",

        ], [
            "nameFile.required" => 'Bạn đang bỏ trống tên file...',
            'img.required' => 'Bạn đang bỏ trống ảnh...',
            'img.max' => 'Kích Thước ảnh quá Lớn',
            'img.mimes' => 'Không đúng định dạng ảnh'

        ]);
        if ($request->hasFile('img')) {
            $image = $request->img;
            $filename = $request->nameFile;
            $nameimg = $request->img->getClientOriginalName();
            $fileData = File::get($request->img);
            Storage::disk('google')->put($filename,  $fileData);

            // $image_resize= Image::make($request->img);
            // $image_resize->fit(1000, 1000)->save(public_path('backend/imgWindow/' . $nameimg));
            // $fileData1 = File::get(public_path('backend/imgWindow/'.$nameimg));
            // Storage::disk('fourth_google')->put($filename,  $fileData1);

            // $image_resize2= Image::make($request->img);
            // $image_resize2->fit(300, 300)->save(public_path('backend/imgMobi/' . $nameimg));
            // $fileData2 = File::get(public_path('backend/imgMobi/' . $nameimg));
            // Storage::disk('third_google')->put($filename,  $fileData2);
            session(['success'=>'Thêm Thành Công!!']);
           return redirect(route('drive.addImg'));
        }
    }
}
