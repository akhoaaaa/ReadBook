<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <style>
        li.li_search_ajax {
            padding: 5px 10px;
        }
        ul.dropdown-menu li a {
            text-transform: uppercase;
            color: black;
        }
    </style>
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha384-GLhlTQ8iUNdZLl21lnUqT6J/Ra5iIMx9MTNGxSTZ9Uq1z9S+XjB/TbdKUnM9PI" crossorigin="anonymous">

</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Đọc Truyện Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{url('/')}}">Trang chủ</a></li>
                        <li><a href="#">Danh mục</a>
                            <ul class="header__menu__dropdown">
                                @foreach($danhmuc as $key => $cate)
                                    <li><a href="{{route('danh-muc',[$cate->slug])}}">{{$cate->tendanhmuc}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#">Thể loại</a>
                            <ul class="header__menu__dropdown">
                                @foreach($theloai as $key => $loai)
                                    <li><a href="{{route('the-loai',[$loai->slug])}}">{{$loai->tentheloai}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="./blog.html">Tin tức</a></li>
                        <li><a href="./contact.html">Liên hệ</a></li>
                    </ul>

                </nav>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
<div class="container">
    <div class="row" style="justify-content: center; margin: 20px">
        <div class="col-md-6">
            <form autocomplete="off" class="d-flex" method="POST" action="{{url('search')}}">
                @csrf
                <input class="form-control me-2" id="keywords" type="search" name="tukhoa" placeholder="Nhập từ khóa tìm kiếm"
                       aria-label="Search">
                <div id="search_ajax"></div>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>

</div>
<!-- Hero Section Begin -->
@yield('content')

<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                    <h3>Trang đọc truyện</h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Liên hệ</h6>
                    <ul>
                        <li><a href="#">Thông tin</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        
                    </div>
                    <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('public/frontend/js/mixitup.min.js')}}"></script>
<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>

<script>
    $(document).ready(function(){
        $('#keywords').keyup(function (){
            var keywords = $(this).val();
            if(keywords != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('search-ajax') }}",
                    method: "POST",
                    data: {keywords: keywords, _token: _token},
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            } else {
                $('#search_ajax').fadeOut();
            }
        });
    });
    $(document).on('click','.li_search_ajax',function (){
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();
    });
</script>

<script>
    $(document).ready(function () {
        // Xử lý sự kiện khi thay đổi select ban đầu
        $('#select-chapter').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
        $('#select-chapter-bottom').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });


        // Xử lý sự kiện khi thay đổi select được tạo ra bởi "nice-select"
        $('.nice-select').on('change', function () {
            var url = $(this).find(':selected').data('value');
            if (url) {
                window.location = url;
            }
            return false;
        });

        // Đặt giá trị selected cho select ban đầu
        current_chapter();
    });

    function current_chapter() {
        var url = window.location.href;
        $('#select-chapter, #select-chapter-bottom').val(url);
        $('.nice-select').find('.current').text($('#select-chapter option:selected').text());
    }
</script>
</body>

</html>
