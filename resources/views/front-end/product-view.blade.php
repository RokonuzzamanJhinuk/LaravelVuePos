@extends('front-end')

@section('body')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Product View</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="single-grids">
                    <div class="col-md-9 single-grid">
                        <div clas="single-top">
                            <div class="single-left">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li data-thumb="{{ asset($viewProduct->product_imageF) }}">
                                            <div class="thumb-image"> <img src="{{ asset($viewProduct->product_imageF) }}" data-imagezoom="true" class="img-responsive"> </div>
                                        </li>
                                        <li data-thumb="{{ asset($viewProduct->product_imageS) }}">
                                            <div class="thumb-image"> <img src="{{ asset($viewProduct->product_imageS) }}" data-imagezoom="true" class="img-responsive"> </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="single-right simpleCart_shelfItem">
                                <h4>{{ $viewProduct->product_name }}</h4>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <p class="price item_price">Price:  {{ $viewProduct->product_price }} BDT.</p>

                                <div class="description">
                                    <p><span>Quick Overview : </span> {{ $viewProduct->short_info }} </p>
                                </div>

                                <form method="post" name="cartForm" action="{{ route('addToCart') }}" >
                                    @csrf
                                    <div class="color-quality">
                                        <h6>Quantity :</h6>
                                        <div class="quantity">
                                            <div class="quantity-select">
                                                <input type="number" value="1" min="1" name="quantity" required >
                                                <input type="hidden" name="id" value="{{ $viewProduct->id }}">
                                            </div>
                                        </div>
                                        <!--quantity-->
                                        <!--quantity-->
                                    </div>
                                    <div class="women">
                                        <button  type="submit"  data-text="Add To Cart"  class="my-cart-b item_add"> Add To Cart </button>
                                    </div>

                                </form>
                                <div class="social-icon">
                                    <a href="{{ $basicInfo->fb_page }}"><i class="icon"></i></a>
                                    <a href="{{ $basicInfo->twitter_page }}"><i class="icon1"></i></a>
                                    <a href="{{ $basicInfo->gPlus_page }}"><i class="icon2"></i></a>
                                    <a href="{{ $basicInfo->linkedIn_page }}"><i class="icon3"></i></a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-3 single-grid1">
                        <h3>Recent Products</h3>
                        @foreach($newProducts as $new)
                        <div class="recent-grids">
                            <div class="recent-left">
                                <a href="{{ route('userProductView',['id'=>$new->id]) }}"><img class="img-responsive " src="{{ asset($new->product_imageF) }}" alt=""></a>
                            </div>
                            <div class="recent-right">
                                <h6 class="best2"><a href="{{ route('userProductView',['id'=>$new->id]) }}"> {{ $new->product_name }} </a></h6>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <span class=" price-in1"> Price: {{ $new->product_price }}  BDT.</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="clearfix"> </div>
                </div>


                <!--Product Description-->
                <div class="product-w3agile">
                    <h3 class="tittle1">Product Description</h3>
                    <div class="product-grids">
                        {{--<div class="col-md-4 product-grid">--}}
                            {{--<div id="owl-demo" class="owl-carousel">--}}
                                {{--<div class="item">--}}
                                    {{--<div class="recent-grids">--}}
                                        {{--<div class="recent-left">--}}
                                            {{--<a href="single.html"><img class="img-responsive " src="{{ asset('/') }}/front-end/images/r.jpg" alt=""></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="recent-right">--}}
                                            {{--<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>--}}
                                            {{--<div class="block">--}}
                                                {{--<div class="starbox small ghosting"> </div>--}}
                                            {{--</div>--}}
                                            {{--<span class=" price-in1"> $ 29.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="recent-grids">--}}
                                        {{--<div class="recent-left">--}}
                                            {{--<a href="single.html"><img class="img-responsive " src="{{ asset('/') }}/front-end/images/r1.jpg" alt=""></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="recent-right">--}}
                                            {{--<h6 class="best2"><a href="single.html">Duis aute irure </a></h6>--}}
                                            {{--<div class="block">--}}
                                                {{--<div class="starbox small ghosting"> </div>--}}
                                            {{--</div>--}}
                                            {{--<span class=" price-in1"> $ 19.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="recent-grids">--}}
                                        {{--<div class="recent-left">--}}
                                            {{--<a href="single.html"><img class="img-responsive " src="{{ asset('/') }}/front-end/images/r2.jpg" alt=""></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="recent-right">--}}
                                            {{--<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>--}}
                                            {{--<div class="block">--}}
                                                {{--<div class="starbox small ghosting"> </div>--}}
                                            {{--</div>--}}
                                            {{--<span class=" price-in1"> $ 19.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="recent-grids">--}}
                                        {{--<div class="recent-left">--}}
                                            {{--<a href="single.html"><img class="img-responsive " src="{{ asset('/') }}/front-end/images/r3.jpg" alt=""></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="recent-right">--}}
                                            {{--<h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>--}}
                                            {{--<div class="block">--}}
                                                {{--<div class="starbox small ghosting"> </div>--}}
                                            {{--</div>--}}
                                            {{--<span class=" price-in1">$ 45.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="item">--}}
                                    {{--<div class="recent-grids">--}}
                                        {{--<div class="recent-left">--}}
                                            {{--<a href="single.html"><img class="img-responsive " src="{{ asset('/') }}/front-end/images/r4.jpg" alt=""></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="recent-right">--}}
                                            {{--<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>--}}
                                            {{--<div class="block">--}}
                                                {{--<div class="starbox small ghosting"> </div>--}}
                                            {{--</div>--}}
                                            {{--<span class=" price-in1"> $ 29.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="recent-grids">--}}
                                        {{--<div class="recent-left">--}}
                                            {{--<a href="single.html"><img class="img-responsive " src="{{ asset('/') }}/front-end/images/r5.jpg" alt=""></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="recent-right">--}}
                                            {{--<h6 class="best2"><a href="single.html">Duis aute irure </a></h6>--}}
                                            {{--<div class="block">--}}
                                                {{--<div class="starbox small ghosting"> </div>--}}
                                            {{--</div>--}}
                                            {{--<span class=" price-in1"> $ 19.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="recent-grids">--}}
                                        {{--<div class="recent-left">--}}
                                            {{--<a href="single.html"><img class="img-responsive " src="{{ asset('/') }}/front-end/images/r2.jpg" alt=""></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="recent-right">--}}
                                            {{--<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>--}}
                                            {{--<div class="block">--}}
                                                {{--<div class="starbox small ghosting"> </div>--}}
                                            {{--</div>--}}
                                            {{--<span class=" price-in1"> $ 19.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="recent-grids">--}}
                                        {{--<div class="recent-left">--}}
                                            {{--<a href="single.html"><img class="img-responsive " src="{{ asset('/') }}/front-end/images/r3.jpg" alt=""></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="recent-right">--}}
                                            {{--<h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>--}}
                                            {{--<div class="block">--}}
                                                {{--<div class="starbox small ghosting"> </div>--}}
                                            {{--</div>--}}
                                            {{--<span class=" price-in1">$ 45.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<img class="img-responsive " src="{{ asset('/') }}/front-end/images/woo2.jpg" alt="">--}}
                        {{--</div>--}}

                        <div class="col-md-8 col-md-offset-2 product-grid1">
                            <div class="tab-wl3">
                                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                                        <li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews (1)</a></li>

                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                            <div class="descr">
                                                <h4> {{ $viewProduct->product_name }} </h4>
                                                <p> {{ $viewProduct->short_info }} </p>
                                                {{ $viewProduct->long_info}}
                                            </div>
                                        </div>


                                        <div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
                                            <div class="descr">
                                                <div class="reviews-top">
                                                    <div class="reviews-left">
                                                        <img src="{{ asset('/') }}/front-end/images/men3.jpg" alt=" " class="img-responsive">
                                                    </div>
                                                    <div class="reviews-right">
                                                        <ul>
                                                            <li><a href="#">Admin</a></li>
                                                            <li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
                                                        </ul>
                                                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="reviews-bottom">
                                                    <h4>Add Reviews</h4>
                                                    <p>Your email address will not be published. Required fields are marked *</p>

                                                    <form action="{{ route('saveUserReview') }}" method="post">
                                                        @csrf

                                                        <p>Your Rating</p>
                                                        <div class="block">
                                                            <div class="starbox small ghosting">
                                                                <div class="">
                                                                    <div class="stars">
                                                                        <div class="ghost" style="width: 42.5px; display: none;"></div>
                                                                        <div class="colorbar" style="width: 42.5px;"></div>
                                                                        <div class="">
                                                                            <input type="radio" value="1" name="rate"></div>
                                                                            <input type="radio" value="2" name="rate"></div>
                                                                            <input type="radio" value="3" name="rate"></div>
                                                                            <input type="radio" value="4" name="rate"></div>
                                                                            <input type="radio" value="5" name="rate"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        {{--<label>Your Review </label>--}}
                                                        {{--<textarea type="text" Name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-md-6 row-grid">--}}
                                                                {{--<label>Name</label>--}}
                                                                {{--<input type="text" value="Name" Name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-md-6 row-grid">--}}
                                                                {{--<label>Email</label>--}}
                                                                {{--<input type="email" value="Email" Name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="clearfix"></div>--}}
                                                        {{--</div>--}}
                                                        <input type="submit" value="SEND">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!--Product Description-->
            </div>
        </div>
        <!--single-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <h3 class="tittle1">New Arrival</h3>
                <div class="arrivals-grids">
                    @foreach($newProducts as $new)
                        <div class="col-md-3 arrival-grid simpleCart_shelfItem" style="margin-bottom: 20px;">
                            <div class="grid-arr">
                                <div  class="grid-arrival">
                                    <figure>
                                        <a href="{{ route('userProductView',['id'=>$new->id]) }}" class="new-gri">
                                            <div class="grid-img">
                                                <img  src="{{ asset($new->product_imageF) }}" class="img-responsive" style="height: 300px" alt="">
                                            </div>
                                            <div class="grid-img">
                                                <img  src="{{ asset($new->product_imageS) }}" class="img-responsive" style="height: 300px" alt="">
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                                <div class="ribben1">
                                    <p>SALE</p>
                                </div>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="women">
                                    <h6><a href="{{ route('userProductView',['id'=>$new->id]) }}">{{ $new->product_name }}</a></h6>
                                    <p ><b>Price: </b><em class="item_price">{{ $new->product_price }}.00  BDT.</em></p>
                                    <a href="{{ route('userProductView',['id'=>$new->id]) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--new-arrivals-->
    </div>
    <!--content-->
@endsection