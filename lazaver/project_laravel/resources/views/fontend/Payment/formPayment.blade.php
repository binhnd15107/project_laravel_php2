@extends('fontend.layoutMaster.layoutMain')
@section('title','Sản Phẩm')
@section('css')
<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
<link rel="stylesheet" href="{{url('public/backend')}}/css/thanhtoan.css">
<style>
    .container {}
</style>
@stop()
@section('layoutMain')
<div style="margin-bottom:250px" class="content">
    <div class="listProducts">
        <div style="" class="vnpay">
            <div class="titlePayment">
                <h2> THANH TOÁN</h2>
            </div>
            <div class="formPayment">
                <p style="font-family: 'Courier New', Courier, monospace;">->( Nếu không có thông tin cửa hàng sẽ lấy thông tin từ tài khoản)</p>
                <form action="{{route('payment.checkIntro')}}" method="get">
                    @csrf @method('POST')
             
                    <div>
                        <label for="">Họ Tên*</label><br>
                        <input name="name" value="{{$user->name}}" type="text" placeholder="nhập họ tên..." size="30">
                    </div>
                    <div>
                        <label for="">Email*</label><br>
                        <input name="email" value="{{$user->email}}" type="email" placeholder="nhập email..." size="30">
                    </div>
                    <div>
                        <label for="">Địa Chỉ*</label><br>
                        <input value="{{$user->address}}" name="address" type="text" placeholder="nhập địa chỉ..." size="30">
                    </div>
                    <div>
                        <label for="">SDT*</label> <br>
                        <input value="{{$user->sdt}}" name="sdt" type="number" placeholder="nhập SDT..." size="30">
                    </div>

                    <div>
                        <label for="">Ghi Chú*</label><br>
                        <textarea name="ghichu" name="" id="" cols="30" rows="4">Ghi Chú...</textarea>
                    </div>
                    <button type="submit">Đặt hàng</button>
                </form>
            </div>
        </div>
    </div>
    <div style="width:700px;  position: relative;
        left: 50px;">
        <h2 style="text-align: center;margin-bottom:40px">Đơn của bạn</h2>
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
                $index = 1
                ?>
                @foreach($carts as $value)
                <?php $tong += ($value['so_luong']) * ($value['price']) ?>
                <tr>
                    <th><?php echo $index++ ?></th>
                    <td><img style="width:150px;height:150px" src="{{url('public/backend/img')}}/{{$value['img_produc']}}" alt=""></td>
                    <td>{{$value['name_product']}}</td>
                    <td>{{number_format($value['price'])}} Vnđ</td>


                    <td>
                        {{$value['so_luong']}}

                    </td>


                    <td> {{number_format(($value['so_luong'])*($value['price']))}} Vnđ</td>
                </tr>

                @endforeach
                <tr>
                    <td></td>
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

    </div>


</div>
@stop()
@section('js')
<script src="{{url('public/backend')}}/js/trangchu.js"></script>
@stop()