@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê chapter</div>

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
                            <th scope="col">Tên chapter</th>
                            <th scope="col">Slug chapter</th>
                            <th scope="col">Thuộc truyện</th>
                            <th scope="col">Kich hoạt</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($chapter as $key => $chap)
                            <tr>
                                <th>{{$key}}</th>
                                <td>{{$chap->title}}</td>
                                <td>{{$chap->slug}}</td>
                                <td>{{$chap->truyen->tentruyen}}</td>
                                <td>
                                    @if($chap->kichhoat==0)
                                        <span class="text text-danger"> chưa kích hoạt</span>
                                    @else
                                        <span class="text text-success"> kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('chapter.edit',[$chap->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('chapter.destroy',[$chap->id])}}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa chapter này?');" class="btn btn-danger">
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
