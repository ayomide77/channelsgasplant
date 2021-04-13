@extends('layouts.app',['title'=>'Channels Gas Plant | Order'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Orders','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->



@section('content')

    <!--====== DASHBOARD STARTS HERE ======-->
    <div class="container">
        <div class="main-body mt-5 mb-5">

            <!-- Breadcrumb -->
            @include('partials.breadCrumb',['page'=>'Order'])
            <!-- /Breadcrumb -->

             {{-- INCLUDE ORDER TABLE --}}
            @include('customer.includes.orderTable')
            {{-- INCLUDE ORDER TABLE --}}
        </div>
    </div>

    <!--====== DASHBOARD ENDS HERE ======-->
    </div>

@endsection


