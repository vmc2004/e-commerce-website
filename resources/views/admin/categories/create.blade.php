@extends('admin.layout')
@section('title', 'Thêm danh mục')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm danh mục</h1>
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
                                Thêm danh mục
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                         <form action="{{ route('categories.store')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="mb-3">
                                <label class="form-label">Tên danh mục</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                           
                            <div class="mb-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input type="file" name="image" id="formFile" class="form-control">
                            </div>
                           
                           
                            <div class="mb-3">
                                <button class="btn btn-success">Thêm mới danh mục</button>
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
