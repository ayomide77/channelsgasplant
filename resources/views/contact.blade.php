@extends('layouts.app',['title'=>'Channels Gas Plant | Contact Us'])

@section('custom_styles')
    <style>
        .map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
    </style>
@endsection
<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Contact Us','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->



@section('content')

    <!--====== PAGE BANNER PART ENDS ======-->
    <!--====== MAP PART START ======-->

    <div class="map-part pt-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0200765492427!2d3.3756784148499785!3d6.644428323588854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b9382f9f19617%3A0x3cfa44172d6bb87d!2sChannel%20Gas%20Plant!5e0!3m2!1sen!2sng!4v1615687252172!5m2!1sen!2sng" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!--====== MAP PART ENDS ======-->

    <!--====== CONACT PART START ======-->

    <section id="contact-part" class="pt-30 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact-form pt-45">
                        <h6>Leave Reply</h6>
                        <form id="contact-form" action="http://webpro.themepul.com/Fresh_Vial/demo/freeshvila/contact.php"
                            data-toggle="validator">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <label>Nick name :</label>
                                        <input name="name" type="text" data-error="Name is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="singel-form form-group">
                                        <label>Email Address :</label>
                                        <input type="email" name="email" data-error="Valid email is required."
                                            required="required">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="singel-form form-group">
                                        <label>Write a message :</label>
                                        <textarea name="message" data-error="Please,leave us a message."
                                            required="required"></textarea>
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
                <div class="col-lg-3">
                    <div class="contact-info pt-45">
                        <h6>Contact Info</h6>
                        <p>We are open for business from 7:00am to 5:00pm, Monday to Friday.</p>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="cont pl-15">
                                    <p>1 Limpson Road by River Valley Estate Ojodu Berger , Lagos Nigeria.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="cont pl-15">
                                    <p>info@chnlsgasplant.com</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont pl-15">
                                    <p>234 - 090 996 585 24</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== CONACT PART ENDS ======-->

@endsection
