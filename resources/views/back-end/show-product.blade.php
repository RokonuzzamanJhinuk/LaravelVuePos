@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">View Product</h1>
                        </div>

                        <hr/>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>
                        <hr/>
                        <div class="card-group col-lg-12">
                            <h6 class="card-header col-4"> Product Name: </h6>
                            <div class="card-body col-6">
                                {{ $product->product_name }}
                            </div>

                        </div>

                        <div class="card-group col-lg-12">
                            <h6 class="card-header col-4"> Product Price: </h6>
                            <div class="card-body col-6">
                                {{ $product->product_price }}  BDT.
                            </div>

                        </div>

                        <div class="card-group col-lg-12">
                            <h6 class="card-header col-4"> Product Quantity: </h6>
                            <div class="card-body col-6">
                                {{ $product->product_quantity }}  P.
                            </div>

                        </div>

                        <div class="card-group col-lg-12">
                            <h6 class="card-header col-4"> Product Short Details: </h6>
                            <div class="card-body col-6">
                                {{ $product->short_info }}
                            </div>

                        </div>

                        <div class="card-group col-lg-12">
                            <h6 class="card-header col-4"> Product Long Details: </h6>
                            <div class="card-body col-6">
                                {{ $product->long_info }}
                            </div>

                        </div>

                        <div class="card-group col-lg-12">
                            <h6 class="card-header col-4"> Product Front Image: </h6>
                            <div class="card-body col-6">
                                <img src="{{ asset($product->product_imageF) }}" height="300" width="300">
                            </div>

                        </div>

                        <div class="card-group col-lg-12">
                            <h6 class="card-header col-4"> Product Side Image: </h6>
                            <div class="card-body col-6">
                                <img src="{{ asset($product->product_imageS) }}" height="300" width="300">
                            </div>

                        </div>

                        <hr/>
                        <hr/>

                        <div class="card-group col-lg-12" align="center">
                            <div class="card-body">
                                <a class="btn btn-primary col-8 btn-block" href="{{ route('productEdit',['id'=>$product->id]) }}" >Edit Product</a>

                                <a class="btn btn-success col-8 btn-block" href="{{ route('manageProduct') }}" >Manage Product</a>
                            </div>

                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection