
@extends('front-end')

@section('body')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ route('/') }}">Home</a> / <span>My Shopping Cart</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->

    <div class="content">
        <div class="cart-items">
            <div class="container">
                <h2 align="center">My Shopping Bag Products:  {{ $total }} Piece.</h2>
                <?php Session::put('totalQuantity',$total)?>
                @php($i = 1)
                @php($sum = 0)
               @foreach($items as $item)
                <div class="cart-header">
                    <a href="{{ route('removeItem',['id'=>$item->id]) }}">
                        <div class="close1"> </div>
                    </a>
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class=""><h5>{{ $i }}.</h5> </div>
                        <div class="cart-item cyc">
                            <img src="{{ asset($item->attributes->imageF) }}" class="img-responsive" alt="Product Image">
                        </div>
                        <div class="cart-item-info">
                            <h3><a href="#"> {{ $item->name }} </a><span>Pickup time: </span></h3>

                            <ul class="qty">
                                <li>
                                        @csrf
                                        <h6> <b> Number Of Products: </b> </h6>
                                        <h6>{{ $item->quantity }}</h6>
                                </li>

                                <li><p>Delivery Fee: Negotieatable BDT.</p></li>
                            </ul>

                            <div class="delivery">
                                <p> Product Price : {{ $item->price }} BDT.</p>
                                <span>Delivered in 3-5 Working Day</span>
                                <div class="clearfix"></div>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <hr/>
                    <div class="container-fluid col-10">
                        <table class="table table-dark able-bordered">
                            <tr>
                                <td> <h5> {{ $i++ }}. </h5> </td>
                                <td> <h5> <b>Sub Total: </b> </h5> </td>
                                <td> <h5> <b>Quantity: {{ $item->quantity }} Piece </b> </h5> </td>
                                <td><p> <b>Price: {{ $item->price }} BDT.</b> </p> </td>
                                <td><h5> <b> Total: {{ $totalPrice = $item->price * $item->quantity }} BDT.</b> </h5> </td>
                            </tr>
                        </table>
                    </div>
                    <?php $sum = $totalPrice + $sum?>
                </div>
                    <hr/>
                @endforeach

                <div>
                    <table class="table table-bordered border-2">
                        <tr>
                            <td align="center"><h3> Grand Total </h3> </td>
                            <td align="center"><h3> Amount: <b>{{ $sum }}</b> BDT. </h3> </td>
                        </tr>
                        <tr>
                            <td align="center"><a href="{{ route('/') }}" class="btn btn-block btn-success">Back To Shopping</a> </td>


                         @if(Session::get('userId')  && Session::get('shippingId'))
                                <td align="center"> <a href="{{ route('userPayment') }}" class="btn btn-block btn-primary"> Proceed To CheckOut </a> </td>
                             @elseif(Session::get('userId'))
                                <td align="center"> <a href="{{ route('userShipping') }}" class="btn btn-block btn-primary"> Proceed To CheckOut </a> </td>
                             @else
                                <td align="center"> <a href="{{ route('checkOut') }}" class="btn btn-block btn-primary"> Proceed To CheckOut </a> </td>
                         @endif
                        </tr>
                    </table>
                </div>
                <?php Session::put('totalBill',$sum) ?>
            </div>
        </div>
        <!-- checkout -->
    </div>
@endsection