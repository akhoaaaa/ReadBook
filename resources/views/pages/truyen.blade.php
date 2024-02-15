@extends('layout')
@section('content')

    <section class="product-details spad" style="display: block">

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{route('danh-muc',[$danhmuctruyen->slug])}}">{{$danhmuctruyen->tendanhmuc}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="{{asset('public/uploads/images/'.$truyen->hinhanh)}}" alt="">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$truyen->tentruyen}}</h3>
                        <div class="row">
                            @foreach(explode(',', $truyen->theloai) as $theloaiID)
                                @php
                                    $theloai = App\Models\TheLoai::find($theloaiID);
                                @endphp
                                @if($theloai)
                                    <div class="det-hd-tag" title="{{ $theloai->tentheloai }}" data-report-eid="qi_C05">
                                        <a href="{{ route('the-loai', $theloai->slug) }}">
                                            {{ $theloai->tentheloai }}
                                        </a>
                                        <span><i class="fa fa-file"></i></span>
                                    </div>
                                @endif
                            @endforeach
                            <strong>
                                <span><i class="fa fa-book"></i>2,364 Chương</span>
                            </strong>
                            <strong>
                                <span><i class="fa fa-eye"></i>116.2M Lượt xem</span>
                            </strong>
                        </div>
                        <p>Tác giả: <a href="#"> {{$truyen->tacgia}}</a></p>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>


                        @if($chapter_dau==null)
                            <a class="primary-btn">Chưa cập nhật</a>
                        @else
                            <a href="{{route('chap',[$chapter_dau->slug])}}" class="primary-btn">Đọc truyện</a>

                        @endif
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                   aria-selected="true">Tóm tắt truyện</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                   aria-selected="false">Mục lục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                   aria-selected="false">Bình luận <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Tóm tắt</h6>
                                    <p>{{$truyen->mota}}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <ul class="mucluc">
                                        @php
                                            $mucluc = count($chapter)
                                        @endphp
                                        @if($mucluc == 0)
                                            <p>Truyện đang update........</p>
                                        @else
                                            @foreach($chapter as $key => $chap)
                                                <li><a href="{{route('chap',[$chap->slug])}}">{{$chap->title}}</a></li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Có thể bạn cũng thích</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($cungDanhMuc as $key => $cungdanhmuc)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                 data-setbg="{{asset('public/uploads/images/'.$cungdanhmuc->hinhanh)}}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>
                                    <a href="{{url('truyen-tranh',[$cungdanhmuc->slug_truyen])}}">{{$cungdanhmuc->tentruyen}}</a>
                                </h6>
                                <h5><i class="fa fa-eye"></i> 15000</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container">
        <p>Từ khóa tìm kiếm:</p>
        @php
        $tukhoa = explode(",",$truyen->tags);
//        print_r($tukhoa);
        @endphp
        <div class="row">
            <div class="tagcloud05">
                <ul>
                    @foreach($tukhoa as $key => $tr)
                    <li><a href="{{url('tag/'.\Str::slug($tr))}}"><span>{{$tr}}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <style>
        .mucluc {
            margin: 10px;
            list-style: none;
        }

        .mucluc li {
            margin: 10px;
        }

        .row {
            margin: 10px;
        }

        span {
            font-size: 15px;
        }

        a i {
            color: black;
        }

        strong {
            margin-left: 10px;
            margin-right: 10px;
        }

        .product__details__text p {
            margin-bottom: 10px;
            margin-left: 10px;
        }

        .row i {
            margin-right: 10px;
        }

        .product__details__rating i {
            margin-left: 10px;
        }

        .product__details__pic {
            display: flex;
        }

        .product-details {
            padding-top: 0;
        }

        .product__details__tab {
            padding-top: 10px;
        }

        .tagcloud05 ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .tagcloud05 ul li {
            display: inline-block;
            margin: 0 0 .3em 1em;
            padding: 0;
        }

        .tagcloud05 ul li a {
            position: relative;
            display: inline-block;
            height: 30px;
            line-height: 30px;
            padding: 0 1em;
            background-color: #3498db;
            border-radius: 0 3px 3px 0;
            color: #fff;
            font-size: 13px;
            text-decoration: none;
            -webkit-transition: .2s;
            transition: .2s;
        }

        .tagcloud05 ul li a::before {
            position: absolute;
            top: 0;
            left: -15px;
            content: '';
            width: 0;
            height: 0;
            border-color: transparent #3498db transparent transparent;
            border-style: solid;
            border-width: 15px 15px 15px 0;
            -webkit-transition: .2s;
            transition: .2s;
        }

        .tagcloud05 ul li a::after {
            position: absolute;
            top: 50%;
            left: 0;
            z-index: 2;
            display: block;
            content: '';
            width: 6px;
            height: 6px;
            margin-top: -3px;
            background-color: #fff;
            border-radius: 100%;
        }

        .tagcloud05 ul li span {
            display: block;
            max-width: 100px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .tagcloud05 ul li a:hover {
            background-color: #555;
            color: #fff;
        }

        .tagcloud05 ul li a:hover::before {
            border-right-color: #555;
        }
    </style>
    <script>
        $(function () {
            $('a').on('click', function () {
                return false;
            });
        });
    </script>
@endsection
