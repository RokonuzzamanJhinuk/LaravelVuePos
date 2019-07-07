@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Edit Order Info.</h1>
                        </div>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>
                        <form  action="{{ route('updateOrders') }}" method="POST"  name="productEditForm" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-bordered">
                                <tr>
                                    <th>Order Id:</th>
                                    <td>0000{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Name:</th>
                                    <td>{{ $user->Username }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Phone No:</th>
                                    <td>{{ $user->UserPhone }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date & Time:</th>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Type:</th>
                                    <td>{{ $payment->payType }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status Update:</th>
                                    <td>
                                        <input class="form-control" type="text" name="payStatus" value="{{ $payment->payStatus }}" placeholder="Add Payment Update With Full Details.">
                                        <input type="hidden" value="{{  $payment->id }}" name="paymentId">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order Status Update:</th>
                                    <td>
                                        <input class="form-control" type="text" name="orderStatus" value="{{ $order->orderStatus }}" placeholder="Add Order Update Info.">
                                        <input type="hidden" value="{{  $order->id }}" name="orderId">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Bill:</th>
                                    <td>{{ $order->totalBill }} BDT.</td>
                                </tr>
                            </table>

                            <button class="btn btn-success btn-user btn-block" type="submit" name="btn" value="submit">
                                Update Order Info
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection