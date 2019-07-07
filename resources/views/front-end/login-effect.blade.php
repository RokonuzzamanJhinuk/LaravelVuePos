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


    <div class="video-w3l" data-vide-bg="{{ asset('/') }}/front-end/LoginForm/video/1">
        <!--header-->
        <div class="header-w3l">
            <h1>
                <span>Log</span>In
                <span>T</span>o
                <span>H</span>M
            </h1>
        </div>
        <!--//header-->
        <div class="main-content-agile">
            <div class="sub-main-w3">
                <h2>Login Here
                    <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                </h2>
                <form action="{{ route('newUserLoginCheck') }}" method="post">
                    @csrf

                    @if ($errors->any())
                        <span class="text-danger"> {{$errors->first('EmailLogin')}}</span>
                    @endif
                    <div class="pom-agile">
                        <span class="fa fa-user-o" aria-hidden="true"></span>
                        <input placeholder="Your Email" name="EmailLogin" class="user" type="text" required="">
                    </div>

                    <span class="text-danger">{{ Session::get('message') }}</span>
                        @if ($errors->any())
                            <span class="text-danger"> {{$errors->first('PasswordLogin')}}</span>
                        @endif
                    <div class="pom-agile">
                        <span class="fa fa-key" aria-hidden="true"></span>
                        <input placeholder="Password" name="PasswordLogin" class="pass" type="password" required="">
                    </div>
                    <div class="sub-w3l">
                        <div class="sub-agile">
                            <input type="checkbox" id="brand1" value="">
                            <label for="brand1">
                                <span></span>Remember me</label>
                        </div>
                        <a href="#">Forgot Password?</a>
                        <div class="clear"></div>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2019 <a>HM Traders Ltd</a>. All rights reserved | Developed by
                <a href="#">Jibonto Jhinuk</a>
            </p>
        </div>
        <!--//footer-->
    </div>

    <!-- js -->
    <script src="{{ asset('/') }}/front-end/LoginForm/js/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('/') }}/front-end/LoginForm/js/jquery.vide.min.js"></script>
    <!-- //js -->
@endsection