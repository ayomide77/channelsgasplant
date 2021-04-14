@extends('layouts.app',['title'=>'Channels Gas Plant | Products'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Products','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->

@section('content')

    <!--====== PRODUTCT PAGE PART START ======-->

    <div id="produtct-part" class="pt-40">
        @if ($products->isNotEmpty())
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        {{-- INCLUDE PRODUCT CARD --}}
                                        @include('includes.productsCard')
                                        {{-- INCLUDE PRODUCT CARD --}}
                                    @endforeach
                                </div>
                            </div> <!-- products Grid-->
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- DISPLAY MESSAGE TO USER IF NO PRODUCT IS FOUND --}}

            <div class="col-lg-12 col-md-12 text-center">
                <div class="cart-btn clearfix mb-5 ">
                    <div class="no-cart-btn">
                        <a href="{{ url('/') }}">NO PRODUCT TO DISPLAY. kINDLY CHECK BACK LATER</a>
                    </div>
                </div>
            </div>

        @endif
    </div>

@endsection

 {{-- INCLUDE CUSTOM JAVASCRIPT FILE --}}
 @section('custom_scripts')
 @include('includes.addToCartJs')
@endsection

