@extends('layouts.app',['title'=>'Channels Gas Plant | Our Products'])

<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Product Cart','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->

@section('content')

@section('custom_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/toastr/mdtoast.css') }}">
@endsection

<!--====== CART PART START ======-->

<section id="cart-part" class="pt-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                {{-- CHECK IF THE CART IS EMPTY --}}
                @if (Cart::content()->isNotEmpty())
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product">Product</th>
                                    <th class="description">Description</th>
                                    <th class="model">Size(KG)</th>
                                    <th class="edit">Remove</th>
                                    <th class="quantite">Quantity</th>
                                    <th class="price">Unit Price</th>
                                    <th class="total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- LOOP THROUGH THE CART STORED ITEMS --}}
                                @foreach (Cart::content() as $productCart)
                                    <tr>
                                        <td>
                                            <div class="product-img"><img
                                                    src='/chnlsgasplant/images/product/{{ $productCart->options->image }}'
                                                    alt="Product"></div>
                                        </td>
                                        <td>
                                            <div class="product-description">
                                                <h6>{{ $productCart->name }}</h6>
                                                <p>{{ $productCart->options->description }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product-model">
                                                <p>{{ $productCart->options->size }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product-edit">
                                                <ul>
                                                    <li data-id="{{ $productCart->rowId }}" class="remove-cart"> <a
                                                            href="#"><i class="fa fa-trash-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $productCart->qty }}
                                        </td>
                                        <td>
                                            <div class="product-price">
                                                <p>&#8358;{{ $productCart->price }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product-total">
                                                <p>&#8358;{{ $productCart->price * $productCart->qty }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-btn clearfix">
                        <div class="btn-left">
                            <a href="{{ route('products') }}">CONTINUE SHOPPING </a>
                        </div>
                        <div class="btn-right">
                            <a href="#" onclick="event.preventDefault();
document.getElementById('clear-cart').submit();">CLEAR SHOPPING CART</a>

                            <form action="{{ route('cart.destroy') }}" method="POST" style="display: none;"
                                id="clear-cart">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button btn-danger mb-sm-0 bottom15"><i
                                        class="d-icon-refresh"></i>Clear
                                    Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 mb-5">
                        <div class="cart-total text-right mt-50">
                            <p><span>Subtotal </span><span>&#8358;{{ Cart::subtotal() }} </span></p>
                            <p><span>Grand Total </span><span>&#8358;{{ Cart::subtotal() }}</span></p>
                            <a href="{{ route('cart.cartCheckout') }}">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                    {{-- DISPLAY MESSAGE WHEN THE CART IS EMPTY --}}
                @else
                    <div class="col-lg-12 col-md-12 mb-5 text-center">
                        <div class="cart-btn clearfix mb-5 ">
                            <div class="no-cart-btn">
                                <a href="{{ route('products') }}">NO PRODUCT IN YOUR CART, CLICK HERE TO ADD
                                    PRODUCT.</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<!--====== CART PART ENDS ======-->
@endsection

{{-- IMPORT AJAX SCRIPTS --}}
@section('custom_scripts')

{{-- INCLUDE JS FILE TO REMOVE SINGLE CART ITEM --}}
@include('includes.removeCartJs')

@endsection
