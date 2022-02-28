@extends('fontend.layoutMaster.layoutMain')
@section('title','Trang chủ')
@section('css')
<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
<style>
</style>
@stop()
@section('layoutMain')
<div class="content">
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
        <h2 style="text-align: center;margin-bottom:40px">Đơn hàng của bạn</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Mã Đơn</th>
                    <th scope="col">Ảnh </th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng Tiền</th>
                </tr>
            </thead>
            <tbody>

                <?php $index = 1;
                $tong = 0;
                ?>
                @foreach($dataBill as $valueBill)
                <?php $tong += $valueBill->tong_tien ?>
                <tr>
                    <th scope="row"><?= $index++ . "/" ?></th>
                    <td>MDH:{{$valueBill->id_transaction}}</td>
                    <td><img style="width:150px;height:150px" src="{{url('public/backend/img')}}/{{$valueBill->joinPro->img_produc}}" alt=""></td>
                    <td>{{$valueBill->joinPro->name_product}}</td>

                    <td>{{$valueBill->so_luong}}</td>
                    <td>{{number_format($valueBill->tong_tien)}} Vnđ</td>


                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tổng Bill : {{number_format($tong)}} Vnđ</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@stop()
@section('js')
<script src="{{url('public/backend')}}/js/trangchu.js"></script>
@stop()


