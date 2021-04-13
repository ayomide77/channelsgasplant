@extends('layouts.app',['title'=>'Channels Gas Plant | Profile'])

<!--====== INCLUDE HEADER PART STARTS======-->
@section('header')
    @include('partials.headerPart')
@endsection
<!--====== INCLUDE HEADER PART ENDS======-->

<!--====== INCLUDE BANNER PART STARTS======-->
@section('slider')
    @include('partials.pageBanner',['bannerContent'=>'Profile','bannerImg'=>'page-banner.jpg'])
@endsection
<!--====== INCLUDE BANNER PART ENDS======-->

@section('content')

    <!--====== DASHBOARD STARTS HERE ======-->
    <div class="container">
        <div class="main-body mt-5">
        
              <!-- Breadcrumb -->
              @include('partials.breadCrumb',['page'=>'Profile'])
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm">
                {{-- INCLUDE PROFILE BOOTSTRAP CARD STARTS --}}
                @include('customer.includes.card')
                {{-- INCLUDE PROFILE BOOTSTRAP CARD ENDS --}}
                <div class="col-md-8">

                  {{-- INCLUDE FLASH MESSAGE --}}
                  @include('partials._alerts')
                  {{-- INCLUDE FLASH MESSAGE --}}

                  <div class="card mb-5">
                    <div class="card-body">
                     
                      <form method="POST" action="{{ route('postsetting', Auth::user()->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Current Password</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                           <input type="password" placeholder="Enter current password" name="curpass" required  class="form-control  @error('curpass') is-invalid @enderror"/>
                       
                       @error('curpass')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                          </div>
                        </div>

                        <hr>
                      <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">New Password</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input  type="password" placeholder="Enter new password" name="password" required  class="form-control @error('password') is-invalid @enderror"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                        </div>
                      <hr>

                      
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Confirm Password</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <input  type="password" placeholder="Confirm password" name="password_confirmation" required  class="form-control"/>
                        </div>
                      </div>
                      <hr> 

                      <button class="btn btn-warning btn-md" type="submit">Change Password</button>

                      </form>
                    </div>
                  </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
        </div>
        
    <!--====== DASHBOARD ENDS HERE ======-->
</div>
  
@endsection
