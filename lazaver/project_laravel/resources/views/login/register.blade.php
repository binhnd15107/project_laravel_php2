@extends('login.layoutLogin.main')
@section('title','Login')
<style>
    body {
        background-color: pink;
    }


</style>
@section('layoutMain')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tham gia cùng MatPet!</h1>
                        </div>
                        <form class="user" method="post" action="{{route('login.store')}}" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="Nhập Tên...">
                                  <br>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" name="image" class="form-control form-control-user">
                                <br>
                                    @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nhập Email...">
                               <br>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nhập Địa chỉ...">
                             <br>

    
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                  <br>
                                    @error('matkhau')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input name="sdt" type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Sdt..">
                                   <br>
                                    @error('sdt')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">Đăng Kí</button>

                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Quên Mật Khẩu?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{route('login.index')}}">Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@stop()