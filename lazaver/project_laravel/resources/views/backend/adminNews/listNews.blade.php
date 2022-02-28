@extends('backend.layoutMaster.adminMain')
@section('title','Danh sách sản phẩm')
@section('layoutMain')
<style>
    .controller {}
</style>
<div class="container">
    @if(empty($dataNews[0]))

    <div style="      position: relative;
        margin-bottom: 150px;
        ">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="text-gray-500 mb-0">Chưa có bài đăng nào</p>
            <a href="{{route('trangchu.sanpham')}}">&larr; Quay lại</a>
        </div>

    </div>
    @else
    <div style=" position: relative;
       ">

        <h2 style="text-align: center;margin-bottom:40px">Tin Tức</h2>
        <div style="   margin-bottom: 20px;">
            <h3><a style=" text-decoration: none; margin-left: 20px;   border: none ;border-radius: 11px ;font-size: 17px; background-color: black; color: white; padding: 10px;" href="{{route('adminNews.insert')}}">Thêm Tin tức</a></h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Ngày Đăng</th>
                    <th scope="col">Ngày Cập nhật </th>
                    <th scope="col">Chi tiết</th>
                    <th scope="col">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; ?>
                @foreach($dataNews as $value)
                <tr>
                    <th scope="row"><?= $index++ . "/" ?></th>
                    <td>{{$value->title}}
                    </td>
                    <td><img style="width:200px;height:100px" src="{{url('public/backend/img')}}/{{$value->img_poster}}" alt=""></td>
                    <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                    <td>{{date('d-m-Y',strtotime($value->updated_at))}}</td>
                    <td><a href="{{route('adminNews.deltai',['idNews'=>$value->id])}}"><img style="width:70px;height:50px" src="{{url('public/backend/img')}}/xem.gif" alt=""></a></td>
                    <td> <a data-url="{{route('adminNews.delete',['idNews'=>$value->id])}}" class="btn btn-danger deleteCate"><i class="fas fa-trash-alt"></i></a>
                        <a class="btn  btn-success " href="{{route('adminNews.edit',['idNews'=>$value->id])}}"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div>
            {{$dataNews->appends(request()->all())->links()}}
        </div>
    </div>
    @endif
</div>


@stop();
@section('js')
<script>
    $(function() {
        $('.deleteCate').click(function() {
        
            Swal.fire({
                title: 'Bạn có muốn xóa không?',
                text: "Nếu xóa sẽ không thể khôi phục!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                var urlNews = $(this).attr('data-url')
                // alert(urlNews)
                if (result.isConfirmed) {
                    $.ajax({
                        url: urlNews,
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Xóa Thành công!!!',
                                'success'
                            )
                        }
                    })
                  setTimeout(function(){
                    location.reload();
                  },1000)
                  

                }
            })
        })

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