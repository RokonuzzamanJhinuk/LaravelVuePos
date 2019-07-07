@extends('front-end')

@section('body')

    <link href="{{ asset('/') }}/front-end/css/style.css" rel="stylesheet" type="text/css" media="all" />


    <!--banner-->
    <div class="banner-w3">
        <div class="demo-1">
            <div id="example1" class="core-slider core-slider__carousel example_1">
                <div class="core-slider_viewport">
                   @foreach($sliders as $slider)
                    <div class="core-slider_list">
                        <a href="#">
                            <div class="core-slider_item">
                                <img src="{{ asset($slider->slider_image) }}" class="img-responsive" alt="">
                                <span> <h3> {{ $slider->slider_heading }} </h3> </span>
                            </div>
                        </a>
                    </div>
                   @endforeach
                </div>
                <div class="core-slider_nav">
                    <div class="core-slider_arrow core-slider_arrow__right"></div>
                    <div class="core-slider_arrow core-slider_arrow__left"></div>
                </div>
                <div class="core-slider_control-nav"></div>
            </div>
        </div>
        <link href="{{ asset('/') }}/front-end/css/coreSlider.css" rel="stylesheet" type="text/css">
        <script src="{{ asset('/') }}/front-end/js/coreSlider.js"></script>
        <script>
            $('#example1').coreSlider({
                pauseOnHover: false,
                interval: 3000,
                controlNavEnabled: true
            });

        </script>

    </div>
    <!--banner-->

        <!--new-arrivals-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <h2 class="tittle">New Arrivals</h2>
                <div class="arrivals-grids">

                 @foreach($newProducts as $newProduct)
                        <div class="col-md-3 arrival-grid simpleCart_shelfItem" style="margin-bottom: 20px;">
                            <div class="grid-arr">
                                <div  class="grid-arrival">
                                    <figure>
                                        <a href="{{ route('userProductView',['id'=>$newProduct->id]) }}" class="new-gri">
                                            <div class="grid-img">
                                                <img  src="{{ asset($newProduct->product_imageF) }}" class="img-responsive" style="height: 300px" alt="">
                                            </div>
                                            <div class="grid-img">
                                                <img  src="{{ asset($newProduct->product_imageS) }}" class="img-responsive" style="height: 300px" alt="">
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
                                    <h6><a href="{{ route('userProductView',['id'=>$newProduct->id]) }}">{{ $newProduct->product_name }}</a></h6>
                                    <p ><b>Price: </b><em class="item_price">{{ $newProduct->product_price }}.00  BDT.</em></p>
                                    <a href="{{ route('userProductView',['id'=>$newProduct->id]) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--new-arrivals-->
        <!--accessories-->
        <!--content-->
        <div class="content">
            <!--banner-bottom-->
            <div class="ban-bottom-w3l">
                <h2 class="tittle">{{ $ad->firstAds_name }}</h2>
                <hr/>
                <div class="container">

                    <div class="col-md-6 ban-bottom" style="margin-top: 5px">
                        <div class="ban-top">
                            <a href="#">
                                <img src="{{ asset($ad->firstAds_img) }}" class="img-responsive" style="height: 600px; width:100%;" alt=""/>
                                <div class="ban-text">
                                    <h4>Male Riders</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 ban-bottom3">
                        <div class="ban-top">
                            <a href="#">
                                <img src="{{ asset($ad->secAds_img) }}" class="img-responsive" style="height: 300px; width:100%;" alt=""/>
                                <div class="ban-text1 ">
                                    <h4>{{ $ad->secAds_name }}</h4>
                                </div>
                            </a>
                        </div>
                        <div class="ban-top" style="margin-top: 10px">
                            <a href="#">
                                <img src="{{ asset($ad->thirdAds_img) }}" class="img-responsive" style="height: 300px; width:100%;" alt=""/>
                                <div class="ban-text1 ">
                                    <h4>{{ $ad->thirdAds_name }}</h4>
                                </div>
                            </a>
                        </div>


                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--banner-bottom-->
            <!--accessories-->
        <!--Products-->
            <!--new-arrivals-->
            <div class="new-arrivals-w3agile">
                <div class="container">
                    <h2 class="tittle">Top Rated Product</h2>
                    <div class="arrivals-grids">

                        @foreach($newProducts as $newProduct)
                            <div class="col-md-3 arrival-grid simpleCart_shelfItem" style="margin-bottom: 20px;">
                                <div class="grid-arr">
                                    <div  class="grid-arrival">
                                        <figure>
                                            <a href="{{ route('userProductView',['id'=>$newProduct->id]) }}" class="new-gri">
                                                <div class="grid-img">
                                                    <img  src="{{ asset($newProduct->product_imageF) }}" class="img-responsive" style="height: 300px" alt="">
                                                </div>
                                                <div class="grid-img">
                                                    <img  src="{{ asset($newProduct->product_imageS) }}" class="img-responsive" style="height: 300px" alt="">
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
                                        <h6><a href="{{ route('userProductView',['id'=>$newProduct->id]) }}">{{ $newProduct->product_name }}</a></h6>
                                        <p ><b>Price: </b><em class="item_price">{{ $newProduct->product_price }}.00  BDT.</em></p>
                                        <a href="{{ route('userProductView',['id'=>$newProduct->id]) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        <!--Products-->


            <!--Partners-->
        <div class="latest-w3">
            <div class="container">
                <h3 class="tittle1"> Our Partners </h3>
                <div class="latest-grids">
                  @foreach($partners as $partner)
                    <div class="col-md-3 latest-grid">
                        <a href="{{ $partner->partner_link }}">
                            <div class="latest-top">
                                <img  src="{{ asset($partner->partner_logo) }}" class="img-responsive" style="height: 200px; width: 300px;"  alt="">
                                <div class="latest-text hvr-sweep-to-top">
                                    <h4>{{ $partner->partner_name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                  @endforeach

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="new-arrivals-w3agile">
            <div class="container">
                <h3 class="tittle1">All Products</h3>
                <div class="arrivals-grids">

                    @foreach($allProducts as $all)
                        <div class="col-md-3 arrival-grid simpleCart_shelfItem" style="margin-bottom: 20px;">
                            <div class="grid-arr">
                                <div  class="grid-arrival">
                                    <figure>
                                        <a href="{{ route('userProductView',['id'=>$all->id]) }}" class="new-gri">
                                            <div class="grid-img">
                                                <img  src="{{ asset($all->product_imageF) }}" class="img-responsive" style="height: 300px" alt="">
                                            </div>
                                            <div class="grid-img">
                                                <img  src="{{ asset($all->product_imageS) }}" class="img-responsive" style="height: 300px" alt="">
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
                                    <h6><a href="{{ route('userProductView',['id'=>$all->id]) }}">{{ $newProduct->product_name }}</a></h6>
                                    <p ><b>Price: </b><em class="item_price">{{ $all->product_price }}.00  BDT.</em></p>
                                    <a href="{{ route('userProductView',['id'=>$all->id]) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!--new-arrivals-->
    <!--content-->

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="news-gr">
                        <div class="col-md-5 new-grid1">
                            <img src="{{ asset('/') }}/front-end/images/p5.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-7 new-grid">
                            <h5>Ten Women's Cotton Viscose fabric Grey Shrug</h5>
                            <h6>Quick Overview</h6>
                            <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                            <div class="color-quality">
                                <div class="color-quality-left">
                                    <h6>Color : </h6>
                                    <ul>
                                        <li><a href="#"><span></span>Red</a></li>
                                        <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                        <li><a href="#" class="purple"><span></span>Purple</a></li>
                                        <li><a href="#" class="gray"><span></span>Violet</a></li>
                                    </ul>
                                </div>
                                <div class="color-quality-right">
                                    <h6>Quality :</h6>
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus1">&nbsp;</div>
                                            <div class="entry value1"><span>1</span></div>
                                            <div class="entry value-plus1 active">&nbsp;</div>
                                        </div>
                                    </div>
                                    <!--quantity-->
                                    <script>
                                        $('.value-plus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                            divUpd.text(newVal);
                                        });

                                        $('.value-minus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                            if(newVal>=1) divUpd.text(newVal);
                                        });
                                    </script>
                                    <!--quantity-->
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="women">
                                <span class="size">XL / XXL / S </span>
                                <p ><del>$100.00</del><em class="item_price"> $70.00 </em></p>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="{{ asset('/') }}/front-end/images/of2.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="news-gr">
                        <div class="col-md-5 new-grid1">
                            <img src="{{ asset('/') }}/front-end/images/p7.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-7 new-grid">
                            <h5>Ten Women's Cotton Viscose fabric Grey Shrug</h5>
                            <h6>Quick Overview</h6>
                            <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                            <div class="color-quality">
                                <div class="color-quality-left">
                                    <h6>Color : </h6>
                                    <ul>
                                        <li><a href="#"><span></span>Red</a></li>
                                        <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                        <li><a href="#" class="purple"><span></span>Purple</a></li>
                                        <li><a href="#" class="gray"><span></span>Violet</a></li>
                                    </ul>
                                </div>
                                <div class="color-quality-right">
                                    <h6>Quality :</h6>
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus1">&nbsp;</div>
                                            <div class="entry value1"><span>1</span></div>
                                            <div class="entry value-plus1 active">&nbsp;</div>
                                        </div>
                                    </div>
                                    <!--quantity-->
                                    <script>
                                        $('.value-plus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                            divUpd.text(newVal);
                                        });

                                        $('.value-minus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                            if(newVal>=1) divUpd.text(newVal);
                                        });
                                    </script>
                                    <!--quantity-->
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="women">
                                <span class="size">XL / XXL / S </span>
                                <p ><del>$100.00</del><em class="item_price"> $70.00 </em></p>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="{{ asset('/') }}/front-end/images/of2.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="news-gr">
                        <div class="col-md-5 new-grid1">
                            <img src="{{ asset('/') }}/front-end/images/p10.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-7 new-grid">
                            <h5>Ten Men's Cotton Viscose fabric Grey Shrug</h5>
                            <h6>Quick Overview</h6>
                            <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                            <div class="color-quality">
                                <div class="color-quality-left">
                                    <h6>Color : </h6>
                                    <ul>
                                        <li><a href="#"><span></span>Red</a></li>
                                        <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                        <li><a href="#" class="purple"><span></span>Purple</a></li>
                                        <li><a href="#" class="gray"><span></span>Violet</a></li>
                                    </ul>
                                </div>
                                <div class="color-quality-right">
                                    <h6>Quality :</h6>
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus1">&nbsp;</div>
                                            <div class="entry value1"><span>1</span></div>
                                            <div class="entry value-plus1 active">&nbsp;</div>
                                        </div>
                                    </div>
                                    <!--quantity-->
                                    <script>
                                        $('.value-plus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                            divUpd.text(newVal);
                                        });

                                        $('.value-minus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                            if(newVal>=1) divUpd.text(newVal);
                                        });
                                    </script>
                                    <!--quantity-->
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="women">
                                <span class="size">XL / XXL / S </span>
                                <p ><del>$100.00</del><em class="item_price"> $70.00 </em></p>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="{{ asset('/') }}/front-end/images/of2.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="news-gr">
                        <div class="col-md-5 new-grid1">
                            <img src="{{ asset('/') }}/front-end/images/p12.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-7 new-grid">
                            <h5>Ten Men's Cotton Viscose fabric Grey Shrug</h5>
                            <h6>Quick Overview</h6>
                            <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                            <div class="color-quality">
                                <div class="color-quality-left">
                                    <h6>Color : </h6>
                                    <ul>
                                        <li><a href="#"><span></span>Red</a></li>
                                        <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                        <li><a href="#" class="purple"><span></span>Purple</a></li>
                                        <li><a href="#" class="gray"><span></span>Violet</a></li>
                                    </ul>
                                </div>
                                <div class="color-quality-right">
                                    <h6>Quality :</h6>
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus1">&nbsp;</div>
                                            <div class="entry value1"><span>1</span></div>
                                            <div class="entry value-plus1 active">&nbsp;</div>
                                        </div>
                                    </div>
                                    <!--quantity-->
                                    <script>
                                        $('.value-plus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                            divUpd.text(newVal);
                                        });

                                        $('.value-minus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                            if(newVal>=1) divUpd.text(newVal);
                                        });
                                    </script>
                                    <!--quantity-->
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="women">
                                <span class="size">XL / XXL / S </span>
                                <p ><del>$100.00</del><em class="item_price"> $70.00 </em></p>
                                <div class="add">
                                    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="{{ asset('/') }}/front-end/images/of2.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection