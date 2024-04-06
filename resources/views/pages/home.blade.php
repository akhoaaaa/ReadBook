@extends('layout')

@section('content')

<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">

    <div class="container">
        <h3>Các thể loại hay</h3>

        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($theloai as $key => $loai)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('public/uploads/images/'.$loai->hinhanh)}}">
                        <h5><a href="{{route('the-loai',[$loai->slug])}}">{{$loai->tentheloai}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Truyện mới cập nhật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        <li data-filter=".oranges">Trong tuần</li>
                        <li data-filter=".fresh-meat">Trong tháng</li>
                        <li data-filter=".vegetables">Top view</li>
                        <li data-filter=".fastfood">Top cmt</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($truyens as $key => $tr)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="img-container">
                        <img src="{{ asset('public/uploads/images/'.$tr->hinhanh) }}" alt="">
                        <div class="slide-caption">
                            <!-- Nội dung của caption ở đây -->
                            <h4 style="white-space: nowrap;font-size: 20px;text-align: center;"><a style="color: #fff;font-weight: bold;" href="{{ route('truyen-tranh',[$tr->slug_truyen]) }}">{{ strtoupper($tr->tentruyen) }}</a></h4>
                            @if($tr->chapter->isNotEmpty())
                            @php
                            $latestChapter = $tr->chapter->sortByDesc('updated_at')->first();
                            $timeDiff = \Carbon\Carbon::parse($latestChapter->updated_at)->diffForHumans();
                            @endphp
                            <p style="color: #fff;text-align: center;margin-bottom: 0px;">
                                <a style="color: #fff;font-size: 14px;" href="{{ route('chap',[$latestChapter->slug]) }}">{{ $latestChapter->title }} </a>
                                <span style="display: inline-block; margin-left: 5px;font-size: 13px;">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>{{ $timeDiff }}</span>
                                </span>
                            </p>
                            @else
                            <p>Không có chapter</p>
                            @endif
                            <h5 style="text-align: center;color: #F1E2D4;"><i class="fa fa-eye"></i>15000</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

{{--<!-- Banner Begin -->--}}
{{--<div class="banner">--}}
{{-- <div class="container">--}}
{{-- <div class="row">--}}
{{-- <div class="col-lg-6 col-md-6 col-sm-6">--}}
{{-- <div class="banner__pic">--}}
{{-- <img src="{{asset('public/uploads/images/usericon-21.png')}}" alt="">--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="col-lg-6 col-md-6 col-sm-6">--}}
{{-- <div class="banner__pic">--}}
{{-- <img src="{{asset('public/uploads/images/usericon-21.png')}}" alt="">--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{--</div>--}}
{{--<!-- Banner End -->--}}

<!-- Latest Product Section Begin -->
<!-- <section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Truyện nổi bật</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="{{route('truyen-tranh',[4])}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>t00</span>
                                </div>
                            </a>

                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top được chọn nhiều</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>

                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top lượt xem</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>

                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<!-- <section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-m d-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-2.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-3.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<style>
    .featured__item {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
    }

    .featured__item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .img-container {
        width: 100%;
        height: 100%;
        position: relative;
    }
    .img-container img {
        width: 100%; 
    }

    .img-container .slide-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 5px;
        box-sizing: border-box;
        color: #fff;
    }
</style>
<!-- Blog Section End -->
@endsection