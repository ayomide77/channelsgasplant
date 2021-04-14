@extends('layouts.adminApp',array('bodyClass'=>'alt-menu sidebar-noneoverflow'))


{{-- INCLUDE INVOICE JAVASCRIPT --}}
@section('custom_scripts')
    <script src="{{ asset('chnlsgasplant/assets/js/apps/invoice.js') }}"></script>
    
@endsection
{{-- INCLUDE INVOICE JAVASCRIPT --}}



{{-- INCLUDE INVOICE CSS --}}
@section('custom_styles')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('chnlsgasplant/assets/css/apps/invoice.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endsection
{{-- INCLUDE INVOICE CSS --}}




{{-- INCLUDE CONTENTS --}}
@section('content')
 
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>


            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="row layout-top-spacing" id="cancel-row">

                        <div class="col-xl-6 col-lg-6 col-sm-12  mx-auto layout-spacing">
                            @include('admin.partials._alerts')
                            @if(count($user_invoice) > 0)
                            <div class="widget-content widget-content-area br-6">
                               
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            
                                            <div>
                                                <div class="card-body row">
                                                    <div class="invoice-header-section">
                                                        <h4 class="inv-number"></h4>
                                                        <div class="invoice-action">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Print"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                                        </div>
                                                    </div>
                                                    <div class="container-fluid" id="ct">
                                                        
                                                        <div class="page-header">
                                                            <h1>Invoice</h1>

                                                        </div>
                                                        
                                                        <div class="container-fluid" >
                                                            <div class="row">
                                                                <div class="col-md-12 col-md-offset-3 body-main">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4"> 
                                                                                   <img class="img mb-2"
                                                                                    alt="Invoce"
                                                                                    src="{{ asset('chnlsgasplant/images/favicon.png') }}"
                                                                                    height="20" width="20" /> CGP LTd
                                                                                    <div class="row">
                                                                                        <div class="col-sm-12 col-12">
                                                                                            <h6 class=" inv-title">Payment Info:</h6>
                                                                                        </div>
                                                                                        <div class="col-sm-4 col-12">
                                                                                            <p class=" inv-subtitle">Bank Name: </p>
                                                                                        </div>
                                                                                        <div class="col-sm-8 col-12">
                                                                                            <p class="">Bank of America</p>
                                                                                        </div>
                                                                                        <div class="col-sm-4 col-12">
                                                                                            <p class=" inv-subtitle">Account: </p>
                                                                                        </div>
                                                                                        <div class="col-sm-8 col-12">
                                                                                            <p class="">1234567890</p>
                                                                                        </div>
                                                                                    </div>
                                                                                 </div>

                                                                                 
                                                                            <div class="col-md-8 text-right">
                                                                                <h4 style="color: #F81D2D;">
                                                                                    <strong>{{ $user->name }}</strong>
                                                                                </h4>
                                                                                <p>{{ $user->address }}</p>
                                                                                <p>{{ $user->phone }}</p>
                                                                                <p>{{ $user->email }}</p>
                                                                            </div>
                                                                        </div> <br />
                                                                        <div class="row">
                                                         
                                                                        </div> <br />
                                                                        <div>
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>
                                                                                            <h5>Description</h5>
                                                                                        </th>


                                                                                        <th>
                                                                                            <h5>Quantity</h5>
                                                                                        </th>

                                                                                        <th>
                                                                                            <h5>Amount</h5>
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @php
                                                                                        $total = 0;
                                                                                        // $total_price = 0;
                                                                                    @endphp
                                                                                    @foreach ($user_invoice as $invoice)
                                                                                        <tr>
                                                                                            <td class="col-md-6">
                                                                                                {{ $invoice->product->name }}
                                                                                            </td>
                                                                                            <td class="col-md-6">
                                                                                                {{ $invoice->qty }}
                                                                                            </td>
                                                                                            <td class="col-md-6">
                                                                                                &#8358;{{ $invoice->qty * $invoice->product->price }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        @php
                                                                                            // GET TOTAL ORDERS PRICE
                                                                                            $total += $invoice->qty * $invoice->product->price;
                                                                                            $invoice_no = $invoice->order_no;
                                                                                            $invoice_date = $invoice->create_at;
                                                                                        @endphp
                                                                                    @endforeach
                                                                                    <tr>
                                                                                        <td class="text-right">
                                                                                            
                                                                                        </td>
                                                                                        <td class="text-right">
                                                                                            <p> <strong>Delivery:</strong> </p>
                                                                                            <p> <strong>Total Amount:
                                                                                                </strong> </p>
                                                                                            <p> <strong>Discount: </strong>
                                                                                            </p>
                                                                                       
                                                                                        </td>
                                                                                        <td>
                                                                                         
                                                                                            
                                                                                            <p> <strong> &#8358;0.00</strong></p>
                                                                                            <p> <strong> &#8358;{{ $total }}</strong></p>
                                                                                            <p> <strong> &#8358;0.00</strong></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="color: #F81D2D;">
                                                                                        <td class="text-right">
                                                                                        
                                                                                        </td>
                                                                                        <td class="text-left">
                                                                                            <h4><strong>Total:</strong></h4>
                                                                                        </td>
                                                                                        <td class="text-left">
                                                                                            <h4><strong>&#8358;{{ $total }}</strong>
                                                                                            </h4>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div>
                                                                            <div class="col-md-12">
                                                                                <p><b>Invoice No:</b>#{{ $invoice_no }}</p>
                                                                                <p><b>Date:</b>{{ \Carbon\Carbon::parse($invoice_date)->toFormattedDateString() }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                            </div>
                            @else
                            <div class="alert alert-arrow-left alert-icon-left alert-light-primary mb-4"
                            role="alert">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                             <svg> ... </svg>
                             <strong>info!</strong> No invoice found for this customer.
                         </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER -->

    </div>
    <!-- END MAIN CONTAINER -->
@endsection
