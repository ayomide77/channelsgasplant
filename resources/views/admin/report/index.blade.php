@extends('layouts.adminApp')

@section('custom_styles')
    <link href="{{ asset('chnlsgasplant/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="/chnlsgasplant/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
@endsection


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Report','title1'=>'Report','title2'=>'Generate'])
           {{-- INCLUDE PAGE HEADER --}}

        {{-- GENERATE REPORT BASED ON PRODUCT SOLD  STARTS --}}
        <div class="widget-content widget-content-area br-6">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Generate report based on product sold</h4>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.productreports') }}" method="POST">
                @csrf
                <!-- Form Controls -->
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div>
                            <div class="card-body row">

                                <div class="col-md-12 col-xs-12 col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="inputLeftIcon">List of products sold</label>
                                        <span class="form-icon-wrapper">
                                            <span class="form-icon form-icon--left">
                                                <i class="fa fa-user-circle form-icon__item"></i>
                                            </span>
                                            <select class="form-control form-control-md" required
                                                name="prodId">
                                                <option value="">Products Sold</option>
                                                @if (count($soldProducts) > 0)
                                                    @foreach ($soldProducts as $soldProduct)

                                                        <option value="{{ $soldProduct->product_id }}">
                                                            {{ $soldProduct->product->name }}</option>

                                                    @endforeach

                                                @else
                                                    <option value="">No sold product</option>

                                                @endif
                                            </select>
                                            @error('prodname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                {{-- <hr class="my-4"> --}}
                                <div class="input-group">
                                    <button class="btn btn-primary m-1" type="submit">
                                        Generate Report</button>
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="btn btn-outline-warning m-1" type="reset">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Form Controls -->
            </form>
        </div>
        {{-- GENERATE REPORT BASED ON PRODUCT SOLD  ENDS --}}


              {{-- GENERATE REPORT BASED ON SALES  STARTS --}}
              <div class="widget-content widget-content-area br-6 mt-5">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>generate monthly /weekly sales report</h4>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.salesreport') }}" method="POST">
                    @csrf
                    <!-- Form Controls -->
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div>
                                <div class="card-body row">

                                    <div class="col-md-12 col-xs-12 col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="inputLeftIcon">Start Date</label>
                                            <span class="form-icon-wrapper">
                                                <span class="form-icon form-icon--left">
                                                    <i class="fa fa-user-circle form-icon__item"></i>
                                                </span>


                                                <input id="startDate"
                                                    class="form-control flatpickr flatpickr-input active  @error('startDate') is-invalid @enderror"
                                                    type="text" placeholder="Select From Date.."
                                                    name="startDate" required>

                                                @error('startDate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="inputLeftIcon">End Date</label>
                                            <span class="form-icon-wrapper">
                                                <span class="form-icon form-icon--left">
                                                    <i class="fa fa-user-circle form-icon__item"></i>
                                                </span>


                                                <input id="endDate"
                                                    class="form-control flatpickr flatpickr-input active  @error('endDate') is-invalid @enderror"
                                                    type="text" placeholder="Select To Date.."
                                                    name="endDate" required>

                                                @error('endDate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    {{-- <hr class="my-4"> --}}
                                    <div class="input-group">
                                        <button class="btn btn-primary m-1" type="submit">
                                            Generate Report</button>
                                        <a href="{{ route('admin.dashboard') }}"
                                            class="btn btn-outline-warning m-1" type="reset">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Form Controls -->
                </form>
            </div>
            {{-- GENERATE REPORT BASED ON SALES  STARTS --}}
        
    </div>
    
</div>
@endsection


@section('custom_scripts')
    <script src="{{ asset('chnlsgasplant/plugins/flatpickr/flatpickr.js') }}"></script>

    <script>
        //         var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
        //         mode: "range"
        // });

        var f1 = flatpickr(document.getElementById('startDate'), {
            enableTime: false,
            dateFormat: "Y-m-d H:i",
        });

        var f2 = flatpickr(document.getElementById('endDate'), {
            enableTime: false,
            dateFormat: "Y-m-d H:i",
        });

    </script>
@endsection