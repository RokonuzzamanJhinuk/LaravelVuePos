
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
    <!--banner-->
    {{--<div class="banner1">--}}
        {{--<div class="container">--}}
            {{--<h3><a href="index.html">Home</a> / <span>Checkout</span></h3>--}}
        {{--</div>--}}
    {{--</div>--}}
    <hr/>
    <!--banner-->
    <div class="container block well">
        <h2 align="center" class="text-danger"> Please LogIn Or Register New account To Proceed . </h2>
    </div>
    <hr/>
    <hr/>

    <!--content-->
    <div class="container" >
        <div class="card col-10 col-offset-2">

            <div class="card  col-md-8 col-md-offset-1 col-lg-4 col-lg-offset-1  float-left well">
                <div class="form-w3agile form1 card-body col-4">
                    <h3 class="card-header">Create An Account</h3>
                    <form action="{{ route('userReg') }}" method="post">
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

            <div class="col-md-8 col-lg-4 float-left">

            </div>



            <div class="card col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-2 float-left well">
                <!--content-->
                {{--<br/> <br/> <br/> <br/>--}}
                <div class="card-body">
                    <div class="form-w3agile">
                        <h3>Login To HM</h3>

                        <h5 class="text-warning">{{ Session::get('message') }}</h5>
                        <hr/>
                        <form action="{{ route('userCheckoutLogin') }}" method="post">
                            @csrf


                            @if ($errors->any())
                                <span class="text-danger"> {{$errors->first('EmailLogin')}}</span>
                            @endif
                            <div class="key">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input  type="text" value="Email" name="EmailLogin" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                <div class="clearfix"></div>
                            </div>


                            @if ($errors->any())
                                <span class="text-danger"> {{$errors->first('PasswordLogin')}}</span>
                            @endif
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password" value="Password" name="PasswordLogin" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" value="Login">
                        </form>
                    </div>
                    <div class="forg card-footer">
                        <a href="#" class="forg-right">Forgot Password</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr/>
</div>

    <!-- js -->
    <script src="{{ asset('/') }}/front-end/LoginForm/js/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('/') }}/front-end/LoginForm/js/jquery.vide.min.js"></script>
    <!-- //js -->
@endsection