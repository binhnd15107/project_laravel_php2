@extends('backend.layoutMaster.adminMain')
@section('title','Danh sách sản phẩm')
@section('layoutMain')
<style>

</style>
<div class="container">
    <div>
        <div>
            <h2>Thêm ảnh </h2>
        </div>
        <form action="{{route('drive.storeImg')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input style="border-radius: 7px;padding:7px" type="text" name="nameFile" size="30" placeholder="Nhập Tên file...">

            <br>
            @error('nameFile')
            <span class="ckeck_name">{{ $message }}</span>
            @enderror
            <br>
            <input type="file" name="img" size="30">
            <br>
            @error('img')
            <span class="ckeck_name">{{ $message }}</span>
            @enderror
            <br>
            <button type="submit">add</button>
        </form>
    </div>
    <div>
        <div class="container">
            <div class="row row-cols-4">
                @foreach($contents as $value)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <iframe src="https://drive.google.com/file/d/{{$value['path']}}/preview" width="280" height="340" allow="autoplay"></iframe>
                        <div class="card-body">
                            <h5 class="card-title">{{$value['name']}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@stop();
@section('js')


@stop();