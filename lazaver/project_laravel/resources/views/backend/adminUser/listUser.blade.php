@extends('backend.layoutMaster.adminMain')
@section('title','Danh sách sản phẩm')
@section('layoutMain')
<style>

</style>
<div class="container">
    @if(empty($dataUser[0]))

    <div style="      position: relative;
        margin-bottom: 150px;
        ">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="text-gray-500 mb-0">Không có Khách hàng</p>
            <a href="{{route('trangchu.sanpham')}}">&larr; Quay lại</a>
        </div>

    </div>
    @else
    <div style=" position: relative;
       ">
        <h2 style="text-align: center;margin-bottom:40px">Khách hàng của bạn</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên Khách</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Sdt</th>
                    <th scope="col">Đơn Hàng</th>
                    <th scope="col">Action</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; ?>
                @foreach($dataUser as $valueBill)
                <tr>
                    <th scope="row"><?= $index++ . "/" ?></th>
                    <td><img style="width:150px;height:150px" src="{{url('public/backend/img')}}/{{$valueBill->img}}" alt=""></td>
                    <td>{{$valueBill->name}}
                    </td>
                    <td>{{$valueBill->email}}</td>
                    <td>{{$valueBill->address}}</td>
                    <td>{{$valueBill->sdt}}</td>
                    <td><a href="{{route('cartAdmin.show',['id_user'=>$valueBill->id])}}"><img style="width:70px;height:50px" src="{{url('public/backend/img')}}/xem.gif" alt=""></a></td>
                   <td> <a href="" class="btn btn-danger deleteCate"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div>
            {{$dataUser->appends(request()->all())->links()}}
        </div>
    </div>
    @endif
</div>


@stop();
@section('js')
<script>
    var introUser = document.querySelectorAll('.introUser')
    var myName = document.querySelectorAll('.myName');
    for (const key in myName) {
        myName[key].onmouseover = function() {
            introUser[key].style.display = "block"

        }
    }
    for (const key in myName) {
        myName[key].onmouseout = function() {
            introUser[key].style.display = "none"

        }
    }
</script>
<script>
    $('.deleteCate').click(function(ev) {
        ev.preventDefault();
        var _href = $(this).attr('href');
        $('#form_delete').attr('action', _href);
        if (confirm('bạn có muốn xóa không')) {
            $('#form_delete').submit();
        }
    })
</script>
<script>
    var introPro = document.querySelectorAll('.introPro');

    for (const key of introPro) {
        var biedoi = key.innerText
        key.innerHTML = biedoi
    }
</script>
@stop();