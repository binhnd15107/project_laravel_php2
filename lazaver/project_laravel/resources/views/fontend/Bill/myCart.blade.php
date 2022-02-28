

@extends('fontend.layoutMaster.layoutMain')
@section('title','Trang chủ')
@section('css')
<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
<style>
</style>
@stop()
@section('layoutMain')
<div class="content">
    @if(empty($dataBill[0]))
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
        <h2 style="text-align: center;margin-bottom:40px">Đơn hàng của bạn</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã Đơn</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Chi Tiết</th>
                    <th scope="col">Trạng Thái</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>

                <?php $index = 1; ?>
                @foreach($dataBill as $valueBill)
                <tr>
                    <th scope="row"><?= $index++ . "/" ?></th>
                    <td>MDH:{{$valueBill->id}}</td>
                    <td>{{$valueBill->sl}}</td>
                    <td>{{number_format($valueBill->tong_tien)}} Vnđ</td>
                    <td>{{date('d-m-Y',strtotime($valueBill->created_at))}}</td>
                    <td><a href="{{route('cart.deltaiMyCart',['id_transaction'=>$valueBill->id])}}"><img style="width:70px;height:50px" src="{{url('public/backend/img')}}/xem.gif" alt=""></a></td>
                    @if($valueBill->trang_thai==1)

                    <td>Chờ xác Nhận</td>
                    @elseif($valueBill->trang_thai==2)
                    <td>Đang giao</td>
                    @else
                    <td>Hoàn Thành</td>
                    @endif
                    @if($valueBill->trang_thai==1)

                    <td><a onclick="return window.confirm('bạn có muốn xóa không')" href="{{route('cart.cancelCart',['id_transaction'=>$valueBill->id])}}" class="btn btn-danger">Hủy Đơn</a></td>
                    @elseif($valueBill->trang_thai==2)
                    <td></td>
                    @else
                    <td><a href="{{route('cart.deleteCart',['id_transaction'=>$valueBill->id])}}" class="btn btn-danger">Xóa Đơn</a></td>
                    @endif


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@stop()
@section('js')
<script src="{{url('public/backend')}}/js/trangchu.js"></script>
@stop()