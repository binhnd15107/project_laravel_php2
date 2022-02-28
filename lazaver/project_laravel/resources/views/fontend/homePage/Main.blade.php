@extends('fontend.layoutMaster.layoutMain')
@section('title','Trang chủ')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
@stop()
@section('layoutMain')
<div class="content">

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
        <div class="ProductsNew">
            <h2 class="titleProductsNew">
                SẢN PHẨM MỚI
            </h2>
            <div class="ProductAndIntro">
                @foreach($dataDog as $valueDog)
                <div class="Product">
                    <div class="imgProducts">
                        <img class="logoNew" style="width:45px;height: 45px;" src="{{url('public/backend/img')}}/New-Logo.png" alt="">
                        <a href=""><img class="id_img" src="{{url('public/backend/img')}}/{{$valueDog->img_produc}}" alt=""></a>

                        <div id="bong_img" class="bong_img">
                            <a class="love {{$valueDog->id}}" href="{{route('trangchu.sanpham.yeuthich',['idPro'=>$valueDog->id])}}"><i id="heart" class="far fa-heart"></i></a>
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
                @endforeach
            </div>
            <button id="arrow-prev" class=""><i class="fas fa-angle-left"></i></button>
            <button id="arrow-next"><i class="fas fa-angle-right"></i></button>

        </div>
        <div style="margin-top: 50px;" class="ProductsHot">
            <h2 class="titleProductshot">
                SẢN PHẨM BÁN CHẠY
            </h2>
            <div class="ProductAndIntro2">
                @foreach($dataCat as $valueCat)
                <div class="Product">
                    <div class="imgProducts">
                        <img class="logoNew" style="width:45px;height: 45px;" src="{{url('public/backend/img')}}/New-Logo.png" alt="">
                        <a href=""><img class="id_img" src="{{url('public/backend/img')}}/{{$valueCat->img_produc}}" alt=""></a>

                        <div id="bong_img" class="bong_img">
                            <a class="love {{$valueCat->id}}" href="{{route('trangchu.sanpham.yeuthich',['idPro'=>$valueCat->id])}}"> <i data-url="" id="heart" class="far fa-heart"></i></a>
                            <i id="timkiem" class="fas fa-search"></i>

                            @if($valueCat->so_luong==0)
                            <a class="abc" href="{{route('trangchu.sanpham.chitiet',['idPro'=>$valueCat->id])}}">HẾT HÀNG ></a>
                            @else
                            <a class="abc" href="{{route('trangchu.sanpham.chitiet',['idPro'=>$valueCat->id])}}">MUA HÀNG ></a>
                            @endif
                        </div>
                    </div>
                    <div class="intro">
                        <span>ID: SP{{$valueCat->id}}</span>
                        <h3 style="margin-top: 10px;" class="namePro">{{$valueCat->name_product}}</h3>
                        <h4 class="pricePro">{{number_format($valueCat->price)}} VNĐ</h4>
                    </div>
                </div>
                @endforeach
            </div>
            <button id="arrow-prev2" class=""><i class="fas fa-angle-left"></i></button>
            <button id="arrow-next2"><i class="fas fa-angle-right"></i></button>
        </div>
        <div style="margin-top: 50px;" class="accessory">
            <h2 class="titleaccessory">
                PHỤ KIỆN THÚ CƯNG
            </h2>
            <div class="ProductAndIntro3">
                @foreach($dataPk as $valuePk)
                <div class="Product">
                    <div class="imgProducts">
                        <img class="logoNew" style="width:45px;height: 45px;" src="{{url('public/backend/img')}}/New-Logo.png" alt="">
                        <a href=""><img class="id_img" src="{{url('public/backend/img')}}/{{$valuePk->img_produc}}" alt=""></a>
                        <div id="bong_img" class="bong_img">
                            <a class="love {{$valuePk->id}}" href="{{route('trangchu.sanpham.yeuthich',['idPro'=>$valuePk->id])}}"> <i id="heart" class="far fa-heart"></i></a>
                            <i id="timkiem" class="fas fa-search"></i>

                            @if($valuePk->so_luong==0)
                            <a class="abc" href="{{route('trangchu.sanpham.chitiet',['idPro'=>$valuePk->id])}}">HẾT HÀNG ></a>
                            @else
                            <a class="abc" href="{{route('trangchu.sanpham.chitiet',['idPro'=>$valuePk->id])}}">MUA HÀNG ></a>
                            @endif
                        </div>
                    </div>
                    <div class="intro">
                        <span>ID: SP{{$valuePk->id}}</span>
                        <h3 style="margin-top: 10px;" class="namePro">{{$valuePk->name_product}}</h3>
                        <h4 class="pricePro">{{number_format($valuePk->price)}} VNĐ</h4>
                    </div>
                </div>
                @endforeach

            </div>
            <button id="arrow-prev3" class=""><i class="fas fa-angle-left"></i></button>
            <button id="arrow-next3"><i class="fas fa-angle-right"></i></button>
        </div>

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