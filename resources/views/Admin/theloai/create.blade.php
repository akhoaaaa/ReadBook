@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Thêm danh mục truyện</div>

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
                    <form method="POST" style="margin: 20px" action="{{route('theloai.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                            <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" value="{{old('tentheloai')}}" name="tentheloai" placeholder="Tên thể loại....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug thể loại</label>
                            <input type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" value="{{old('slug')}}" name="slug" placeholder="Slug thể loại....">
                        </div>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="kichhoat">
                            <option value="0">Không kích hoạt</option>
                            <option value="1">Kích hoạt </option>
                        </select>
                        <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
