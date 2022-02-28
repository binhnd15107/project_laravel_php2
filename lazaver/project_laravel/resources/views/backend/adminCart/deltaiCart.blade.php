@extends('backend.layoutMaster.adminMain')
@section('title','Danh sách sản phẩm')
@section('layoutMain')
<style>
    .conainer {}
</style>
<div class="container">
    <div style=" position: relative;
       ">
        <div></div>
        <div style="width:1000px;  position: relative;
        left: 180px;">
            <h2 style="text-align: center;margin-bottom:40px">Chi tiết đơn hàng</h2>
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