@extends('admin.layout')
@section('title', 'Thêm sản phẩm')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Text Editors</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Thêm sản phẩm
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                         <form action="{{ route('products.store')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Code</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên danh mục</label>
                                <select name="category_id" id="">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thương hiệu</label>
                                <select name="brand_id" id="">
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{ $brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hình</label>
                                <input type="file" name="image" id="formFile" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá giảm</label>
                                <input type="number" name="sale_price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" id="summernote" rows="6"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chất liệu</label>
                                <textarea id="material" name="material"></textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" id="add_variant">Thêm biến thể</button>
                            </div>
                            <div class="mb-3 border" id="variant">

                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success">Thêm mới sản phẩm</button>
                            </div>
                         </form>

                        </div>

                    </div>
                </div>
                <!-- /.col-->
            </div>

        </section>

        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- Summernote -->
    <script src="{{ asset('/asset/admin/') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
            $('#material').summernote()
            // CodeMirror
            // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            //     mode: "htmlmixed",
            //     theme: "monokai"
            // });
        });
    </script>
    <script>
        var add_variant = document.querySelector('#add_variant');
        var variant = document.querySelector('#variant');   
        var html = ``;
        add_variant.addEventListener('click', function(e){
            e.preventDefault();
            html =`
            <div class="mb-3">
                <label class="form-label">Chọn màu</label>
                        <select name="color_id[]" id="">
                            @foreach ($colors as  $color)
                                <option value="{{$color->id}}">{{ $color->name}}</option>
                            @endforeach
                        </select>     
            </div>

            <div class="mb-3">
                <label class="form-label">Chọn Size</label>
                    <select name="size_id[]" id="">
                        @foreach ($sizes as  $size)
                            <option value="{{$size->id}}">{{ $size->name}}</option>
                        @endforeach
                    </select>       
            </div>
            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                    <input type="number" value="0" name="quantity" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                    <input type="file" name="hinh[]" class="form-control" >
            </div>
            `;
            variant.innerHTML += html;
        })
    </script>

@endsection