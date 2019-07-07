@extends('front-end')

@section('body')

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <link rel="stylesheet" href="{{ asset('/') }}/front-end/LoginForm/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}/front-end/LoginForm/css/font-awesome.css">

    <!--banner-->
    <div class="video-w3l" data-vide-bg="{{ asset('/') }}/front-end/LoginForm/video/1">
    {{--<div class="banner1">--}}
        {{--<div class="container">--}}
            {{--<h3><a href="{{ route('/') }}">Home</a> / <span>Shipping</span></h3>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--banner-->

    <hr/>
    <div class="container block well">
        <h2 align="center" class="text-Success"> Dear {{ Session::get('userName') }}, you have to give us the product shipping address where you want to receive your product. </h2>
    </div>
    <hr/>

    <!--content-->
    <div class="content">
        <!--login-->
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile form1">
                    <h3>Your Shipping Address Here...</h3>
                    <form action="{{ route('saveShipping') }}" method="post">
                        @csrf
                        <div class="key">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input  type="text" value="{{ $user->Username }}" name="Username"  required="">
                            <div class="clearfix"></div>
                        </div>
                        <div class="key">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input  type="text" value="{{ $user->Email }}" name="Email" required="">
                            <div class="clearfix"></div>
                        </div>

                        <div class="key">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <input  type="text" value="{{ $user->UserPhone }}" name="UserPhone"  required="">
                            <div class="clearfix"></div>
                        </div>

                        <div class="key">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <textarea class="form-control" type="text" class="key" name="address"  required=""> {{ $user->UserAddress }} </textarea>
                            <div class="clearfix"></div>
                        </div>

                        <div align="center">
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!--login-->
    </div>
    <!--content-->
    </div>

    <!-- js -->
    <script src="{{ asset('/') }}/front-end/LoginForm/js/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('/') }}/front-end/LoginForm/js/jquery.vide.min.js"></script>
    <!-- //js -->
@endsection