@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Thêm truyện</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <form method="POST" style="margin: 20px" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                            <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" value="{{old('tentruyen')}}" name="tentruyen" placeholder="Tên truyện....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" value="{{old('slug')}}" name="slug_truyen" placeholder="Slug truyện....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" id="tacgia"  value="{{old('tacgia')}}" name="tacgia" placeholder="Tên tác giả....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                            <textarea name="mota" class="form-control" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="tags"  value="{{old('tags')}}" name="tags" placeholder="Nhập tags....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh mục truyện</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="iddanhmuc">
                                @foreach($danhmuc as $key => $cate)
                                <option value="{{$cate->id}}">{{$cate->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thể loại truyện</label>
                                @foreach($theloai as $key => $the)
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" name="theloai[]" value="{{$the->id}}" aria-label="...">
                                            {{$the->tentheloai}}
                                        </li>
                                @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form form-control"  name="hinhanh">
                        </div>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="kichhoat">
                            <option value="0">Không kích hoạt</option>
                            <option value="1">Kích hoạt </option>
                        </select>
                        <button type="submit" class="btn btn-primary" name="themtruyen">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
