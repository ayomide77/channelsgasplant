@extends('layouts.adminApp',['bodyClass'=>'alt-menu sidebar-noneoverflow'])

@section('content')

    {{-- DASHBOARD CONTENT STARTS --}}
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Dashboard','title1'=>'Dashbord'])
           {{-- INCLUDE PAGE HEADER --}}

            <div class=" layout-top-spacing">
                {{-- INFO CARDS --}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="row widget-statistic">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-users">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <p class="w-value">{{ count($totalUsers) }}</p>
                                    <h5 class="">Users</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="widget widget-one_hybrid widget-referral">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-shopping-cart">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="w-value">{{ count($totalOrders) }}</p>
                                    <h5 class="">Total orders</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="widget widget-one_hybrid widget-engagement">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-shopping-bag">
                                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                                        </svg>
                                    </div>
                                    <p class="w-value">{{ count($totalSales) }}</p>
                                    <h5 class="">Total Sales</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="widget widget-one_hybrid widget-engagement">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-sidebar">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="9" y1="3" x2="9" y2="21"></line>
                                        </svg>
                                    </div>
                                    <p class="w-value">
                                        @php
                                            $totalAmount = 0;
                                        @endphp

                                        @if (count($totalSales) > 0)

                                            @foreach ($totalSales as $totalSale)
                                                @php
                                                    $totalAmount += $totalSale->qty * $totalSale->product->price;
                                                @endphp
                                            @endforeach

                                            &#8358;{{ $totalAmount }}
                                        @else
                                            &#8358;{{ $totalAmount }}
                                        @endif
                                    </p>
                                    <h5 class="">Total Amount Sold</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- INFO CARDS --}}


                {{-- RECENT ORDERS --}}
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header"> 
                                <div class="widget-heading">
                                    <h5 class="">Pedning Orders</h5>
                                </div>                               
                                <div class="row">
                                  {{--  ORDERS TABLE--}}
                            @include('admin.includes.orderDataTable',['orderTableTitle'=>'All Orders','info'=>'No Pending Orders Found'])
                            {{--  ORDERS  TABLE--}}
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                {{-- RECENT ORDERS --}}


                 {{--  CURRENT SALES--}}
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">   
                                <div class="widget-heading">
                                    <h5 class="">Current Sales</h5>
                                </div>                             
                                <div class="row">
                                  {{-- SALES TABLE --}}
                                  @include('admin.includes.salesTable',['orderTableTitle'=>'Current Sales','info'=>'No Sales Made For
                                  Today.'])
                            {{-- SALES TABLE --}}
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                 {{--  CURRENT SALES--}}


                {{-- TOP SELLING PRODUCTS TABLE --}}
               {{--  TABLE --}}
               @include('admin.includes.TopSellingProductsTable')
               {{--  TABLE --}}
               
                {{-- TOP SELLING PRODUCTS TABLE --}}
            </div>

        </div>

    </div>
    {{-- DASHBOARD CONTENT ENDS --}}

@endsection

{{-- CUSTOM STYLING FOR DASHBOARD STARTS --}}
@section('dashboardcss')
    <link href="{{ asset('chnlsgasplant/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
@endsection
{{-- CUSTOM STYLING FOR DASHBOARD ENDS --}}


