@extends('backend.layoutMaster.adminMain')
@section('title','Danh sách sản phẩm')
@section('layoutMain')
<style>
    .conainer {}
</style>
<div class="container">
    @if(empty($dataBill[0]))

    <div style="      position: relative;
        margin-bottom: 150px;
        ">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="text-gray-500 mb-0">Không có đơn hàng</p>
            <a href="{{route('trangchu.sanpham')}}">&larr; Quay lại</a>
        </div>

    </div>
    @else
    <div style=" position: relative;
       ">
        <h2 style="text-align: center;margin-bottom:40px">Đơn hàng của bạn</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã Đơn</th>
                    <th scope="col">Tên Khách</th>
                    <th scope="col">Số Lượng sp</th>
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
                    <td onclick="showintro(<?= $valueBill->id ?>)" class="myName" style="text-decoration:underline;">{{$valueBill->user_name}}
                        <div class="introUser" id="introUser{{$valueBill->id}}" style="position: relative;display:none
     ;
     background-color: black;color: white;padding:10px;">
                            <p>Địa chỉ : {{$valueBill->user_address}} </p>
                            <p>Sđt: {{$valueBill->user_phone}} </p>
                            <p>Địa chỉ : {{$valueBill->user_email}} </p>
                            <p>Nội Dung: {{$valueBill->noidung}} </p>
                        </div>
                    </td>

                    <td>{{$valueBill->sl}}</td>
                    <td>{{number_format($valueBill->tong_tien)}} Vnđ</td>
                    <td>{{date('d-m-Y',strtotime($valueBill->created_at))}}</td>
                    <td><a href="{{route('cartAdmin.deltaiMycart',['id_transaction'=>$valueBill->id])}}"><img style="width:70px;height:50px" src="{{url('public/backend/img')}}/xem.gif" alt=""></a></td>

                    <form action="{{route('cartAdmin.update')}}" method="get">
                        @csrf @method('POST')
                        <input type="hidden" name="id_transaction" value="{{$valueBill->id}}">
                        <td> <select style="border-radius: 8px;" name="status" id="">
                                @if($valueBill->trang_thai==1)
                                <option value="{{$valueBill->trang_thai}}">chờ xác Nhận</option>

                                @elseif($valueBill->trang_thai==2)
                                <option value="{{$valueBill->trang_thai}}">Đang Giao</option>
                                @elseif($valueBill->trang_thai==3)
                                <option value="{{$valueBill->trang_thai}}">Hoàn Thành</option>
                                @endif
                                <option value="1">Chờ Xác Nhận</option>
                                <option value="2">Đang giao</option>
                                <option value="3">Hoàn Thành</option>

                            </select>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td>

                    </form>
                    @if($valueBill->trang_thai==1)

                    <td><a onclick="return window.confirm('bạn có muốn xóa không')" href="{{route('cartAdmin.cancelCart',['id_transaction'=>$valueBill->id])}}" class="btn btn-danger">Hủy Đơn</a></td>
                    @elseif($valueBill->trang_thai==2)
                    <td></td>
                    @else
                    <td><a href="{{route('cartAdmin.deleteCart',['id_transaction'=>$valueBill->id])}}" class="btn btn-danger">Xóa Đơn</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div>
            {{$dataBill->appends(request()->all())->links()}}
        </div>
    </div>
    @endif
</div>


@stop();
@section('js')
<script>
   function showintro(id){
 $(function() {
        // var introUser = document.querySelectorAll('.introUser')
                $('#introUser'+id).toggle(100)
    })
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