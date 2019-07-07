@extends('master')

@section('body')
    <div class="container" >

        <div class="card">

            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h1 class="text-success ">Manage All Products</h1>
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table justify-content-center table-bordered col-12 table-responsive">
                            <tr class="text-center bg-dark">
                                <th>Id</th>
                                <th>Product Brand</th>
                                <th>Product Category</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                {{--<th>Product Short Details</th>--}}
                                {{--<th>Product Long Details</th>--}}
                                <th>Product Front Images</th>
                                <th>Product Side Images</th>
                                <th>Publication Status</th>
                                <th>Actions</th>
                            </tr>
                            @php($i=1)
                            @foreach($products as $product)

                                <tr class="text-center">
                                    <td> {{ $i++ }}</td>
                                    <td>{{ $product->cat_name }}</td>
                                    <td>{{ $product->brand_name }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->product_quantity  }}</td>
                                    {{--<td>{{ $product->short_info }}</td>--}}
                                    {{--<td>{{ $product->long_info }}</td>--}}
                                    <td>
                                        <img src="{{ asset($product->product_imageF) }}" alt="" height="100" width="100">
                                    </td>
                                    <td>
                                        <img src="{{ asset($product->product_imageS) }}" alt="" height="100" width="100">
                                    </td>
                                    <td>{{ $product->publication }}</td>
                                    <td>
                                        <a href="{{ route('productView',['id'=>$product->id]) }}" class="btn btn-primary btn-md">
                                            <i class="fas fa-book fa-sm"></i>
                                        </a>

                                        @if($product->publication == 1)
                                            <a href="{{ route('productUnp',['id'=>$product->id]) }}" class="btn btn-success btn-md">
                                                <i class="fas fa-arrow-circle-up fa-sm"></i>
                                            </a>
                                        @elseif($product->publication == 0)
                                            <a href="{{ route('productPub',['id'=>$product->id]) }}" class="btn btn-warning btn-md">
                                                <i class="fas fa-arrow-circle-down fa-sm"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('productEdit',['id'=>$product->id]) }}" class="btn btn-primary btn-md">
                                            <i class="fas fa-edit fa-sm"></i>
                                        </a>

                                        <a href="{{ route('productDelete',['id'=>$product->id]) }}" class="btn btn-danger btn-md">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </a>
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