@extends('layout')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{url('truyen-tranh/'.$chapter->truyen->slug_truyen)}}">{{$chapter->truyen->tentruyen}}</a></li>
                <li class="breadcrumb-item"><a href="{{url('chap',[$chapter->slug])}}">{{$chapter->title}}</a></li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>{{$chapter->truyen->tentruyen}}</h3>
                <p>Chương hiện tại: {{$chapter->title}}</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group d-flex align-items-center">
                <a {{$chapter->id == $min_id->id ? 'class=isDisable' : ''}} class="btn btn-primary"  href="{{url('chap/'.$previous)}}">< Chương trước</a>
                <select id="select-chapter" class="form-control mx-2 select-chapter" name="select-chapter">
                    @foreach($all_chapter as $key => $chap)
                        <option value="{{url('chap',[$chap->slug])}}">{{$chap->title}}</option>
                    @endforeach
                </select>
                <a {{$chapter->id == $max_id->id ? 'class=isDisable' : ''}} class="btn btn-primary"  href="{{url('chap/'.$next)}}">Chương tiếp ></a>
            </div>
        </div>

        <div class="col-md-12" >
            <div>
                <p>
                    {!! $chapter->noidung !!}
                </p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group d-flex a\\lign-items-center">
                <a {{$chapter->id == $min_id->id ? 'class=isDisable' : ''}} class="btn btn-primary"  href="{{url('chap/'.$previous)}}">< Chương trước</a>
                <select id="select-chapter-bottom" class="form-control mx-2 select-chapter" name="select-chapter">
                    @foreach($all_chapter as $key => $chap)
                        <option value="{{url('chap',[$chap->slug])}}">{{$chap->title}}</option>
                    @endforeach
                </select>
                <a {{$chapter->id == $max_id->id ? 'class=isDisable' : ''}} class="btn btn-primary"  href="{{url('chap/'.$next)}}">Chương tiếp ></a>
            </div>
        </div>
    </div>
    <style>
        .text-center {
            font-size: 20px;
        }

        .nice-select .option.selected {
            font-weight: unset;
        }
        .isDisable{
            pointer-events: none;
            opacity: 0.5;
            text-decoration: none;
        }
    </style>

@endsection
