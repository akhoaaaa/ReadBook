@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê truyện</div>

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
                            <th scope="col">Tên truyện</th>
                            <th scope="col">Slug truyện</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Kich hoạt</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_truyen as $key => $truyen)
                            <tr>
                                <th>{{$key}}</th>
                                <td>{{$truyen->tentruyen}}</td>
                                <td>{{$truyen->slug_truyen}}</td>
                                <td><img src="{{asset('public/uploads/images/'.$truyen->hinhanh)}}" height="100"
                                         width="100"></td>
                                <td>{{$truyen->danhmuc->tendanhmuc}}</td>
                                <td>@php
                                        $theloaiIDs = explode(",", $truyen->theloai);
                                        $tenTheLoai = [];
                                  foreach ($theloaiIDs as $theloaiID) {
                                         $theloai = App\Models\TheLoai::find($theloaiID);
                                    if ($theloai) {
                                        $tenTheLoai[] = $theloai->tentheloai;
                                    }
                                     }
                                    echo implode(", ", $tenTheLoai);
                                    @endphp
                                </td>
                                <td>{{$truyen->created_at}} - {{$truyen->created_at->diffforHumans()}}</td>
                                <td>
                                    @if($truyen->kichhoat==0)
                                        <span class="text text-danger"> chưa kích hoạt</span>
                                    @else
                                        <span class="text text-success"> kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('truyen.edit',[$truyen->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('truyen.destroy',[$truyen->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa truyện này?');"
                                                class="btn btn-danger">
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
