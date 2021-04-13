@extends('layouts.app',['title'=>'Channels Gas Plant | Product Details'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Product Details','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->

@section('content')


@section('custom_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/toastr/mdtoast.css') }}">
@endsection

    <!--====== PRODUCTS DETAILS PART START ======-->

    <section id="products-details-part" class="pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="products-viwe mt-30">
                        <div class="singel-slied">
                            <img src="{{ asset("chnlsgasplant/images/product/$product->image") }}"
                                alt="{{ $product->name }}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="products-details pt-30">
                        <div class="title">
                            <h3>{{ $product->name }}</h3>
                        </div>


                        <div class="share pt-25">
                            <ul>
                                <li class="head">Share :</li>
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <div class="price pt-15">
                            <h3>&#8358;{{ $product->price }}</h3>
                        </div>
                        <div class="Desciption pt-20">
                            <h6>Short Description:</h6>
                            <p>{!!$product->description!!}</p>
                        </div>
                        <div class="quanty-availability pt-25">
                            <div class="quanty">
                                <p>Qty:</p>
                                <div class="qty">
                                    <input type="number" class="count" value="1">
                                </div>
                            </div>
                            <div class="availability">
                                <p>Availability :</p>
                                <p>IN STOCK</p>
                            </div>
                        </div>
                        <div class="products-add pt-30">
                            <ul>
                                <li><a href="#">Add to Cart</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== PRODUCTS DETAILS PART ENDS ======-->

    <!--====== PRODUCTS TAB PART START ======-->

    <section id="Product-tab" class="pt-40 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="Product-tab">
                        <ul class="nav" id="myTab" role="tablist">
                            <li>
                                <a class="active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                                    aria-controls="description" aria-selected="true">description</a>
                            </li>

                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="Product-tab-cont">
                                    <p>{!! $product->description !!}</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== PRODUCTS TAB PART ENDS ======-->


{{-- INCLUDE CUSTOM JAVASCRIPT FILE --}}
@section('custom_scripts')
   @include('includes.addToCartJs')
@endsection

@endsection
