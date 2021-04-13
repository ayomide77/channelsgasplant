@extends('layouts.app',['title'=>'Channels Gas Plant | Reset Password'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials._headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials._pageBanner',['bannerContent'=>'Login','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->


@section('content')

    <!--====== LOGIN FORM STARTS ======-->
    <div id="login-part" class="pb-80">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                    <p class="mt-5 mb-5 d-inline-block font-weight-bold">
                        To login, simply enter your details below and click "Login".
                        If you are not registered simply <a href="{{ route('customerregister') }}"> CLICK HERE</a> to
                        register.
                    </p>

                    {{-- INCLUDE USER ALERT MESSAGE --}}
                    @include('partials._alerts')
                    <div class="login-form text-center">
                        <div class="logo mb-50">
                            <a href="#"><img src="{{ asset('/chnlsgasplant/images/logo.png') }}" alt="Logo"></a>
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                           
                            <div class="singel-form">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="singel-form pt-30">
                                <button type="submit">Request Password Reset</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== LOGIN FORM ENDS ======-->


@endsection
