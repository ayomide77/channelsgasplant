@extends('layouts.app',['title'=>'Channels Gas Plant | Ticket'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials._headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials._pageBanner',['bannerContent'=>'My Tickets','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->



@section('content')

    <!--====== DASHBOARD STARTS HERE ======-->
    <div class="container">
        <div class="main-body mt-5 mb-5">

            <!-- Breadcrumb -->
            @include('partials._breadCrumb',['page'=>'Ticket'])
            <!-- /Breadcrumb -->

             {{-- INCLUDE Ticket TABLE --}}
            @include('customer.includes.ticketTable')
            {{-- INCLUDE Ticket TABLE --}}
        </div>
    </div>

    <!--====== DASHBOARD ENDS HERE ======-->
    </div>

@endsection

