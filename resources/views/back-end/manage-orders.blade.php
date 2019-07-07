@extends('master')

@section('body')
    <div class="container" >

        <div class="card">

            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="text-center card-header">
                        <h1 class="text-success "> Manage All Orders </h1>
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table justify-content-center table-bordered col-12 table-responsive">
                            <tr class="text-center bg-dark">
                                <th>Id</th>
                                <th>Customer Name</th>
                                <th>Order Total Bill</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                            @php($i=1)
                            @foreach($orders as $order)

                                <tr class="text-center">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $order->Username }}</td>
                                    <td>{{ $order->totalBill }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->orderStatus }}</td>
                                    <td>{{ $order->payType }}</td>
                                    <td>{{ $order->payStatus }}</td>
                                    <td>
                                        <a href="{{ route('orderView',['id'=>$order->id]) }}" title="View Order Details" class="btn btn-primary btn-md">
                                            <i class="fas fa-book fa-sm"></i>
                                        </a>

                                        <a href="{{ route('orderInvoiceView',['id'=>$order->id]) }}" title="View Order Invoice" class="btn btn-warning btn-md">
                                            <i class="fas fa-book fa-sm"></i>
                                        </a>

                                        <a href="{{ route('orderUpdate',['id'=>$order->id]) }}" title="Order Info. Update" class="btn btn-success btn-md">
                                            <i class="fas fa-edit fa-sm"></i>
                                        </a>

                                        {{--<a href="{{ route('orderDelete',['id'=>$order->id]) }}" title="Order Delete" class="btn btn-danger btn-md">--}}
                                            {{--<i class="fas fa-trash fa-sm"></i>--}}
                                        {{--</a>--}}
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr/>
    <hr/>
@endsection