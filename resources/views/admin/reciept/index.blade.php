@extends('layouts.adminApp',array('bodyClass'=>'alt-menu sidebar-noneoverflow'))


{{-- INCLUDE INVOICE JAVASCRIPT --}}
@section('custom_scripts')
<script src="{{asset('chnlsgasplant/assets/js/apps/invoice.js')}}"></script>
@endsection
{{-- INCLUDE INVOICE JAVASCRIPT --}}



{{-- INCLUDE INVOICE CSS --}}
@section('custom_styles')
       <!--  BEGIN CUSTOM STYLE FILE  -->
       <link href="{{asset('chnlsgasplant/assets/css/apps/invoice.css')}}" rel="stylesheet" type="text/css" />
       <!--  END CUSTOM STYLE FILE  -->
@endsection
{{-- INCLUDE INVOICE CSS --}}




{{-- INCLUDE CONTENTS --}}
@section('content')
<div class="header-container">
    {{-- @include('admin.partials._adminHeader') --}}
    </div>
     <!--  BEGIN MAIN CONTAINER  -->
     <div class="main-container" id="container">
    
        <div class="overlay"></div>
        <div class="search-overlay"></div>
    
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row invoice layout-top-spacing">
                  
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                       {{-- include flash mesage --}}
                                @include('admin.partials._alerts')
                                {{-- include flash mesage --}}
                    @if(count($user_reciepts) > 0)
                    <div class="app-hamburger-container">
                        <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                    </div>
                    <div class="doc-container">
                       
                        <div class="invoice-container">
                            
                            <div class="invoice-inbox">
                                <div id="ct" class="active" style="display: block;">
                                   
                                    <div class="invoice">
                                        <div class="content-section  animated animatedFadeInUp fadeInUp">

                                            <div class="row inv--head-section">

                                                <div class="col-sm-6 col-12">
                                                    <h3 class="in-heading">RECEIPT</h3>
                                                </div>
                                                <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                    <div class="company-info">
                                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg> --}}
                                                        <img src="{{asset('chnlsgasplant/images/favicon.png')}}" height="35" width="35"/>
                                                        &nbsp;
                                                        <h5 class="inv-brand-name"> CGP</h5>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row inv--detail-section">

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-to">Receipt To</p>
                                                </div>
                                                <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                    <p class="inv-detail-title">From : Channels Gas Plant Ltd</p>
                                                </div>
                                                
                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-customer-name">{{$user->name}}</p>
                                                    <p class="inv-street-addr">{{$user->address}}</p>
                                                    <p class="inv-street-addr">{{$user->phone}}</p>
                                                    <p class="inv-email-address">{{$user->email}}</p>
                                                </div>
                                                <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                    <p class="inv-list-number"><span class="inv-title">Receipt Number : </span> <span class="inv-number">{{$receipt_no}}</span></p>
                                                    <p class="inv-created-date"><span class="inv-title">Receipt Date : </span> <span class="inv-date">{{ \Carbon\Carbon::parse($receipt_date)->toFormattedDateString() }}</span></p>
                                                    {{-- <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p> --}}
                                                </div>
                                            </div>

                                            <div class="row inv--product-table-section">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">Order No</th>
                                                                    <th scope="col">Items</th>
                                                                    <th class="text-right" scope="col">Qty</th>
                                                                    <th class="text-right" scope="col">Unit Price</th>
                                                                    <th class="text-right" scope="col">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                // INITIALIZE VARIABLE TO 0;
                                                                $total = 0;
                                                            @endphp
                                                                @foreach ($user_reciepts as $receipt_data)
                                                                <tr>
                                                                    <td>{{'#-'}}{{$receipt_data->order_no}}</td>
                                                                    <td>{{$receipt_data->product->name}}</td>
                                                                    <td class="text-right">{{$receipt_data->qty}}</td>
                                                                    <td class="text-right">&#x20A6;{{$receipt_data->product->price}}</td>
                                                                    <td class="text-right">&#x20A6;{{$receipt_data->product->price * $receipt_data->qty}}</td>
                                                                </tr>
                                                                @php
                                                                // GET TOTAL ORDERS PRICE
                                                                // GET TOTAL ORDERS PRICE
                                                                $total += $receipt_data->qty * $receipt_data->product->price;
                                                                $receipt_no = $receipt_data->order_no;
                                                                $date = $receipt_data->create_at;
                                                            @endphp
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                    <div class="inv--payment-info">
                                                        <div class="row">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                    <div class="inv--total-amounts text-sm-right">
                                                        <div class="row">
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Sub Total: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">&#x20A6;{{$total}}</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Tax Amount: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">&#x20A6;0</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">Discount : <span class="discount-percentage">0%</span> </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">&#x20A6;0.00</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                <h4 class="">Grand Total : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                <h4 class="">&#x20A6;{{$total}}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- SEND EMAIL BUTTON    --}}
                                        <div class="btn-group mb-4" role="group">
                                        <a href="{{route('admin.dashboard')}}" class="btn btn-sm btn-primary">Go Back</a>
                                        {{-- <a href="{{route("admin.sendreceipt",['id'=>$receipt_data->receipt_no,'userid'=>$receipt_data->userid])}}" class="btn btn-sm btn-info sendreceipt">Send Receipt</a> --}}
                                        <a href="{{ url("admin/email/receipt/$receipt_data->receipt_no/$receipt_data->user_id") }}" class="btn btn-sm btn-info sendreceipt">Send Receipt</a>
                                        </div>
                                        {{-- SEND EMAIL BUTTON    --}}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- <div class="inv--thankYou">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <p class="">Thank you for doing Business with us.</p>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                        
                    </div>
                    @else
                    <div class="alert alert-arrow-left alert-icon-left alert-light-primary mb-4"
                       role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <svg> ... </svg>
                        <strong>info!</strong> No receipt found for this customer.
                    </div>
                    @endif
                </div>
                 
                </div>
                </div>
        </div>
        <!--  END CONTENT PART  -->
    
    </div>
    <!-- END MAIN CONTAINER -->
@endsection


{{-- CUSTOM STYLING FOR DASHBOARD STARTS --}}
@section('custom_scripts')
@include('admin.includes.sendReceiptJs')
@endsection
{{-- CUSTOM STYLING FOR DASHBOARD ENDS --}}
