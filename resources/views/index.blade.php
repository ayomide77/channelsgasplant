@extends('layouts.app',['title'=>'Channels Gas Plant | LPG Gas Refill and Delivery Services'])


<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.homeHeader')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE SLIDER PART STARTS======-->
@section('slider')
    @include('partials.slider')
@endsection
<!--====== INCLUDE SLIDER PART ENDS======-->

@section('content')

    <!--====== SERVICES PART START ======-->

    <section id="services-part" class="services-part-3 pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2>Why Choose Us ?</h2>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <p>Channels Gas Plant is your go to gas plant delivery services. We specializes in home delivery and
                            services of all kinds of LPG. We are fast, efficient and reliable.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="singel-services mt-45 pb-50">
                        <div class="services-icon">
                            <img src="/chnlsgasplant/images/choose-us/delivery.png" alt="Icon">
                        </div>
                        <div class="services-cont pt-25">
                            <h4>Door Step Delivery</h4>
                            <p>We offer easy and convenient gas delivery, directly to your doorstep.</p>
                            <a href="#">Read More <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>

                    <div class="singel-services">
                        <div class="services-icon">
                            <img src="/chnlsgasplant/images/choose-us/service.png" alt="Icon">
                        </div>
                        <div class="services-cont pt-25">
                            <h4>After Delivery Services</h4>
                            <p>We offer services after delivery, maintenance, repair services etc.</p>
                            <a href="#">Read More <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="singel-services mt-50 text-center">
                        <img src="/chnlsgasplant/images/choose-us/cylinders.png" alt="Image">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="singel-services right mt-45 text-right pb-50">
                        <div class="services-icon">
                            <img src="/chnlsgasplant/images/choose-us/bulk.png" alt="Icon">
                        </div>
                        <div class="services-cont pt-25">
                            <h4>Bulk LPG Services</h4>
                            <p>Dependable gas delivery in bulk to your desired destination.</p>
                            <a href="#">Read More <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>

                    <div class="singel-services right text-right ">
                        <div class="services-icon">
                            <img src="/chnlsgasplant/images/choose-us/location.jpg" alt="Icon">
                        </div>
                        <div class="services-cont pt-25">
                            <h4>Physical Location</h4>
                            <p>You can drive by to fill your cylinder at our location at your convenience.</p>
                            <a href="#">Read More <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== SERVICES PART ENDS ======-->

    @if (count($testimonials) > 0)
        <section id="client-part" class="pt-80 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <img src="/chnlsgasplant/images/client/c.png" alt="icon">
                            <h2>Our Exhort Happy Clients say !</h2>
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <p>

                                We ensure that we offer our customers the best service money can buy, while maintaining
                                consistency in service delivery.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="client-slied owl-carousel">
                        @foreach ($testimonials as $testimony)
                            <div class="col-lg-12">
                                <div class="singel-client mt-50">
                                    <div class="client-thum">
                                        <div class="client-img">
                                            <img src="/chnlsgasplant/images/user/avatar_90x90.png"
                                                alt="{{ $testimony->name }}">
                                        </div>
                                        <div class="client-head">
                                            <h5>{{ $testimony->fullname }}</h5>
                                            <span>{{ $testimony->occupation }}</span>
                                        </div>
                                    </div>
                                    <div class="client-text mt-35">
                                        <p>{{ $testimony->details }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif

    </div>
@endsection
