@extends('layouts.adminApp')


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Product','title1'=>'Product','title2'=>'List'])
           {{-- INCLUDE PAGE HEADER --}}

        <div class="row">
            @if (count($products) > 0)
            {{-- LOOP THROUGH THE PRODUCT ARRAY --}}
            @foreach ($products as $product)

            <div class="col-xl-3 col-lg-3 col-md-3  mb-4">
                <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                    <img class="card-img-top" src="/chnlsgasplant/images/product/{{ $product->image }}" alt="Card image cap">
                    <div class="card-body">
                        <strong class="card-category">
                            @if ($product->status == 1)

                            Active    
                            @else
                                Archived
                            @endif
                        </strong>
                        <h5 class="card-title mt-2">{{ $product->name }}</h5>
                        <p class="card-text meta-info meta-time mb-2"><small class="">{{ \Carbon\Carbon::parse($product->created_at)->toFormattedDateString() }}</small></p>
                        <p class="card-text mb-4">{{ $product->description }}</p>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-outline-info mt-2">View</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-outline-warning mt-2">Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div id="flFormsGrid" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="alert alert-arrow-left alert-icon-left alert-light-primary mb-4"
                    role="alert">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <strong>Info!</strong> No Product Found, Please Create New Product
                </div>
            @endif
           
        </div>
        
    </div>
    
</div>
@endsection