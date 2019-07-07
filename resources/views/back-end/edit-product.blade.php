@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Edit Product</h1>
                        </div>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>
                        <form  action="{{ route('updateProduct') }}" method="POST"  name="productEditForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label> Product Category: </label>
                                <select class="form-control" name="category_id">
                                    <option> ----- Select Category Name -----</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('category_id')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Product Brand: </label>
                                <select class="form-control" name="brand_id">
                                    <option> ----- Select Brand Name -----</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('brand_id')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Product Name: </label>
                                <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control form-control-user" placeholder="Product Name">
                                <input type="hidden" value="{{$product->id}}" name="id">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('product_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Product Price: </label>
                                <input type="number" value="{{ $product->product_price }}" name="product_price" class="form-control form-control-user" placeholder="Product Price">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('product_price')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Product Quantity: </label>
                                <input type="number" name="product_quantity" value="{{ $product->product_quantity }}" class="form-control form-control-user" placeholder="Product Quantity">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('product_quantity')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Short Description: </label>
                                <textarea name="short_info" class="form-control form-control-user" value="" placeholder="Products Short Details.">{{ $product->short_info }}</textarea>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('short_info')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Long Description: </label>
                                <textarea name="long_info" id="editor" class="form-control form-control-user" value="" placeholder="Products Long Details."> {{ $product->long_info }} </textarea>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('long_info')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Product Front Image: </label>
                                <input type="file" name="product_imageF" accept="image/*" class="form-control form-control-user">
                                <img src="{{ asset($product->product_imageF) }}" height="300" width="300">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('product_imageF')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Product Side Image: </label>
                                <input type="file" name="product_imageS" accept="image/*" class="form-control form-control-user">
                                <img src="{{ asset($product->product_imageS) }}" height="300" width="300">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('product_imageS')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Publication Status: </label>
                                <div class="form-group">
                                    <label> <input type="radio" checked name="publication" {{ $product->publication == 1 ? 'checked' : '' }} value="1"> Published </label>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <label> <input type="radio" name="publication" {{ $product->publication == 0 ? 'checked' : '' }} value="0">Not Published </label>
                                    @if ($errors->any())
                                        <span class="text-danger"> {{$errors->first('publication')}}</span>
                                    @endif
                                </div>
                            </div>

                            <button class="btn btn-success btn-user btn-block" type="submit" name="btn" value="submit">
                                Update Product Info
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.forms['productEditForm'].elements('category_id').value='{{$product->category_id}}';
        document.forms['productEditForm'].elements('brand_id').value='{{$product->brand_id}}';
    </script>

@endsection