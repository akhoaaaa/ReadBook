@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Thêm chapter</div>

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
                    <form method="POST" style="margin: 20px" action="{{route('chapter.update',[$chapter->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" value="{{$chapter->title}}" name="title" placeholder="Nhập tiêu đề....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug chapter</label>
                            <input type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" value="{{$chapter->slug}}" name="slug" placeholder="Slug chapter....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội dung truyện</label>
                            <textarea id="noidung_chapter" name="noidung" class="form-control" rows="5" style="resize: none">{{$chapter->noidung}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thuộc truyện</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="idtruyen">
                                @foreach($truyen as $key => $tr)
                                    <option {{$chapter->idtruyen == $tr->id ? 'selected' : ''}} value="{{$tr->id}}">{{$tr->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="kichhoat">
                            @if($chapter->kichhoat == 0)
                                <option selected value="0">Không kích hoạt</option>
                                <option value="1">Kích hoạt </option>
                            @else
                                <option value="0">Không kích hoạt</option>
                                <option selected value="1">Kích hoạt </option>
                            @endif

                        </select>
                        <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm chapter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
