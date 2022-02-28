@extends('fontend.layoutMaster.layoutMain')
@section('title','Sản Phẩm')
@section('css')
<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
<link rel="stylesheet" href="{{url('public/backend')}}/css/deltai.css">
<style>
    .ckeckcomment {
        color: red;
        padding-bottom: 20px;

    }
</style>
@stop()
@section('layoutMain')
<?php

use App\Models\repComment;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

?>
<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
<div class="content">
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
        <div class="detail-products">
            <div class="slider-img">
                <img id="featured" style="width:400px;height:450px;" class="main-img" src="{{url('public/backend/img')}}/{{$dataDeltaiPro->img_produc}}" alt="">

                <div id="for_slick_slider" class="for_slick_slider">
                    @foreach($dataImg as $valueImg)
                    <div class="items">
                        <img class="thumbnail" src="{{url('public/backend/img')}}/{{$valueImg->image}}" alt="">
                    </div>
                    @endforeach
                </div>
                <button id="slideLeft" class="slideLeft"><i class="fas fa-angle-left"></i></button>
                <button id="slideRight" class="slideRight"><i class="fas fa-angle-right"></i></button>

            </div>
            <div class="information">

                <form action="{{route('cart.add')}}" method="get">
                    @csrf @method('POST')
                    <input type="hidden" name="id" value="{{$dataDeltaiPro->id}}">
                    <input type="hidden" name="name" value="{{$dataDeltaiPro->name_product}}">
                    <input type="hidden" name="img" value="{{$dataDeltaiPro->img_produc}}">
                    @if($dataDeltaiPro->sale==null))
                    <input type="hidden" name="price_sale" value="{{$dataDeltaiPro->price}}">
                    @else
                    <input type="hidden" name="price_sale" value="{{$dataDeltaiPro->sale}}">
                    @endif
                    <h2 class="product_title" itemprop="name">{{$dataDeltaiPro->name_product}}</h2>
                    <p class="sku"><span class="fontutm">Mã SP : </span><span style="color: #de8ebe;">{{$dataDeltaiPro->id}}</span></p>
                    @if($dataDeltaiPro->so_luong==0)
                    <p class="sku"><span class="fontutm">Số lượng : </span><span class="so_luongPro" style="color: #de8ebe;">Hết hàng</span></p>
                    @else
                    <p class="sku"><span class="fontutm">Số lượng : </span><span class="so_luongPro" style="color: #de8ebe;">{{$dataDeltaiPro->so_luong}}</span></p>
                    @endif
                    @if($dataDeltaiPro->sale==0))
                    <span class="fontutm">GÍA : </span> <span>{{number_format($dataDeltaiPro->price)}}
                        VND</span>
                    @else
                    <span class="fontutm">GÍA CŨ : </span> <span style="text-decoration: line-through;">{{number_format($dataDeltaiPro->price)}}
                        VND</span> <br>
                    <span class="fontutm">GiẢM GIÁ : </span> <span style="color: #de8ebe;">{{number_format($dataDeltaiPro->sale)}} VND</span>
                    @endif

                    <br>
                    <div class="quantity2">

                        <div class="tru"></div>
                        <input class="quantity" type="number" name='quantity' value="1" min="1" max="100" size="4">
                        <div class="cong">
                        </div>
                    </div>
                    <br>
                    @if($dataDeltaiPro->so_luong==0)
                    <input type="button" value="Hết hàng" class="submit">
                    @else

                    <input type="submit" value="Thêm vào giỏ hàng" class="submit">
                    @endif
                </form>
                <hr>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                MÔ TẢ SẢN PHẨM
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p style="font-family: 'Courier New', Courier, monospace;" class="introPro">
                                    {{$dataDeltaiPro->intro}}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div style="transform: translateY(-180px);" class="comment">
            <h3 style="margin-bottom: 20px;">Phản hồi về sản phẩm </h3>
            <span>Số kí tự: <span style="font-size: 20px;" id="numberComment">0</span></span>
            <form action="">
                {{ csrf_field() }}
                <textarea style="border-radius: 5px; padding:10px;" name="comment" id="comment" cols="50" rows="3" placeholder="Ít nhất 5 kí tự ,Nhiều nhất 500 kí tự"></textarea>

                <br>
                <span id="checkComment"></span>
                <br>
                <button id="btn-submit" type="submit"><i class='fas fa-paper-plane'></i> gửi</button>
            </form>
            <div style="margin-top: 30px;">

                <ul style="width:600px;list-style: none; position: relative
        ;
        left: -28px;" id="listComment">
                    @if(empty($dataComment[0]))
                    <div>
                        => Chưa có phản hồi cho sản phẩm !!!
                    </div>
                    @else
                    @foreach ($dataComment as $value)
                    <?php
                    $dataRep  = DB::table('repcomment')
                        ->join('users', 'repcomment.id_user', '=', 'users.id')
                        ->select('users.name', 'users.img', 'repcomment.*')
                        ->where('id_comment', '=', $value->id)
                        ->get();
                    //   dd($dataRep)
                    $number = count($dataRep);
                    ?>
                    <li>


                        <span><img style="border-radius: 50%;
 border: 2px solid black;
 width: 70px;
 height: 70px;" src="{{url('public/backend/img')}}/{{$value->img}}" alt=""></span>
                        <div style="position: relative;top:-70px;left:100px">
                            <span>{{ $value->name }}</span>
                            (
                            <span>
                                {{ date('d-m-Y', strtotime($value->created_at))}}

                            </span>
                            )
                            &nbsp
                            <span style="color:red"> @if($value->id_user == session('user')[0]->id)
                                <a data-url="{{route('trangchu.sanpham.deleteComment',['id_comment'=>$value->id])}}" class="btn-delete"> Xóa</a>
                                @endif</span>
                        </div>

                        <div>
                            <span style="position: relative;top:-40px;left:100px">{{$value->content}}</span>
                        </div>

                        <button class="submitRepComment">Trả lời</button>
                        @if(!empty($dataRep[0]))
                        <h4 class="numberComment" onclick="showRep(<?=$value->id?>)" style="font-family: 'Courier New', Courier, monospace; font-size: 14px;
        position: relative
        ;
     padding-left:150px">( Có {{$number}} Câu Trả Lời... )  </h4>
                        <div class="dataRepComment" id="dataRepComment{{$value->id}}" style="font-size: 12px;position: relative;
                                left: 150px;">


                            <ul style="width:400px;list-style: none; position: relative
                                 ;
                                    left: -28px;" id="listComment">

                                @foreach ($dataRep as $valueRep)

                                <li>


                                    <span><img style="border-radius: 50%;
                                         border: 2px solid black;
                                            width: 40px;
                                                   height: 40px;" src="{{url('public/backend/img')}}/{{$valueRep->img}}" alt=""></span>
                                    <div style="position: relative;top:-40px;left:60px">
                                        <span>{{ $valueRep->name }}</span>
                                        (
                                        <span>
                                            {{ date('d-m-Y', strtotime($valueRep->created_at))}}
                                        </span>
                                        )
                                        &nbsp
                                        <span style="color:red"> @if($valueRep->id_user == session('user')[0]->id)
                                            <a data-url="{{route('trangchu.sanpham.deleteRep',['id_Repcomment'=>$valueRep->id])}}" class="btn-deleteRep"> Xóa</a>
                                            @endif</span>
                                    </div>

                                    <div>
                                        <span style="position: relative;top:-20px;left:60px">{{$valueRep->repContent}}</span>
                                    </div>



                                </li>
                                <hr>
                                @endforeach





                            </ul>



                        </div>
  
                        @endif
                        <div class="formRep" style="display:none;margin-top:10px">
                            <form action="">
                                {{ csrf_field() }}
                                <input type="hidden" name="idComment" value="{{$value->id}}">
                                <input type="text" name="repComment" placeholder="....">
                                <button id="btn-repComment" class="btn-repComment" type=""><i class='fas fa-paper-plane'></i> gửi</button>
                            </form>
                        </div>
                    </li>
                    <hr>
                    @endforeach
                    {{$dataComment->appends(request()->all())->links()}}

                    @endif

                </ul>

            </div>
        </div>
        <div class="ProductsNew">
            <h2 style="   margin-bottom: 20px;" class="titleProductsNew">
                SẢN PHẨM LIÊN QUAN
            </h2>
            <div class="ProductAndIntro">
                @foreach($dataWhereCate as $valueWhere)
                <div style="width: 295px; " class="col">
                    <div style="width: 265px;" class="Product">
                        <div class="imgProducts">
                            <img class="logoNew" style="width:45px;height: 45px;" src="{{url('public/backend/img')}}/New-Logo.png" alt="">
                            <a href=""><img style="width: 290px;" class="id_img" src="{{url('public/backend/img')}}/{{$valueWhere->img_produc}}" alt=""></a>

                            <div id="bong_img" class="bong_img">

                                <a class="love {{$valueWhere->id}}" href="{{route('trangchu.sanpham.yeuthich',['idPro'=>$valueWhere->id])}}"> <i id="heart" class="far fa-heart"></i></a>
                                <i id="timkiem" class="fas fa-search"></i>

                                @if($valueWhere->so_luong==0)
                                <a class="abc" href="{{route('trangchu.sanpham.chitiet',['idPro'=>$valueWhere->id])}}">HẾT HÀNG ></a>
                                @else
                                <a class="abc" href="{{route('trangchu.sanpham.chitiet',['idPro'=>$valueWhere->id])}}">MUA HÀNG ></a>
                                @endif
                            </div>
                        </div>
                        <div class="intro">
                            <span>ID: SP{{$valueWhere->id}}</span>
                            <h3 style="margin-top: 10px;" class="namePro">{{$valueWhere->name_product}}</h3>
                            <h4 class="pricePro">{{number_format($valueWhere->price)}} VNĐ</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button id="arrow-prev" class=""><i class="fas fa-angle-left"></i></button>
            <button id="arrow-next"><i class="fas fa-angle-right"></i></button>

        </div>
    </div>


