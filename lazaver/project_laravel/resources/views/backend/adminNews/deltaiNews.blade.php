@extends('backend.layoutMaster.adminMain')
@section('title',' Sửa Tin Tức')
@section('css')
<style>
.cdonteiner{
   
}
</style>
@section('layoutMain')
<div class="container">
 <div style="width:930px;margin:auto;border: 4px solid black;padding:10px">
     <h2 style="margin-bottom: 50px;text-align:center;  ">{{$news->title}}</h2>
     <div>
         <img style="width:900px;height:500px" src="{{url('public/backend/img')}}/{{$news->img_poster}}" alt="">
     </div>
     <div>
         <p class="introPro">{{$news->content_one}}</p>
         <img style="width:900px;height:500px" src="{{url('public/backend/img')}}/{{$news->img_content}}" alt="">
     </div>
     <div>
     <p class="introPro">{{$news->content_two}}</p>
         <img style="width:900px;height:500px" src="{{url('public/backend/img')}}/{{$news->img_content_two}}" alt="">
     </div>
 </div>
</div>
@stop();
@section('js')
<script>
    var introPro = document.querySelectorAll('.introPro');

    for (const key of introPro) {
        var biedoi = key.innerText
        key.innerHTML = biedoi
    }
</script>
@stop();