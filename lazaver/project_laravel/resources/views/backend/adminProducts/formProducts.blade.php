@extends('backend.layoutMaster.adminMain')
@section('title','Thêm sản phẩm')
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
        <h2 style="text-align: center;font-size:25px">THÊM SẢN PHẨM</h2>
    </div>
    <div class="formProducts">
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <label for="">Tên Sản phẩm</label> <br>
                    <input size="80" name="name_product" type="text" placeholder="nhập sản phẩm...">
                    @error('name_product')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div>

                    <textarea placeholder="Thêm câu hỏi vào đây" name="intro" id="summernote"></textarea>
                    @error('intro')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit">Thêm</button>
            </div>
            <div>
                <div>
                    <label for="">Danh Mục</label> <br>
                    <select name="category_id" id="">
                        <option value="">Chọn danh mục</option>
                        @foreach($listCate as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('category_id')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Giá</label> <br>
                    <input type="number" name="price" placeholder="nhập giá...">
                    <br>
                    @error('price')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Giá sale</label> <br>
                    <input type="number" name="sale" placeholder="nhập giảm giá...">
                    <br>
                    @error('sale')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Ảnh sản phẩm</label> <br>
                    <input type="file" name="fileUpdate">
                    <br>
                    @error('img_produc')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Ảnh chi tiết</label> <br>
                    <input type="file" name="fileUpdates[]" multiple=" multiple">
                    <br>
                    @error('img_produc')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Số lượng</label> <br>
                    <input type="number" name="so_luong" placeholder="nhập số lượng...">
                    <br>
                    @error('so_luong')
                    <span class="ckeck_name">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </form>
    </div>
</div>
@stop();
@section('js')

<script>
    $('#summernote').summernote({
        placeholder: 'Nhập nội dung ...',
        tabsize: 2,
        height: 220,

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