</div>
@stop()
@section('js')
<script src="{{url('public/backend')}}/js/deltai.js"></script>
<script>
    
     
   function showRep(id){
       $(function(){
           $('#dataRepComment'+id).toggle(100)
       })
   }
    $(document).ready(function() {
        var formRep = document.querySelectorAll('.formRep');
        var submitRepComment = document.querySelectorAll('.submitRepComment')
        var btn_repComment = document.querySelectorAll('.btn-repComment');
        var id_comment = document.querySelectorAll("input[name='idComment']");
        var repComment = document.querySelectorAll("input[name='repComment']")
        var numberComment = document.querySelectorAll('.numberComment');
        var dataRepComment = document.querySelectorAll('.dataRepComment');

console.log(numberComment)
 


     
        for (let index = 0; index < submitRepComment.length; index++) {
            submitRepComment[index].onclick = function() {
                formRep[index].style.display = "block"
                btn_repComment[index].onclick = function(e) {
                    e.preventDefault();
                  
                    var UrlSubmit = "{{route('trangchu.sanpham.repComment')}}"
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: UrlSubmit,
                        data: {
                            _token: _token,
                            idComment: id_comment[index].value,
                            repComment: repComment[index].value,
                        },
                        success: function(res) {


                            location.reload()
                            dataRepComment[index].style.display="block"
                        }
                    })
               
                }
            }

        }
        $('.btn-deleteRep').click(function() {
            var Commenturl = $(this).attr('data-url');

            if (confirm('bạn có muốn xóa bình luận không ?')) {
                $.ajax({
                    url: Commenturl,
                    success: function(res) {
                        Swal.fire({

                            icon: 'warning',
                            title: "xóa thành công",
                            showConfirmButton: false,
                            timer: 1500

                        });
                        location.reload();
                    }
                })
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            var Commenturl = $(this).attr('data-url');

            if (confirm('bạn có muốn xóa bình luận không ?')) {
                $.ajax({
                    url: Commenturl,
                    success: function(res) {
                        Swal.fire({

                            icon: 'warning',
                            title: "xóa thành công",
                            showConfirmButton: false,
                            timer: 1500

                        });
                        location.reload();
                    }
                })
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        var url = "{{route('trangchu.sanpham.showLove')}}"

        $.ajax({
            url: url,
            success: function(res) {
                for (const value of res.listLove) {

                    var a = document.getElementsByClassName(value.id_products)
                    for (const key of a) {
                        key.querySelector('.fa-heart').style.backgroundColor = "#de8ebe"
                        key.querySelector('.fa-heart').style.color = "white"
                    }
                }
            }
        })
    })
</script>
<script>
    var btnSubmit = document.querySelector('#btn-submit');
    $(document).ready(function() {
       
        var url = "{{route('trangchu.sanpham.comments',['idPro'=>$dataDeltaiPro->id])}}";
        btnSubmit.onclick = function(e) {

            e.preventDefault();
            console.log(url)
            var _token = $("input[name='_token']").val();
            var comment = $("textarea[name='comment']").val();
            $.ajax({
                url: url,

                data: {
                    _token: _token,
                    comment: comment
                },
                success: function(res) {
                    if (res.erro) {
                        console.log
                        $('#checkComment').attr('class', 'ckeckcomment')
                        $('#checkComment').html(res.erro)
                    } else {
                        $('#checkComment').html('Cám ơn bạn đã phản hồi cho chúng tôi ^.^')
                        // load_comment()
                        location.reload();
                    }
                }
            })

        }
    })
</script>
<script>
    var introPro = document.querySelector('.introPro')

    var biedoi = introPro.innerText
    introPro.innerHTML = biedoi;
</script>
<script>
    var comment = document.querySelector('#comment');
    comment.onkeyup = function() {
        var a = comment.value.length
        document.querySelector('#numberComment').innerHTML = a
    }
</script>
@stop()