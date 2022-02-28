@extends('backend.layoutMaster.adminMain')
@section('title','Danh sách sản phẩm')
@section('layoutMain')
<div class="container">
    @if(!empty($dataComment[0]))
    <div class="titleProducts">
        <h2 style="text-align: center;font-size:25px">DANH SÁCH BÌNH LUẬN</h2>
    </div>
    <div>

    </div>

    <div style="padding: 20px;" class="listCate">

        <table style="padding: 10px;" class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Khách hàng</th>
                    <th>Nội Dung</th>
                    <th>Ngày Phản Hồi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataComment as $value) <tr>

                    <td>
                        {{$value->name}}
                    </td>
                    <td>{{$value->content}}</td>
                    <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                    <td>
                        <a data-url="{{route('admin.comment.delete',['idComment'=>$value->id])}}" class="btn btn-danger btn-delete"><i class="fas fa-trash-alt"></i></a>
                     
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      
        <hr>
        <div>
            {{$dataComment->appends(request()->all())->links()}}
        </div>
    </div>
    @else
    <div style="      position: relative;
        margin-bottom: 150px;
       ">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="text-gray-500 mb-0">Không có phản hồi cho sản phẩm này !!!</p>
            <a href="{{route('trangchu.sanpham')}}">&larr;Quay Lại</a>
        </div>

    </div>
    @endif

</div>


@stop();
@section('js')
<script>
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            var Commenturl = $(this).attr('data-url');
// alert(Commenturl)
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