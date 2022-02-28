@extends('fontend.layoutMaster.layoutMain')
@section('title','Trang chủ')
@section('css')
<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
<style>
    .container {}
</style>
@stop()
@section('layoutMain')
<div class="content">
    @if($carts==null)
    <div style="      position: relative;
        margin-bottom: 150px;
        left: 250px;" class="listProducts">
        <h3 style="color: #de8ebe;font-size: 25px;">danh mục sản phẩm</h3>
        <ul style="font-family: 'Courier New', Courier, monospace;font-size:20px;color:black">
            @foreach($dataCate as $valueCate)
            <li><a href="{{route('trangchu.sanpham',['idCate'=>$valueCate->id])}}">{{$valueCate->name}}</a></li>
            @endforeach
            <li><a href="{{route('trangchu.sanpham',['love'=>'proLove'])}}">Sản Phẩm yêu thích</a></li>
            <li><a href="{{route('trangchu.sanpham',['sale'=>'proSale'])}}">Sản phẩm giảm giá</a></li>
            <li><a href="">Liên hệ</a></li>
        </ul>
    </div>


    <div style="      position: relative;
        margin-bottom: 150px;
        left: -300px;">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="text-gray-500 mb-0">Giỏ hàng đang trống</p>
            <a href="{{route('trangchu.sanpham')}}">&larr; Mua sản phẩm</a>
        </div>

    </div>
    @else
    <div style="      position: relative;
        margin-bottom: 150px;
        left: 70px;" class="listProducts">
        <h3 style="color: #de8ebe;font-size: 25px;">danh mục sản phẩm</h3>
        <ul style="font-family: 'Courier New', Courier, monospace;font-size:20px;color:black">
            @foreach($dataCate as $valueCate)
            <li><a href="{{route('trangchu.sanpham',['idCate'=>$valueCate->id])}}">{{$valueCate->name}}</a></li>
            @endforeach
            <li><a href="{{route('trangchu.sanpham',['love'=>'proLove'])}}">Sản Phẩm yêu thích</a></li>
            <li><a href="{{route('trangchu.sanpham',['sale'=>'proSale'])}}">Sản phẩm giảm giá</a></li>
            <li><a href="">Liên hệ</a></li>
        </ul>
    </div>
    <div style="width:1000px;  position: relative;
        left: -270px;">
        <h2 style="text-align: center;margin-bottom:40px">Giỏ hàng của bạn</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tạm Tính</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $tong = 0;
                ?>
                @foreach($carts as $value)
                <?php $tong += ($value['so_luong']) * ($value['price']) ?>
                <tr>
                    <th scope="row"><a onclick="return window.confirm('bạn có muốn xóa không ?')" style="font-size:20px ;" href="{{route('cart.remove',['id'=>$value['id']])}}"><i style="color: red;" class="far fa-calendar-times"></i></a></th>
                    <td><img style="width:150px;height:150px" src="{{url('public/backend/img')}}/{{$value['img_produc']}}" alt=""></td>
                    <td>{{$value['name_product']}}</td>
                    <td>{{number_format($value['price'])}} Vnđ</td>
                    <form action="{{route('cart.update')}}" method="get">
                        @csrf @method('POST')
                        <input type="hidden" name="id" value="{{$value['id']}}">
                        <td>
                            <input style="width:100px" name="so_luong" type="number" size="10" value="{{$value['so_luong']}}" min="1">
                            <button type="submit" class="btn btn-primary"> update</button>
                        </td>
                    </form>

                    <td> {{number_format(($value['so_luong'])*($value['price']))}} Vnđ</td>
                </tr>
                @endforeach
                <tr>
                    <td><a href="{{route('cart.clear')}}">Xóa All</a> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <p> Tổng tiền : {{number_format($tong)}} Vnd</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{route('payment.index')}}">Thanh toán</a>
    </div>
    @endif
</div>
@stop()
@section('js')
<script src="{{url('public/backend')}}/js/trangchu.js"></script>
@stop()