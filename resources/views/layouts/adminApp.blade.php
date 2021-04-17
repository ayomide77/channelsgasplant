<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('chnlsgasplant/images/favicon.png') }}" type="image/png">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">

    <link href="{{asset('chnlsgasplant/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('chnlsgasplant/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    {{-- dashboard css --}}
   @yield('dashboardcss')

    {{-- Sack Bar Alert --}}
    <link href="{{asset('chnlsgasplant/plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />

    {{-- <!--  BEGIN CUSTOM STYLE FILE  --> --}}
    <link href="{{asset('chnlsgasplant/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/assets/css/elements/alert.css') }}">
    <link href="{{ asset('chnlsgasplant/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('chnlsgasplant/assets/css/components/custom-list-group.css') }}" rel="stylesheet" type="text/css">
    {{-- <!--  BEGIN CUSTOM STYLE FILE  --> --}}


    {{-- DATA TABLE CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/table/datatable/custom_dt_html5.css') }}">
    {{-- <link rel="stylesheet" type="text/css"  href="{{ asset('chnlsgasplant/plugins/table/datatable/dt-global_style.css') }}"> --}}
    {{-- DATA TABLE CSS --}}



    {{-- <!--====== Jquery alert css ======--> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    {{-- <!--====== Jquery alert css ======--> --}}

    {{-- CUSTOM CSS INCLUDE --}}
    @yield('custom_styles')
    {{-- CUSTOM CSS INCLUDE --}}

</head>
    <body class="{{ $bodyClass ?? '' }}" data-spy="scroll" data-target="#navSection" data-offset="100">
    <!--  BEGIN NAVBAR  -->
    @include('admin.partials.navBar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        @include('admin.partials.topBar')
        <!--  END TOPBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        @yield('content')
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/chnlsgasplant/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="/chnlsgasplant/bootstrap/js/popper.min.js"></script>
    <script src="/chnlsgasplant/bootstrap/js/bootstrap.min.js"></script>
    <script src="/chnlsgasplant/assets/js/app.js"></script>


    {{-- DATA TABLE SCRIPT --}}
    <script src="{{ asset('chnlsgasplant/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('chnlsgasplant/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('chnlsgasplant/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('chnlsgasplant/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('chnlsgasplant/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
   {{-- DATA TABLE SCRIPT --}}


   
    {{-- Jquery Dialogue js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('chnlsgasplant/plugins/notification/snackbar/snackbar.min.js')}}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="/chnlsgasplant/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        @yield('custom_scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>