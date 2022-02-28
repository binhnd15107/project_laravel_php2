<?php

use App\Http\Controllers\Backend\adminCart;
use App\Http\Controllers\Backend\adminMain;
use App\Http\Controllers\Backend\adminNews;
use App\Http\Controllers\backend\adminUser;
use App\Http\Controllers\Backend\documentController;
use App\Http\Controllers\fontend\Cartcontroller;
use App\Http\Controllers\products;
use App\Http\Controllers\Login\loginMain;
use App\Http\Controllers\fontend\homePage;
use App\Http\Controllers\fontend\payment;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// PHÍA USER

Route::get('/', [homePage::class, 'index'])->name('trangchu');
Route::group(['prefix' => 'trangchu'], function () {
    Route::get('/sanpham', [homePage::class, 'Products'])->name('trangchu.sanpham');
    Route::get('/sanpham/chitiet', [homePage::class, 'deltaiProducts'])->name('trangchu.sanpham.chitiet');
    Route::get('/sanpham/yeuthich', [homePage::class, 'loveproduct'])->name('trangchu.sanpham.yeuthich');
    Route::get('/sanpham/ShowLove', [homePage::class, 'showLove'])->name('trangchu.sanpham.showLove');
    Route::get('/sanpham/comment', [homePage::class, 'comments'])->name('trangchu.sanpham.comments');
    Route::get('/sanpham/comment/loadComment', [homePage::class, 'loadComment'])->name('trangchu.sanpham.loadComment');
    Route::get('/sanpham/comment/delete', [homePage::class, 'delteleComent'])->name('trangchu.sanpham.deleteComment');
    Route::get('/sanpham/comment/repComment', [homePage::class, 'repComment'])->name('trangchu.sanpham.repComment');
    Route::get('/sanpham/comment/deleteRep', [homePage::class, 'deleteRep'])->name('trangchu.sanpham.deleteRep');

    // Tin Tức
    Route::get('/tintuc', [homePage::class, 'newlearning'])->name('trangchu.tintuc');
    Route::get('/tintuc/deltai', [homePage::class, 'newsDeltai'])->name('trangchu.tintuc.deltai');



    //LIÊN HỆ
    Route::get('/lienhe', [homePage::class, 'lienHe'])->name('trangchu.lienhe');
});
// END



// GIỎ HÀNG CỦA KHÁCH HÀNG

Route::group(['prefix' => 'cart'], function () {
    Route::get('add', [Cartcontroller::class, 'add'])->name('cart.add');
    Route::get('remove', [Cartcontroller::class, 'remove'])->name('cart.remove');
    Route::get('update', [Cartcontroller::class, 'update'])->name('cart.update');
    Route::get('clear', [Cartcontroller::class, 'clear'])->name('cart.clear');
    Route::get('mycart', [Cartcontroller::class, 'mycart'])->name('cart.mycart');
    Route::get('deltaiMycart', [Cartcontroller::class, 'deltaiMyCart'])->name('cart.deltaiMyCart');
    Route::get('cancelCart', [Cartcontroller::class, 'cancelCart'])->name('cart.cancelCart');
    Route::get('deleteCart', [Cartcontroller::class, 'deleteCart'])->name('cart.deleteCart');
});

// GIỎ HÀNG CỦA ADMIN
Route::group(['prefix' => 'cartAdmin'], function () {
    Route::get('/', [adminCart::class, 'index'])->name('cartAdmin.show');
    
    // update lại trạng thái đơn hàng
    Route::get('/updateStatus', [adminCart::class, 'updateStatus'])->name('cartAdmin.update');
    Route::get('/deltaiMycart', [adminCart::class, 'deltaiMyCart'])->name('cartAdmin.deltaiMycart');
    Route::get('/cancelCart', [adminCart::class, 'cancelCart'])->name('cartAdmin.cancelCart');
    Route::get('/deleteCart', [adminCart::class, 'deleteCart'])->name('cartAdmin.deleteCart');
});



// END GIỎ HÀNG

// THANH TOÁN
Route::group(['prefix' => 'payment'], function () {
    Route::get('/', [payment::class, 'index'])->name('payment.index');
    Route::get('/checkIntro', [payment::class, 'checkIntro'])->name('payment.checkIntro');
    Route::get('update', [Cartcontroller::class, 'update'])->name('cart.update');
    Route::get('clear', [Cartcontroller::class, 'clear'])->name('cart.clear');
});


// PHÍA ADMIN
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [adminMain::class, 'index'])->name('admin.Main');
    Route::get('/', [adminMain::class, 'index'])->name('admin.Main');
    // comment
    Route::get('/Comments', [adminMain::class, 'Comments'])->name('admin.comment');
    Route::get('/Comments/delete', [adminMain::class, 'DeleteComments'])->name('admin.comment.delete');
    Route::get('/User', [adminUser::class, 'index'])->name('adminUser.index');
   //end comment
   //News
   Route::get('/news', [adminNews::class, 'index'])->name('adminNews.index');
   Route::get('/news/insert', [adminNews::class, 'insert'])->name('adminNews.insert');
   Route::post('/news/store', [adminNews::class, 'store'])->name('adminNews.store');
   Route::post('/news/store', [adminNews::class, 'store'])->name('adminNews.store');
   Route::get('/news/delete', [adminNews::class, 'delete'])->name('adminNews.delete');
   Route::get('/news/edit', [adminNews::class, 'edit'])->name('adminNews.edit');
   Route::post('/news/update', [adminNews::class, 'update'])->name('adminNews.update');
   Route::get('/news/deltai', [adminNews::class, 'deltai'])->name('adminNews.deltai');
   //Endnews

    Route::resources([
        'product' => 'Backend\\adminProducts',
        'category' => 'Backend\\adminCategory',
    ]);
});


//
//  LOGIN -LOGOUT
Route::group(['prefix' => 'login'], function () {
    Route::get('/', [loginMain::class, 'index'])->name('login.index');
    Route::get('/loginGoogleApi', [loginMain::class, 'loginGoogleApi'])->name('login.googleApi');
    Route::get('/create', [loginMain::class, 'create'])->name('login.create');
    Route::post('/store', [loginMain::class, 'store'])->name('login.store');
    Route::post('/trangchu', [loginMain::class, 'login'])->name('login.trangchu');
    Route::get('/google/callback',[loginMain::class,'callback_googleApi']);

});

// GOOGLE DRIVE
  Route::get('/create_document',[documentController::class,'createDocument'])->name('drive.create');
  Route::get('/upload_file',[documentController::class,'upload_file'])->name('drive.uploadFile');
  Route::get('/add_fileimg',[documentController::class,'add_img'])->name('drive.addImg');
  Route::post('/storeFile_img',[documentController::class,'store_img'])->name('drive.storeImg');