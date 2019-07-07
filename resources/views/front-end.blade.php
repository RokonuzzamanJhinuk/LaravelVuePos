<!--
Au
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title> {{ $basicInfo->company_name  }} </title>
    <!--css-->
    <link href="{{ asset('/') }}/front-end/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('/') }}/front-end/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/') }}/front-end/css/font-awesome.css" rel="stylesheet">
    <!--css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="{{ asset('/') }}/front-end/js/jquery.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!--search jQuery-->
    <script src="{{ asset('/') }}/front-end/js/main.js"></script>
    <!--search jQuery-->
    <script src="{{ asset('/') }}/front-end/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <!--mycart-->
    <script type="text/javascript" src="{{ asset('/') }}/front-end/js/bootstrap-3.1.1.min.js"></script>
    <!-- cart -->
    <script src="{{ asset('/') }}/front-end/js/simpleCart.min.js"></script>
    <!-- cart -->

    <!-- Login Effect -->

    <!--start-rate-->
    <script src="{{ asset('/') }}/front-end/js/jstarbox.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}/front-end/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!--//End-rate-->

    <script defer src="{{ asset('/') }}/front-end/js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}/front-end/css/flexslider.css" type="text/css" media="screen" />
    <script src="{{ asset('/') }}/front-end/js/imagezoom.js"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>

    <!--mycart-->
    <!--start-rate-->
    <script src="{{ asset('/') }}/front-end/js/jstarbox.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}/front-end/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!--//End-rate-->
    <link href="{{ asset('/') }}/front-end/css/owl.carousel.css" rel="stylesheet">
    <script src="{{ asset('/') }}/front-end/js/owl.carousel.js"></script>
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$("#owl-demo").owlCarousel({--}}
                {{--items : 1,--}}
                {{--lazyLoad : true,--}}
                {{--autoPlay : true,--}}
                {{--navigation : false,--}}
                {{--navigationText :  false,--}}
                {{--pagination : true,--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

    {{--<script src="{{ asset('/') }}/front-end/js/jquery-1.11.0.min.js"></script>--}}





</head>
<body>
<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-left">
                <a href="#"> Hot-line  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i>{{  $basicInfo->company_hotLine }} </a>
            </div>
            <div class="top-right">
                <ul>
                    <li><a href="{{ route('cartProductView') }}">Checkout</a></li>
                    @if( Session::get('userId') )
                        <li><a href="{{ route('newUserLogout') }}">LogOut</a></li>

                        @else
                        <li><a href="{{ route('newUserLogin') }}">Login</a></li>
                    @endif

                    @if(Session::get('userId'))
                        <li><a href="{{ route('userAccount') }}"> My Account </a></li>
                        @else
                            <li><a href="{{ route('newUserReg') }}"> Create Account </a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="{{ route('/') }}"><img src="{{ asset($basicInfo->company_logo) }}" style="height: 80px; width: 100px; border-radius: 8px;"> </a></h1>
                    <h5 style="color: whitesmoke; margin: 2px;">{{ $basicInfo->company_name }}</h5>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{ route('/') }}" class="act">Home</a></li>
                                <!-- Mega Menu -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="row">
                                            <div class="col-sm-3  multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                @foreach($allCategories as $category)
                                                    <li><a href="{{ route('catProducts',['id'=>$category->id]) }}">{{ $category->cat_name }}</a></li>
                                                @endforeach

                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands <b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="row">
                                            <div class="col-sm-3  multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                @foreach($allBrands as $brand)
                                                    <li><a href="{{ route('brandProducts',['id'=>$brand->id]) }}">{{ $brand->brand_name }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>

                                <li><a href="{{ route('userContact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                {{--<div class="logo-nav-right">--}}
                    {{--<ul class="cd-header-buttons">--}}
                        {{--<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>--}}
                    {{--</ul> <!-- cd-header-buttons -->--}}
                    {{--<div id="cd-search" class="cd-search">--}}
                        {{--<form action="#" method="post">--}}
                            {{--<input name="Search" type="search" placeholder="Search...">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="header-right2">
                    <div class="cart box_1">
                        <a href="{{ route('cartProductView') }}">
                            <h3> <div class="total">
                                    <span>Total {{ Session::get('totalBill') }} </span> (<span id="simpleCart_quantity">{{ Session::get('totalQuantity') }} </span> items)</div>
                                <img src="{{ asset('/') }}/front-end/images/bag.png" alt="" />
                            </h3>
                        </a>
                        <p><a href="{{ route('clearCart') }}" class="simpleCart_empty">Empty Cart</a></p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--header-->


@yield('body')

<!---footer--->
<div class="footer-w3l">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>About Us </h4>
                <p> {{ $basicInfo->aboutUs_info }} </p>
                <div class="social-icon">
                    <a href="{{ $basicInfo->fb_page }}"><i class="icon"></i></a>
                    <a href="{{ $basicInfo->twitter_page }}"><i class="icon1"></i></a>
                    <a href="{{ $basicInfo->gPlus_page }}"><i class="icon2"></i></a>
                    <a href="{{ $basicInfo->linkedIn_page }}"><i class="icon3"></i></a>
                </div>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>My Account</h4>
                <ul>
                    <li><a href="{{ route('cartProductView') }}">Checkout</a></li>
                    @if( Session::get('userId') )
                        <li><a href="{{ route('newUserLogout') }}">LogOut</a></li>
                    @else
                        <li><a href="{{ route('newUserLogin') }}">Login</a></li>
                    @endif

                    @if(Session::get('userId'))
                        <li><a href="{{ route('userAccount') }}"> My Account </a></li>
                    @else
                        <li><a href="{{ route('newUserReg') }}"> Create Account </a></li>
                    @endif
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>All Brands</h4>
                <ul>
                   @foreach($allBrands as $brand)
                    <li><a href="{{ route('brandProducts',['id'=>$brand->id]) }}">{{ $brand->brand_name }}</a></li>
                   @endforeach
                </ul>
            </div>
            <div class="col-md-3 footer-grid foot">
                <h4>Our Showroom</h4>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">{{ $basicInfo->company_address }}</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#"> {{ $basicInfo->company_hotLine }} </a></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:{{ $basicInfo->manager_cell }}"> {{ $basicInfo->manager_cell }}</a></li>

                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
<!---footer--->
<!--copy-->
<div class="copy-section">
    <div class="container">
        <div class="copy-left">
            <p>&copy; 2019 <a href="#">HM Traders Ltd.</a>  All rights reserved. | Developed by <a href="#">Jibonto Jhinuk</a> .</p>
        </div>
        <div class="copy-right">
            <img src="{{ asset('/') }}/front-end/images/card.png" alt=""/>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--copy-->


</body>
</html>