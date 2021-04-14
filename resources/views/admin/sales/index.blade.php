@extends('layouts.adminApp',['bodyClass'=>'sidebar-noneoverflow'])



{{-- DATA TABLE SCRIPTS --}}
@section('custom_scripts')
    {{-- IMPORT SCRIPTS FOR DATA TABLE --}}
    @include('admin.includes.dataTableJs',['tableID'=>'completeSalesTable'])
    {{-- IMPORT SCRIPTS FOR DATA TABLE --}}
@endsection
{{-- DATA TABLE SCRIPTS --}}
@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Product Sales','title1'=>'Sales','title2'=>'Completed'])
           {{-- INCLUDE PAGE HEADER --}}

          <div class="col-xl-12 col-lg-12 col-sm-12 ">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive">

                        @php
                            $total = 0;
                        @endphp

                    {{-- CHECK IF saleS ARE NOT EMPTY --}}
                    @if ($sales->isNotEmpty())
                        
                        <table
                           id="completeSalesTable"
                            class="table table-bsaleed table-striped table-checkable table-highlight-head">
                            <thead>

                                <tr>
                                    <th>
                                        <div>Customer</div>
                                    </th>
                                    <th>
                                        <div>Product</div>
                                    </th>
                                   
                                    <th>
                                        <div>Order No</div>
                                    </th>
                                    <th>
                                        <div>Price</div>
                                    </th>
                                    <th>
                                        <div>QTY</div>
                                    </th>
                                    <th>
                                        <div>Date Sold</div>
                                    </th>
                                    <th>
                                        <div>Receipt</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>
                                            <div>{{ $sale->user->name }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $sale->product->name }}</div>
                                        </td>
                                       
                                        <td>
                                            <div>#-{{ $sale->order_no }}</div>
                                        </td>
                                        <td>
                                            <div>&#8358;{{ $sale->product->price }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $sale->qty }}</div>
                                        </td>
                                        <td>
                                            <div>{{\Carbon\Carbon::parse($sale->updated_at)->toFormattedDateString()}}</div>
                                        </td>

                                        <td>
                                            <a href="{{route("admin.generatereciept",$sale->order_no)}}" class="btn btn-sm btn-info">Receipt</a>
                                        </td>
                                    </tr>
                                    @php
                                    // SUM THE ORDER PRICE
                                    $total  += $sale->product->price * $sale->qty;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info mb-4" role="alert">
                            <strong>Info!</strong> {{'No Sales Made'}}</button>
                        </div>
                    @endif
                </div>

                
                       <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="btn btn-outline-info mb-2"><strong>Total Sales:
                                &#8358;{{ $total ?? ''}}</strong></div>
                            </div>
                          
                        </div> 
            </div>
        </div>
       
        
    </div>
    
</div>
@endsection

