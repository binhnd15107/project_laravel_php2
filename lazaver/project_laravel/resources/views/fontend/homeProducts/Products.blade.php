@extends('fontend.layoutMaster.layoutMain')
@section('title','Sản Phẩm')
@section('css')
<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
<style>
    .container {}
</style>
@stop()
@section('layoutMain')
<div class="content">
    @if($dataDog[0]==null)
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
    <div>

        <div style="      position: relative;
        margin-bottom: 150px;
        left: -300px;" class="container-fluid">

            <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="text-gray-500 mb-0">Không tìm thấy sản phẩm</p>
                <a href="{{route('trangchu.sanpham')}}">&larr; Danh sách sản phẩm</a>
            </div>

        </div>
        @else
        <div class="listProducts">
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
        <div>
            <h3 style="color: #de8ebe;font-size: 25px;    position: relative;
                 left:450px;margin-bottom: 20px;">danh mục sản phẩm</h3>

            <div style="width:1400px" class="row row-cols-4">

                @foreach($dataDog as $valueDog)
                <div style="width: 295px; " class="col">
                    <div style="width: 265px;" class="Product">
                        <div class="imgProducts">
                            <img class="logoNew" style="width:45px;height: 45px;" src="{{url('public/backend/img')}}/New-Logo.png" alt="">
                            <a href=""><img style="width: 290px;" class="id_img" src="{{url('public/backend/img')}}/{{$valueDog->img_produc}}" alt=""></a>

                            <div id="bong_img" class="bong_img">

                            <a class="love {{$valueDog->id}}" href="{{route('trangchu.sanpham.yeuthich',['idPro'=>$valueDog->id])}}"> <i id="heart" class="far fa-heart"></i></a>
                                <i id="timkiem" class="fas fa-search"></i>
                                @if($valueDog->so_luong==0)
                            <a class="abc" href="{{route('trangchu.sanpham.chitiet',['idPro'=>$valueDog->id])}}">HẾT HÀNG ></a>
                            @else
                            <a class="abc" href="{{route('trangchu.sanpham.chitiet',['idPro'=>$valueDog->id])}}">MUA HÀNG ></a>
                            @endif
                              
                            </div>
                        </div>
                        <div class="intro">
                            <span>ID: SP{{$valueDog->id}}</span>
                            <h3 style="margin-top: 10px;" class="namePro">{{$valueDog->name_product}}</h3>
                            <h4 class="pricePro">{{number_format($valueDog->price)}} VNĐ</h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <hr>
            <div>
                {{ $dataDog->appends(request()->all())->links()}}
            </div>


        </div>
        @endif
    </div>
</div>
@stop()
@section('js')
<script>
    $(document).ready(function() {
        var url = "{{route('trangchu.sanpham.showLove')}}"
        console.log(url)
        $.ajax({
            url: url,
            success: function(res) {
                for (const value of res.listLove) {
                    console.log(value)
                    var a = document.getElementsByClassName(value.id_products)
                    for (const key of a) {
                        key.querySelector('.fa-heart').style.backgroundColor="#de8ebe"
                        key.querySelector('.fa-heart').style.color="white"
                    }
                }
            }
        })
    })
</script>
<script src="{{url('public/backend')}}/js/trangchu.js"></script>
@stop()