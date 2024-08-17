@extends('admin.layout')
@section('title', 'Danh sách danh mục')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách danh mục</h3>
                            </div>
                            @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>
                                                <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm
                                                    mới</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $stt => $category)
                                            <tr>
                                                <td>{{ $stt + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/'. $category->image )}}" width="50" alt="">
                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{route('categories.edit', $category)}}" class="btn btn-primary mr-1">Edit</a>
                                                    <form action="{{route('categories.destroy', $category)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa chứ ?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>


                            </div>
                            {{ $categories->links() }}
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
