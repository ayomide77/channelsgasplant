@extends('layouts.adminApp')


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Dashboard','title1'=>'Dashbord'])
           {{-- INCLUDE PAGE HEADER --}}

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                    {{--  PENDING ORDERS --}}
                    @include('admin.includes.orderDataTable',['orderTableTitle'=>'All Orders','info'=>'No Orders Found'])
                    {{-- @include('admin.includes.orderTables',['orderTableTitle'=>'All Orders','info'=>'No Orders Found']) --}}
                    {{-- PENDING ORDERS --}}
                        </div>
                    </div>
                   
                </div>
            </div>

        </div>
        
    </div>
    
</div>
@endsection