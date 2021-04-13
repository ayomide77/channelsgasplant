@extends('layouts.adminApp')


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Product Report','title1'=>'Report','title2'=>'Sales'])
           {{-- INCLUDE PAGE HEADER --}}

        <div class="row">
          
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                @if (count($productReports)>0)
                                <table class="table table-bordered table-striped table-checkable table-highlight-head">
                                    <thead>
            
                                        <tr>
                                            
                                            <th>
                                                <div>Product</div>
                                            </th>
                                            
                                            <th>
                                                <div>Unit Price</div>
                                            </th>
                                            <th>
                                                <div>QTY</div>
                                            </th>
                                            
                                            <th>
                                                <div>Date Sold</div>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productReports as $report)
                                            <tr>
                                                <td>
                                                    <div>{{ $report->product->name }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $report->product->price }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $report->qty }}</div>
                                                </td>
                                               
                                                <div class="td-content">
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($report->updated_at)->toFormattedDateString() }}
            
                                                    </td>
                                                </div>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                                <div class="col-sm-12 col-md-6">
                                    {{-- {!! $orders->links() !!} --}}
                                </div>
                            @else
                                <div class="alert alert-info mb-4 mt-2" role="alert">
                                    <strong>Info!</strong> {{ 'No Sales Found' }}</button>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

        </div>
        
    </div>
    
</div>
@endsection