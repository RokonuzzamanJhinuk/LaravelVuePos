<html>

<head>

    <title>Order Invoice</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        /*.invoice-box table {*/
            /*width: 100%;*/
            /*line-height: inherit;*/
            /*text-align: left;*/
        /*}*/

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
             border-top: 2px solid #eee;
             font-weight: bold;
         }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>



    <div class="invoice-box">

        <h3 align="center"> Order Invoice </h3>
        <hr/>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{--<img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">--}}
                                <h3 style="color: #BF8020"> HM Traders Ltd.</h3>
                            </td>

                            <td align="right">
                                Order Id #: 0000{{ $order->id }}<br>
                                Created: {{ $order->created_at }}<br>
                                Delivery: 3-5 Working Day .
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <h3> From:</h3>
                                HM Traders Ltd.<br>
                                63/Ka , Shahid Selina Parvin Shawrani ,<br>
                                Mogbazar Mor , Dhaka-1217<br>
                                Hotline: 01639-479196 .
                            </td>

                            <td>
                                <h3> Shipping To:</h3>
                                {{ $shipping->Username }}<br>
                                Cell: {{ $shipping->UserPhone }}<br>
                                Email: {{ $shipping->Email }}<br>
                                Address: {{ $shipping->address }} .
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="heading">
                <td> Payment Method </td>
                <td> {{ $payment->payType }} Pay </td>
            </tr>

            <tr class="details">
                <td> Payment Status </td>
                <td>{{ $payment->payStatus }}</td>
            </tr>

        </table>

        <hr/>

        <table class="table" align="center">

            <tr class="heading">
                <td>Item Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total Price</td>
            </tr>

            @foreach($orderDetails as $item)
            <tr class="item">
                <td>{{ $item->productId }} , {{ $item->productName }}</td>
                <td>{{ $item->productPrice }} BDT.</td>
                <td>{{ $item->productQuantity }}</td>
                <td>{{ $item->productPrice*$item->productQuantity }} BDT. </td>
            </tr>
            @endforeach

            <tr class="total">
                <td></td>
                <td> </td>
                <td> </td>
                <td>Total:{{ $order->totalBill }}  BDT.</td>
            </tr>
        </table>
        <hr/>

        <br><p style="float: left;"> --------------------------- <br> Customer Signature </p>

        <p style="float: right;"> --------------------------------- <br> Official Seal & Signature</p>
    </div>

</body>

</html>