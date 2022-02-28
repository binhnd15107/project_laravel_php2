@extends('backend.layoutMaster.adminMain')
@section('title','Danh mục sản Phẩm')
@section('layoutMain')
<div class="container">
    @if(!empty($listCate[0]))
    <div class="titleProducts">
        <h2 style="text-align: center;font-size:25px">DANH MỤC SẢN PHẨM</h2>
    </div>
    <div>

        <h3><a style=" text-decoration: none; margin-left: 20px;   border: none ;border-radius: 11px ;font-size: 17px; background-color: black; color: white; padding: 10px;" href="{{route('category.create')}}">Thêm Danh mục</a></h3>
    </div>

    <div style="padding: 20px;" class="listCate">

        <table style="padding: 10px;" class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Danh Sách sản Phẩm</th>
                    <th>Ngày Đăng</th>
                    <th>Ngày cập nhật</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listCate as $value)

                <tr>

                    <td>
                        {{$value['name']}}
                    </td>
                    <td><a href="{{route('product.index',['idCate'=>$value['id']])}}"><img style="width:70px;height:40px" src="{{url('public/backend/img')}}/xem.gif" alt=""></a></td>
                    <td> {{$value['created_at']->format('d-m-Y')}}</td>
                    <td>{{$value['created_at']->format('d-m-Y')}}</td>

                    <td>

                        <a href="{{route('category.destroy',$value['id'])}}" class="btn btn-danger deleteCate"><i class="fas fa-trash-alt"></i></a>
                        <a class="btn  btn-success " href="{{route('category.edit',$value['id'])}}"><i class="fas fa-edit"></i></a>
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
            {{$listCate->appends(request()->all())->links()}}
        </div>
    </div>
@else

<div style="      position: relative;
        margin-bottom: 150px;
        ">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="text-gray-500 mb-0">Không Tìm Thấy danh mục !!!</p>
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
@stop();