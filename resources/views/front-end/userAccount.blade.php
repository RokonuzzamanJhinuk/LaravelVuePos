@extends('front-end')

@section('body')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ route('/') }}">Home</a> / <span>My Account</span></h3>
        </div>
    </div>
    <!--banner-->

    {{--<hr/>--}}
    {{--<div class="container block well">--}}
        {{--<h2 align="center" class="text-Success">  </h2>--}}
    {{--</div>--}}
    {{--<hr/>--}}

    <hr/>
    <!--content-->
    <div class="container">
        <!--login-->
        <div class="container-fluid">
            <hr/>
            <div class="content">
                <div class="cart-items">
                    <div class="container">
                        <h2 align="center"> My All Submitted Orders. </h2>
                        @php($i = 1)
                        @foreach($orders as $item)
                            <div class="cart-header">
                                {{--<a href="{{ route('removeItem',['id'=>$item->id]) }}">--}}
                                {{--<div class="close1"> </div>--}}
                                {{--</a>--}}
                                <div class="cart-sec simpleCart_shelfItem">
                                    <div class="cart-item cyc">
                                        <h4>{{ $i++ }}.  Order Id:  0000{{ $item->id }}</h4>
                                    </div>
                                    <div class="cart-item-info">
                                        <h3><a href="#">Customer Name: {{ $item->Username }} </a><span> <b> Order Date & Time: {{ $item->created_at }} </b> </span></h3>

                                        <ul class="qty">
                                            <li>
                                                <h6> <b>Payment Type: {{ $item->payType }} </b> </h6>
                                                <br/>
                                                <h6> <b>Payment Status: {{ $item->payStatus }} </b> </h6>
                                            </li>

                                            <li> <h6> <b> Order Status: {{ $item->orderStatus }} </b> </h6> </li>
                                        </ul>

                                        <div class="delivery">
                                            <h6><b> Order Total Bill: {{ $item->totalBill }} BDT. </b> </h6>

                                            {{--<a class="btn btn-success" href="{{ route('userOrderInvoice',['id'=>$item->id]) }}"></a>--}}
                                            <a class="btn btn-success" href="{{ route('userBankPayDetails',['id'=>$item->id]) }}"> View Payment Details. </a>

                                            <div class="clearfix"></div>
                                        </div>


                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <hr/>
                            </div>
                            <hr/>
                        @endforeach
                    </div>





                </div>
                <!-- checkout -->
            </div>
        </div>
        <!--login-->
    </div>
    <hr/>
    <!--content-->
@endsection