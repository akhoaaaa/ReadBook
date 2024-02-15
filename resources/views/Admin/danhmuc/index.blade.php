@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê danh mục truyện</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug danh mục</th>
                            <th scope="col">Mô tả danh mục</th>
                            <th scope="col">Kich hoạt</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cates as $key => $cate)
                        <tr>
                            <th>{{$key}}</th>
                           <td>{{$cate->tendanhmuc}}</td>
                           <td>{{$cate->slug}}</td>
                            <td>{{$cate->mota}}</td>
                            <td>
                                @if($cate->kichhoat==0)
                                    <span class="text text-danger"> chưa kích hoạt</span>
                                @else
                                    <span class="text text-success"> kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('danhmuc.edit',[$cate->id])}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('danhmuc.destroy',[$cate->id])}}" method="POST" >
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có muốn xóa danh mục truyện này?');" class="btn btn-danger">
                                        Delete
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
