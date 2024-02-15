@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Cập nhật danh mục truyện</div>

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
                    <form method="POST" style="margin: 20px" action="{{route('theloai.update',[$viewtheloai->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control"  onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" name="tentheloai" placeholder="Tên thể loại...." value="{{$viewtheloai->tentheloai}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug danh mục</label>
                            <input type="text" class="form-control" id="convert_slug"  aria-describedby="emailHelp" name="slug" placeholder="Slug thể loại...." value="{{$viewtheloai->slug}}">
                        </div>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="kichhoat">
                            @if($viewtheloai->kichhoat == 0)
                                <option selected  value="0">Không kích hoạt</option>

                                <option value="1">Kích hoạt </option>
                            @else
                                <option value="0">Không kích hoạt</option>

                                <option selected value="1">Kích hoạt </option>
                            @endif

                        </select>
                        <button type="submit" class="btn btn-primary" name="themtheloai">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
