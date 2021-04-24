@extends('layouts.app',['title'=>'Channels Gas Plant | Checkout'])

<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Checkout','bannerImg'=>'page-banner.jpg'])
@endsection

<!--====== INCLUDE BANNER PART ENDS======-->
@section('content')
    <!--====== DASHBOARD STARTS HERE ======-->

    <div class="container">
        <div class="main-body mt-5">

            <!-- Breadcrumb -->
            @include('partials.breadCrumb',['page'=>'Check out'])
            <!-- /Breadcrumb -->

            {{-- COMPLETE CHECKOUT FORM --}}

            <section id="checkout-part" class="pt-25">
                <div class="container">
                    <div class="py-5 text-center">

                        <h3>Checkout form</h3>
                        <p class="lead">Please fill all fields, and ensure to confirm your products and total before
                            checking out.</p>
                    </div>

                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                            </h4>
                            <ul class="list-group mb-3">
                                @foreach (Cart::content() as $productCart)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">{{ $productCart->name }}</h6>
                                            <small class="text-muted">{{ $productCart->options->description }}</small>
                                        </div>
                                        {{-- <span class="text-muted">{{ $productCart->qty }}</span> --}}
                                        <span class="text-muted">&#8358;{{ $productCart->price }}</span>
                                    </li>
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (NGN)</span>
                                    <strong>&#8358; {{ Cart::subtotal() }}</strong>
                                </li>
                            </ul>


                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            <form class="needs-validation mb-5" method="POST" action="{{ route('order') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="name">Full name</label>
                                        <input type="text" class="form-control" id="name" placeholder=""
                                            value="{{ Auth::user()->name }}" disabled>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                        value="{{ Auth::user()->email ?? '' }}" name="email" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control" id="address" placeholder="1234 Main St"
                                        name="address" rows="2" required>{{ Auth::user()->address ?? '' }}</textarea>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" id="country" placeholder="Enter Country"
                                            name="country" value="{{ Auth::user()->country ?? '' }}">

                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="address2" placeholder="Current state"
                                            value="{{ Auth::user()->state ?? '' }}" name="state" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="zip">City</label>
                                        <input type="text" class="form-control" id="city" placeholder="Current city"
                                            value="{{ Auth::user()->city ?? '' }}" name="city" required>

                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <hr class="mb-4">


                                <h4 class="mb-3">Payment</h4>

                                <div class="d-block my-3">
                                    <p>We offer payment on pick-up / delivery. Our delivery personnel will be at your
                                        location with our POS machine. </p>
                                    <p>Kindly make payment with your bank card, we accept all types of Nigeria Bank Card.
                                    </p>
                                </div>

                                <hr class="mb-4">
                                <button class="btn btn-primary btn-md" type="submit">Continue to checkout</button>
                                <a href="{{ route('cart') }}" class="btn btn-warning btn-md">Go Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!--====== DASHBOARD ENDS HERE ======-->
    </div>

@endsection
