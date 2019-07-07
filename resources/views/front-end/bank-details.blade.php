<html>
    <head>
        <link href="{{ asset('/') }}/front-end/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>

        {{--<link href="{{ asset('/') }}/front-end/css/font-awesome.css" rel="stylesheet">--}}

    </head>

    <body>
    <!--banner-->

    <hr/>

    <hr/>

    <!--content-->
    <div class="container">
        <!--login-->
        <div class="container-fluid well">
            <div class="">
                <div class="justify-content-center">
                    <h3 align="center"> Payment Deposit Slip </h3>


                    <hr/> <hr/> <hr/> <hr/>

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th class="col-sm-4">Bank Name:</th>
                            <td align="center" class="col-sm-6"><h4> {{ $account->bank_name }}//{{ $payment->payType }} </h4></td>
                            <td align="right" class="col-sm-2">Customer Copy</td>
                        </tr>
                        <tr>
                            <th>Account Number:</th>
                            <td align="center"><h4> <b> {{ $account->account_no }}/{{ $account->account_type }} </b></h4></td>
                            <td align="center" > Date & Time: <br> {{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Order Number:</th>
                            <td align="center"><h4> <b> 0000{{ $order->id }}/{{ $shipping->Username }} </b> </h4></td>
                            <td align="center"> Deposit Date:<br> -- --/-- --/-- -- -- --</td>
                        </tr>
                        <tr>
                            <td class="col-m-6" rowspan="1">
                                <table class="table table-responsive" >
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $shipping->Username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $shipping->Email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone No:</th>
                                        <td>{{ $shipping->UserPhone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $shipping->address }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td class="col-sm-6" colspan="2">
                                <table class="table table-responsive">
                                    <tr>
                                        <th>Id:</th>
                                        <th>Name:</th>
                                        <th>Quantity:</th>
                                        <th>Price:</th>
                                        <th>Total:</th>
                                    </tr>
                                 @php( $i = 0 )
                                 @foreach($orderDetails as $detail)
                                    <tr>
                                        <td> {{ $detail->productId }}</td>
                                        <td> {{ $detail->productName }} </td>
                                        <td> {{ $detail->productQuantity }} </td>
                                        <td> {{ $detail->productPrice }} BDT.</td>
                                        <td> {{ $detail->productQuantity * $detail->productPrice }} BDT. </td>
                                    </tr>
                                  @endforeach
                                </table>

                                <table class="table">
                                    <tr>
                                        <th> Total Payable:</th>
                                        <td align="right"> ={{ $order->totalBill }} BDT. </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td> Customer Signature <br> ----------------------------- </br> </td>

                            <td colspan="2" align="right"> Bank Seal & Signature  <br> ---------------------------------</br> </td>
                        </tr>

                    </table>
                    <hr/> <hr/> <hr/> <hr/> <hr/> <hr/>
                    <br> <br/>



                    <hr/> <hr/>
                    <hr/> <hr/>
                    <hr/>
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th class="col-sm-4">Bank Name:</th>
                            <td align="center" class="col-sm-6"><h4> {{ $account->bank_name }}/{{ $payment->payType }} </h4></td>
                            <td align="right" class="col-sm-2">Bank Copy</td>
                        </tr>
                        <tr>
                            <th>Account Number:</th>
                            <td align="center"><h4> <b> {{ $account->account_no }}/{{ $account->account_type }} </b></h4></td>
                            <td align="center" > Date & Time: <br> {{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Order Number:</th>
                            <td align="center"><h4> <b> 0000{{ $order->id }}/{{ $shipping->Username }} </b> </h4></td>
                            <td align="center">Deposit Date: <br> --/--/---- </td>
                        </tr>
                        <tr>
                            <td class="col-m-6" rowspan="1">
                                <table class="table table-responsive" >
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $shipping->Username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $shipping->Email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone No:</th>
                                        <td>{{ $shipping->UserPhone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $shipping->address }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td class="col-sm-6" colspan="2">
                                <table class="table table-responsive">
                                    <tr>
                                        <th>Sl:</th>
                                        <th>Name:</th>
                                        <th>Quantity:</th>
                                        <th>Price:</th>
                                        <th>Total:</th>
                                    </tr>

                                    @foreach($orderDetails as $detail)
                                        <tr>
                                            <td> {{ $detail->productId }}</td>
                                            <td> {{ $detail->productName }} </td>
                                            <td> {{ $detail->productQuantity }} </td>
                                            <td> {{ $detail->productPrice }} BDT.</td>
                                            <td> {{ $detail->productQuantity * $detail->productPrice }} BDT. </td>
                                        </tr>
                                    @endforeach
                                </table>

                                <table class="table">
                                    <tr>
                                        <th> Total Payable:</th>
                                        <td align="right"> ={{ $order->totalBill }} BDT. </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td> Customer Signature <br> ----------------------------- </br> </td>

                            <td colspan="2" align="right"> Bank Seal & Signature  <br> ---------------------------------</br> </td>
                        </tr>


                    </table>

                </div>

            </div>
        </div>
        <!--login-->
    </div>
    </body>
</html>