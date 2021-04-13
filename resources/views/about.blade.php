@extends('layouts.app',['title'=>'Channels Gas Plant | About Us'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'About Us','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->



@section('content')

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about-part" class="pt-60 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-15">
                        <h2>About Us</h2>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <p>At Channels Gas Plant Limited, we ensure customer satisfaction by providing top notch service delivery at unbeatble prices.

                            We make our customers satisfaction top priority.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-30">
                        <h3><span>Welcome To</span> Channels Gas Plant Ltd.</h3>
                        <p>Channels Gas Plant CGP, is a limited privately own business engaged in the distribution of Liquidified Petroleum Gas (LPG) based in Lagos.

                            We sell cooking Gas Refills, New Cylinders as well as services, repairs and accessories at a cost effective prices,efficient and timely delivery to your door step.
                            
                            Our mission is to be the preffered gas delivery service in Lagos, and Nigeria. Our motto is based on service quality and we ensure our customers are placed top priority.
                           
                            Our staffs are trained to handle each customers as our only customer. 
                          </p>
                        {{-- <img src="{{asset('chnlsgasplant/images/sing.png')}}" alt="Signature"> --}}
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="about-image mt-30">
                        <img src="{{asset('chnlsgasplant/images/about-us.jpg')}}" alt="About-us">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->

 
 
  

@endsection
