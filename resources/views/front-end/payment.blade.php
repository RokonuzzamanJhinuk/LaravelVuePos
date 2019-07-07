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
    <div class="container block well">
        <h2 align="center" class="text-Success"> Dear {{ Session::get('userName') }}, You Have to choose a payment method to complete your online order . </h2>
    </div>
    <hr/>

    <!--content-->
    <div class="content">
        <!--login-->
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile form1">
                    <h3>Please Choose A Payment Method.</h3>
                    <form action="{{ route('saveOrder') }}" method="post">
                        @csrf

                        <table class="table table-bordered">
                          @if(Session::get('totalBill') >= 10000 )

                            <tr>
                                <th>Bank Payment:</th>
                                <td><input type="radio" name="pay_type" value="bank"></td>
                            </tr>
                          @else
                            <tr>
                                <th>BKash Payment:</th>
                                <td><input type="radio" name="pay_type" value="bkash"></td>
                            </tr>
                            <tr>
                                <th>Rocket Payment:</th>
                                <td><input type="radio" name="pay_type" value="rocket"></td>
                            </tr>
                            <tr>
                                <th>Mcash Payment:</th>
                                <td><input type="radio" name="pay_type" value="mcash"></td>
                            </tr>
                          @endif

                        </table>

                        <div align="center">
                            <input align="center" name="submit" type="submit" value="Confirm Order">
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