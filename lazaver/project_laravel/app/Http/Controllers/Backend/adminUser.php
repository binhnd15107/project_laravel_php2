<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminUser extends Controller
{
   public function index(){
     $dataUser=  User::orderBy('id','DESC')->where('id_role','=',1)->paginate(10);
// dd($dataUser);
return view('Backend.adminUser.listUser',['dataUser'=>$dataUser]);
   }
}
