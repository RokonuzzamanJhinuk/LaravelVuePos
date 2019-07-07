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
            {{--<h3><a href="{{ route('/') }}">Home</a> / <span>Payment</span></h3>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--banner-->

    <hr/>
    {{--<div class="container block well">--}}
        {{--<h2 align="center" class="text-Success">  </h2>--}}
    {{--</div>--}}
    <hr/>

    <!--content-->
    <div class="content">
        <!--login-->
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile form1">
                    <h3>Dear Sir {{ Session::get('userName') }} , {{ Session::get('message') }}</h3>




                    <div >
                        <a href="{{ route('userAccount') }}" class="btn btn-block btn-primary"> GO TO My Account </a>
                    </div>

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