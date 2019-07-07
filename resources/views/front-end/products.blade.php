@extends('front-end')

@section('body')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Products</span></h3>
        </div>
    </div>
    <!--banner-->
    <!--content-->
    <div class="content">
        <div class="products-agileinfo">
            <h2 class="tittle">Products</h2>
            <div class="container">
                <div class="product-agileinfo-grids w3l">
                    <div class="col-md-3 product-agileinfo-grid">
                        <div class="brand-w3l">
                            <h3>Category Filter</h3>
                            @foreach($allCategories as $category)
                                <ul>
                                    <li><a href="{{ route('catProducts',['id'=>$category->id]) }}">{{ $category->cat_name }}</a></li>

                                </ul>
                            @endforeach
                        </div>
                        <div class="brand-w3l">
                            <h3>Brands Filter</h3>
                            @foreach($allBrands as $brand)
                                <ul>
                                    <li><a href="{{ route('brandProducts',['id'=>$brand->id]) }}">{{ $brand->brand_name }}</a></li>

                                </ul>
                            @endforeach
                        </div>

                        <div class="price">
                            <h3>Price Range</h3>
                            <ul class="dropdown-menu6">
                                <li>
                                    <div id="slider-range"></div>
                                    <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                                </li>
                            </ul>
                            <script type='text/javascript'>//<![CDATA[
                                $(window).load(function(){
                                    $( "#slider-range" ).slider({
                                        range: true,
                                        min: 0,
                                        max: 9000,
                                        values: [ 1000, 7000 ],
                                        slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                                        }
                                    });
                                    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

                                });//]]>

                            </script>
                            <script type="text/javascript" src="js/jquery-ui.js"></script>
                        </div>
                        <div class="top-rates">
                            <h3>Top Rates products</h3>
                            @foreach($topRates as $top)
                            <div class="recent-grids">
                                <div class="recent-left">
                                    <a href="{{ route('userProductView',['id'=>$top->id]) }}"><img class="img-responsive " src="{{ asset($top->product_imageF) }}" alt=""></a>
                                </div>
                                <div class="recent-right">
                                    <h6 class="best2"><a href="{{ route('userProductView',['id'=>$top->id]) }}"> {{ $top->product_name }} </a></h6>
                                    <p>Price: <em class="item_price">{{ $top->product_price }}</em> BDT.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            @endforeach
                        </div>





                        <div class="cat-img">
                            <img class="img-responsive " src="images/45.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-9 product-agileinfon-grid1 w3l">
                        <div class="product-agileinfon-top">
                            <div class="col-md-6 product-agileinfon-top-left">
                                <img class="img-responsive " src="images/img1.jpg" alt="">
                            </div>
                            <div class="col-md-6 product-agileinfon-top-left">
                                <img class="img-responsive " src="images/img2.jpg" alt="">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="mens-toolbar">
                            <p >Showing 1–9 of 21 results</p>
                            <p class="showing">Sorting By
                                <select>
                                    <option value=""> Name</option>
                                    <option value="">  Rate</option>
                                    <option value=""> Color </option>
                                    <option value=""> Price </option>
                                </select>
                            </p>
                            <p>Show
                                <select>
                                    <option value=""> 9</option>
                                    <option value="">  10</option>
                                    <option value=""> 11 </option>
                                    <option value=""> 12 </option>
                                </select>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="{{ asset('/') }}/front-end/images/menu1.png"></a></li>
                                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="{{ asset('/') }}/front-end/images/menu.png"></a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                        <div class="product-tab">
                                            @foreach($catProducts as $catProduct)
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div  class="grid-arrival">
                                                        <figure>
                                                            <a href="{{ route('userProductView',['id'=>$catProduct->id]) }}" class="new-gri">
                                                                <div class="grid-img">
                                                                    <img  src="{{ asset($catProduct->product_imageF) }}" class="img-responsive" height="300" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img  src="{{ asset($catProduct->product_imageS) }}" class="img-responsive"  alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="{{ route('userProductView',['id'=>$catProduct->id]) }}">{{ $catProduct->product_name }}</a></h6>
                                                        <p> <em> {{ $catProduct->cat_name }}</em></p>
                                                        <p> <em> {{ $catProduct->brand_name }}</em></p>
                                                        <p> <em> Price: </em> <em class="item_price">{{ $catProduct->product_price }} BDT.</em></p>
                                                        <a href="{{ route('userProductView',['id'=>$catProduct->id]) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>


                                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                                        @foreach($catProducts as $catProduct)
                                        <div class="product-tab1">
                                            <div class="col-md-4 product-tab1-grid">
                                                <div class="grid-arr">
                                                    <div  class="grid-arrival">
                                                        <figure>
                                                            <a href="{{ route('userProductView',['id'=>$catProduct->id]) }}" class="new-gri">
                                                                <div class="grid-img">
                                                                    <img  src="{{ asset($catProduct->product_imageF) }}" class="img-responsive" height="300" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img  src="{{ asset($catProduct->product_imageS) }}" class="img-responsive"  alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                                <div class="block">
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="women">
                                                    <h6><a href="{{ route('userProductView',['id'=>$catProduct->id]) }}">{{ $catProduct->product_name }}</a></h6>
                                                    <p>{{ $catProduct->short_info }}</p>
                                                    <p> <em> {{ $catProduct->cat_name }}</em></p>
                                                    <p> <em> {{ $catProduct->brand_name }}</em></p>
                                                    <p><em> Price: </em> <em class="item_price">{{ $catProduct->product_price }} BDT.</em></p>
                                                    <a href="{{ route('userProductView',['id'=>$catProduct->id]) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                            <hr/>
                                        @endforeach





                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <!--content-->
@endsection