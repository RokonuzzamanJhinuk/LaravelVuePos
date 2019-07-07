@extends('master')

@section('body')
    <div class="container" >

        <div class="card">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h3 class="text-success "> Order Information </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order No</th>
                                <td> 0000{{ $order->id }}</td>
                            </tr>

                            <tr>
                                <th>Order Total Bill</th>
                                <td>{{ $order->totalBill }} BDT.</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{ $order->orderStatus }}</td>
                            </tr>
                            <tr>
                                <th>Order Date & Time</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <hr/>

        <div class="card">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h3 class="text-success "> User Details Of This Order </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $user->Username }}</td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td>{{ $user->UserPhone }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $user->Email }}</td>
                            </tr>
                            <tr>
                                <th>Billing Address:</th>
                                <td>{{ $user->UserAddress }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <hr/>

        <div class="card">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h3 class="text-success "> Shipping Details Of This Order </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Delivery To</th>
                                <td>{{ $shipping->Username }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $shipping->UserPhone }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $shipping->Email }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Address</th>
                                <td>{{ $shipping->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <hr/>




        <div class="card">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h3 class="text-success "> Payments Details Of This Order </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order Payment Type</th>
                                <td>{{ $payment->payType }}</td>
                            </tr>

                            <tr>
                                <th>Order Payment Status</th>
                                <td>{{ $payment->payStatus }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <hr/>

        <div class="card">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h3 class="text-success "> All Ordered Products Details </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th> Total </th>
                            </tr>

                            @foreach($orderDetails as $detail)
                            <tr>
                                <td>{{ $detail->productId }}</td>
                                <td>{{ $detail->productName }}</td>
                                <td>{{ $detail->productPrice }} BDT.</td>
                                <td>{{ $detail->productQuantity }} </td>
                                <td>{{ $detail->productPrice*$detail->productQuantity }} BDT.</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


       <div>
           <a href="{{ route('orderInvoiceView',['id'=>$order->id]) }}" class="btn btn-warning" style="float: left;"> View Order Invoice </a>
           <a href="{{ route('orderUpdate',['id'=>$order->id]) }}" class="btn btn-warning" style="float: right;"> Update Order Info. </a>
       </div>
    </div>

    <hr/>
    <hr/>
@endsection