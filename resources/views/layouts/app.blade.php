<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--====== Title ======-->
    <title>{{ $title ?? 'Channels Gas Plant | LPG Gas Refill and Delivery Services' }}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('chnlsgasplant/images/favicon.png') }}" type="image/png">

    <!--====== Owl Carousel css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/owl.carousel.min.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/magnific-popup.css') }}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/slick.css') }}">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/nice-select.css') }}">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/jquery.nice-number.min.css') }}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/font-awesome.min.css') }}">

    <!--====== Aanimate css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/animate.css') }}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/bootstrap.min.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/style.css') }}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('chnlsgasplant/css/responsive.css') }}">

    <!--====== Toaster Alert css ======-->
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/toastr/mdtoast.css') }}">

    <!--====== Jquery alert css ======-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    @yield('custom_styles')
</head>

<body>

    <!--====== PREALOADER  START ======-->
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <!--====== PREALOADER  ENDS  ======-->


    <!--====== HEADER  START ======-->
    @yield('header')
    <!--====== HEADER  ENDS ======-->

    <!--====== SLIDER  START ======-->
    @yield('slider')
    <!--====== SLIDER  ENDS ======-->

    <!--====== CONTENT  STARTS ======-->
    @yield('content')
    <!--====== CONTENT  ENDS ======-->

    <!--====== FOOTER  START ======-->
    @include('partials.footer')
    <!--====== FOOTER  ENDS ======-->


    <!--====== jquery js ======-->
    <script src="{{ asset('chnlsgasplant/js/vendor/jquery/jquery.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}

    <script src="{{ asset('chnlsgasplant/js/vendor/modernizr-3.6.0.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('chnlsgasplant/js/popper.min.js') }}"></script>
    <script src="{{ asset('chnlsgasplant/js/bootstrap.min.js') }}"></script>

    <!--====== Owl Carousel js ======-->
    <script src="{{ asset('chnlsgasplant/js/owl.carousel.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('chnlsgasplant/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('chnlsgasplant/js/slick.min.js') }}"></script>

    <!--====== Nice Number js ======-->
    <script src="{{ asset('chnlsgasplant/js/jquery.nice-number.min.js') }}"></script>

    <!--====== Nice Select js ======-->
    <script src="{{ asset('chnlsgasplant/js/jquery.nice-select.min.js') }}"></script>

    <!--====== Validator js ======-->
    <script src="{{ asset('chnlsgasplant/js/validator.min.js') }}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('chnlsgasplant/js/ajax-contact.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('chnlsgasplant/js/main.js') }}"></script>

    <!--====== Ajax Setup For Laravel  js ======-->

    <script src="{{ asset('chnlsgasplant/js/ajaxSetup.js') }}"></script>

    {{-- Toaster Alert Js --}}
    <script type="text/javascript" src="{{ asset('chnlsgasplant/plugins/toastr/mdtoast.js') }}"></script>

    {{-- Jquery alert js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    @yield('custom_scripts')
    <script>
        $(window).on('load', function() {
            setTimeout(function() { // allowing 3 secs to fade out loader
                $('.preloader').fadeOut('slow');
            }, 2000);
        });

    </script>
</body>

</html>
