@extends('layouts.app',['title'=>'Channels Gas Plant | Testimonial'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Testimonial','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->



@section('content')

    
    <!--====== CONACT PART START ======-->

    <section id="contact-part" class="pt-30 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-15">
                        <h2>Testimonial</h2>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <p>To ensure proper service delivery to all our customers, we will require you to create and account or login before you can create a testimony</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                       {{-- INCLUDE  ALERT MESSAGE --}}
                    @include('partials._alerts')
                       {{-- INCLUDE  ALERT MESSAGE --}}

                    <div class="contact-form pt-45">
                        <h6>We love to hear from our customers</h6>
                        <form method="POST" action="{{route('testimonial')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <label>Full Name :</label>

                                     <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter your full name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <label>Your Occupation:</label>
                                       
                                    <input id="occupation" type="text"
                                    class="form-control @error('occupation') is-invalid @enderror" name="occupation"  placeholder="Enter your occupation">

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="singel-form form-group">
                                        <label>Tell us about your service experience:</label>
                                        <textarea name="message"   class="form-control @error('message') is-invalid @enderror" ></textarea>

                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="singel-form">
                                        <button type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

    <!--====== CONACT PART ENDS ======-->

@endsection
