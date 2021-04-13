@extends('layouts.app',['title'=>'Channels Gas Plant | Dashboard'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Dashboard ','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->



@section('content')

    <!--====== DASHBOARD STARTS HERE ======-->
    <div class="container">
        <div class="main-body mt-5">

            <!-- Breadcrumb -->
            @include('partials.breadCrumb',['page'=>'Dashboard'])
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                {{-- INCLUDE PROFILE BOOTSTRAP CARD STARTS --}}
                @include('customer.includes.card')
                {{-- INCLUDE PROFILE BOOTSTRAP CARD ENDS --}}
                <div class="col-md-8">
                    {{-- INCLUDE FLASH MESSAGE --}}
                    @include('partials._alerts')
                    {{-- INCLUDE FLASH MESSAGE --}}
                    <div class="row mb-2">
                        {{-- TICKET CARD --}}
                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card border-secondary text-secondary">
                                <div class="card-body">
                                    <a href="{{ route('ticket.index') }}">
                                        <h4 class="card-title">Tickets <span
                                                class="badge badge-secondary">{{ count($tickets) }}</span></h4>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- ORDER CARD --}}
                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card border-secondary text-secondary">
                                <div class="card-body">
                                    <a href="{{ route('customerOrders') }}">
                                        <h4 class="card-title">Orders <span
                                                class="badge badge-secondary">{{ count($orders) }}</span></h4>
                                    </a>

                                </div>
                            </div>
                        </div>

                        {{-- INVOICES --}}
                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card border-secondary text-secondary">
                                <div class="card-body">
                                    <h4 class="card-title">Invoices <span class="badge badge-secondary">0</span></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->phone }}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->address ?? 'Update Your Profile' }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i
                                    class="material-icons text-info mr-2">Pending</i>Order</h6>

                            {{-- INCLUDE ORDER TABLE --}}
                            @include('customer.includes.orderTable')
                            {{-- INCLUDE ORDER TABLE --}}

                        </div>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <!--====== DASHBOARD ENDS HERE ======-->
    </div>


@endsection
