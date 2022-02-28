@extends('backend.layoutMaster.adminMain')
@section('title','Thêm Tin Tức')
@section('css')
<style>
    form {
        margin-top: 30px;
        margin-left: 100px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 30px;
    }

    form input {

        padding: 10px;
        border: 2px dotted black;

        border-radius: 8px;
    }

    form button {
        margin-top: 15px;
        border: 2px dotted black;
        padding: 8px 25px;
        border-radius: 8px;
        background-color: black;
        color: white;

    }

    form button:hover {
        text-shadow: 2px 2px 2px white;
        transition: 0.5s;
    }

    label {
        margin-top: 10px;
        color: black;
        font-size: 20px;
    }

    .ckeck_name {
        color: red;


    }

    select {
        padding: 10px;
        border: 2px dotted black;
        border-radius: 8px;

    }
</style>
@section('layoutMain')
<div class="container">
    <div class="titleProducts">
        <h2 style="text-align: center;font-size:25px">THÊM TIN TỨC</h2>
    </div>
    <div class="formProducts">
        <form action="{{route('adminNews.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <label for="">Tiêu Đề</label> <br>
                    <input size="80" name="title" type="text" placeholder="nhập sản phẩm...">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <div>

                    <textarea name="content_one" placeholder="Thêm câu hỏi vào đây" name="content_one" id="summernote"></textarea>
                    @error('content_one')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                </div>
                <br>
                <div>

                    <textarea name="content_two" placeholder="Thêm câu hỏi vào đây" name="content_two" id="summernote2"></textarea>
                    @error('content_two')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                </div>
                <button type="submit">Thêm</button>
            </div>
            <div>

                <div>
                    <label for="">Ảnh Poster</label> <br>
                    <input type="file" name="imgone">
                    @error('img_poster')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                    <br>
                </div>
                <div>
                    <label for="">Ảnh 1</label> <br>
                    <input type="file" name="imgtwo" placeholder="nhập giảm giá...">
                    @error('img_content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                    <br>

                </div>
                <div>

                    <label for="">Ảnh 2</label> <br>
                    <input type="file" name="imgthree">
                    @error('img_content_two')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                    <br>
                </div>

            </div>
        </form>
    </div>
</div>
@stop();
@section('js')

<script>
    $('#summernote').summernote({
        placeholder: 'Nhập nội dung thứ nhất...',
        tabsize: 2,
        height: 150,

        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
<script>
    $('#summernote2').summernote({
        placeholder: 'Nhập nội dung thứ 2...',
        tabsize: 2,
        height: 150,

        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@stop();