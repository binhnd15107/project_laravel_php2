@extends('backend.layoutMaster.adminMain')
@section('title','Danh sách sản phẩm')
@section('css')
<style>
    .container {
        margin-top: 50px;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .formCate input {
        margin-top: 20px;
        margin-left: 150px;
        padding: 6px;
        border: 2px dotted black;
        border-radius: 8px;
    }

    .formCate button {
        border: 2px dotted black;
        padding: 6px;
        border-radius: 8px;
        background-color: black;
        color: white;

    }

    .formCate button:hover {
        text-shadow: 2px 2px 2px white;
        transition: 0.5s;
    }

    .ckeck_name {
        color: red;
        margin-left: 150px;

    }
</style>

@section('layoutMain')
<div class="container">
    <div>
        <div class="titleProducts">
            <h2 style="text-align: center;font-size:25px">SỬA DANH MỤC</h2>
        </div>
        <div class="formCate">
            <form action="{{route('category.update',$category['id'])}}" method="post">
                @csrf @method('PUT')
                <div>
                    <input name="name" type="text" value="{{$category['name']}}" size="40" placeholder="Nhập danh mục...">
                    <button type="submit">Update</button>
                    <br>
                    <br>
                    @error('name')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </div>

    </div>
    <div>
        <div class="titleProducts">
            <h2 style="text-align: center;font-size:25px">DANH MỤC SẢN PHẨM</h2>
        </div>

        <div style="padding: 20px;" class="listCate">
            <table style="padding: 10px;" class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
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
                        <td> {{date('d-m-Y',$value['ngay_dang'])}}</td>
                        <td> {{date('d-m-Y',$value['ngay_cap_nhat'])}}</td>
                        <td>
                            <a class="btn  btn-success " href="{{route('category.edit',$value['id'])}}"><i class="fas fa-edit"></i></a>
                            <a href="{{route('category.destroy',$value['id'])}}" class="btn btn-danger deleteCate"><i class="fas fa-trash-alt"></i></a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="" method="post" id="form_delete">
                @csrf @method('DELETE')

            </form>
            <div>
                {{$listCate->appends(request()->all())->links()}}
            </div>
        </div>
    </div>

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