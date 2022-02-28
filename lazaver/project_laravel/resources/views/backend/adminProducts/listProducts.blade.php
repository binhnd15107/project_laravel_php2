@extends('backend.layoutMaster.adminMain')
@section('title','Danh sách sản phẩm')
@section('layoutMain')
<div class="container">
@if(!empty($listPro[0]))
    <div class="titleProducts">
        <h2 style="text-align: center;font-size:25px">DANH SÁCH SẢN PHẨM</h2>
    </div>
    <div>
        <h3><a style=" text-decoration: none; margin-left: 20px;   border: none ;border-radius: 11px ;font-size: 17px; background-color: black; color: white; padding: 10px;" href="{{route('product.create')}}">Thêm Danh mục</a></h3>
    </div>

    <div style="padding: 20px;" class="listCate">

        <table style="padding: 10px;" class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá/sale</th>
                    <th>Số Lượng</th>
                    <th>Thông tin</th>
                    <th>Ảnh</th>
                    <th>Danh mục</th>
                    <th>Bình Luận</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listPro as $value) <tr>

                    <td>
                        {{$value->name_product}}
                    </td>
                    <td>{{$value->price}}/ <span class="badge badge-success">{{$value->sale}}</span></td>
                    @if($value->so_luong==0)
                    <td>Hết hàng</td>
                    @else
                    <td>{{$value->so_luong}}</td>
                    @endif
                    <td class="introPro">{{$value->intro}}</td>
                    <td><img style="width:200px;height:200px" src="{{url('public/backend/img')}}/{{$value->img_produc}}" alt=""></td>
                    <td>{{$value->joinCate->name}}</td>
                    <td><a href="{{route('admin.comment',['idPro'=>$value->id])}}"><img style="width:70px;height:40px" src="{{url('public/backend/img')}}/xem.gif" alt=""></a></td>
                    <td>
                        <a href="{{route('product.destroy',$value->id)}}" class="btn btn-danger deleteCate"><i class="fas fa-trash-alt"></i></a>
                        <a class="btn  btn-success " href="{{route('product.edit',$value['id'])}}"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="" method="post" id="form_delete">
            @csrf @method('DELETE')
        </form>
        <hr>
        <div>
            {{$listPro->appends(request()->all())->links()}}
        </div>
    </div>
@else

<div style="      position: relative;
        margin-bottom: 150px;
        ">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="text-gray-500 mb-0">Không Tìm Thấy sản phẩm !!!!</p>
            <a href="{{route('trangchu.sanpham')}}">&larr; Quay lại</a>
        </div>

    </div>
@endif
</div>


@stop();
@section('js')

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