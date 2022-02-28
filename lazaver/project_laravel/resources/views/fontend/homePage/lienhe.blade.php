@extends('fontend.layoutMaster.layoutMain')
@section('title','Sản Phẩm')
@section('css')
<link rel="stylesheet" href="{{url('public/backend')}}/css/trangchu.css">
<link rel="stylesheet" href="{{url('public/backend')}}/css/lienhe.css">
<style>

</style>
@stop()
@section('layoutMain')
<div class="content">
<div>
                <h2 style="color: #de8ebe;">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                <div>
                    <form class="formContact" action="">
                        <input type="text" name="Name_user" size="30" placeholder="Name*">
                        <br>
                        <input type="email" name="Email_user" size="30" placeholder="Email*">
                        <br>
                        <textarea name="mess" id="" cols="40" rows="10"> Message...</textarea>
                        <button type="submit"
                            style="border-radius: 10px; padding: 8px;color: white; background-color: black; border: none;margin-top: 20px;">POST
                            COMMENT</button>
                    </form>
                </div>
            </div>
            <div class="mapAddress">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59582.917346030576!2d105.82834721036382!3d21.035393315330232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad0cabda1f99%3A0xc1678814f9dea0cf!2zUGV0IE1hcnQgS2ltIE3DoyAtIEPhu61hIEjDoG5nIFRow7ogQ8awbmc!5e0!3m2!1sfr!2s!4v1642218781600!5m2!1sfr!2s"
                    width="700" height="550" style="border:1px solid black; padding: 10px;" allowfullscreen=""
                    loading="lazy"></iframe>
            </div>
</div>
@stop()
@section('js')

<script src="{{url('public/backend')}}/js/trangchu.js"></script>
@stop()