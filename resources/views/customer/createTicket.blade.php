@extends('layouts.app',['title'=>'Channels Gas Plant | Ticket'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Ticket','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->

@section('content')

    <!--====== DASHBOARD STARTS HERE ======-->
    <div class="container">
        <div class="main-body mt-5">

            <!-- Breadcrumb -->
            @include('partials.breadCrumb',['page'=>'Ticket'])
            <!-- /Breadcrumb -->
           
            <div class="row gutters-sm">
              
                {{-- INCLUDE PROFILE BOOTSTRAP CARD STARTS --}}
                @include('customer.includes.card')
                {{-- INCLUDE PROFILE BOOTSTRAP CARD ENDS --}}
                <div class="col-md-8">

                   {{-- INCLUDE USER ALERT MESSAGE --}}
                    @include('partials._alerts')

                    <form method="POST" enctype="multipart/form-data" action="{{ route('ticket.store') }}">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="department">Department</label>
                            <select  class="form-control @error('dpt') is-invalid @enderror" name="dpt" required>
                                <option value="">Select Department</option>
                                <option value="Admin">Admin</option>
                                <option value="Sales">Sales</option>
                            </select>
                            @error('dpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-5">
                            <label for="subject">Subject</label>
                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                            name="subject" value="{{ old('subject') }}" required placeholder="Enter Complaint Subject">

                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="message">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" rows="5" name="message"
                                placeholder="How Can We Assist You?"></textarea>

                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="message">File Upload</label>
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror"
                                    name="file" value="{{ old('file') }}" >

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group mt-2 mb-5">
                            <button class="btn btn-primary btn-block ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!--====== DASHBOARD ENDS HERE ======-->
    </div>


@endsection
