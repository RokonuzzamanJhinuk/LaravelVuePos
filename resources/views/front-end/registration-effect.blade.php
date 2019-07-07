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
                <span>Sign</span>Up
                <span>T</span>o
                <span>H</span>M
            </h1>
        </div>
        <!--//header-->
        <div class="main-content-agile">
            <div class="sub-main-w3">
                <h2>Register New Account Here
                    <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                </h2>
                <form action="{{ route('saveNewUser') }}" method="post">
                    @csrf

                    @if ($errors->any())
                        <span class="text-danger"> {{$errors->first('Username')}}</span>
                    @endif
                    <div class="key">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input  type="text" value="Your Name" name="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Full Name .';}" required="">
                        <div class="clearfix"></div>
                    </div>


                    @if ($errors->any())
                        <span class="text-danger"> {{$errors->first('Email')}}</span>
                    @endif
                    <div class="key">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input  type="text" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email.';}" required="">
                        <div class="clearfix"></div>
                    </div>


                    @if ($errors->any())
                        <span class="text-danger"> {{$errors->first('UserPhone')}}</span>
                    @endif
                    <div class="key">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input  type="text" value="Phone No" name="UserPhone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Contact Number .';}" required="">
                        <div class="clearfix"></div>
                    </div>


                    @if ($errors->any())
                        <span class="text-danger"> {{$errors->first('UserAddress')}}</span>
                    @endif
                    <div class="key">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <textarea class="form-control" type="text" value="Address" name="UserAddress" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Address Here.';}" required=""></textarea>
                        <div class="clearfix"></div>
                    </div>


                    @if ($errors->any())
                        <span class="text-danger"> {{$errors->first('Password')}}</span>
                    @endif
                    <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input  type="password" value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                        <div class="clearfix"></div>
                    </div>


                    <input class="btn btn-block" type="submit" value="Submit">
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