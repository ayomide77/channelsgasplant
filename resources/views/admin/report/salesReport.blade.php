@extends('layouts.adminApp',array('bodyClass'=>'alt-menu sidebar-noneoverflow'))

@section('custom_styles')
<link href="{{asset('chnlsgasplant/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
<link href="/chnlsgasplant/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
@endsection
@section('content')

<div class="header-container">
@include('admin.partials._adminHeader')
</div>
 <!--  BEGIN MAIN CONTAINER  -->
 <div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN TOPBAR  -->
   @include('admin.partials._adminNavBar')
    <!--  END TOPBAR  -->
    
     <!--  BEGIN MAIN CONTAINER  -->
     <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        @include('admin.partials._alerts')

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




