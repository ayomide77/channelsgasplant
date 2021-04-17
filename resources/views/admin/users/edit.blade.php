@extends('layouts.adminApp')


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Dashboard','title1'=>'Dashbord'])
           {{-- INCLUDE PAGE HEADER --}}

        <div class="row">
          
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-lg-12 col-12 layout-spacing mt-2">
                                    <div class="widget-content widget-content-area">
                                        <form id="general-info" class="section general-info"
                                        action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
    
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                
                                                            <div class="upload mt-4 pr-md-4">
                                                                <input type="file" name="image" id="input-file-max-fs"
                                                                    class="dropify"
                                                                    @if ($user->image != null)
                                                                    data-default-file='{{asset("chnlsgasplant/images/user/$user->image")}}'
                                                                    @else
                                                                    data-default-file='{{asset("chnlsgasplant/images/user/avatar.png")}}'
                                                                    @endif
                                                                 
                                                                    data-max-file-size="0.2M" />
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                                    Upload Picture</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <!-- Form Controls -->
                                                                <div class="row">
    
                                                                    {{-- include flash mesage --}}
                                                                    @include('admin.partials._alerts')
                                                                    {{-- include flash mesage --}}
                                                                    <div class="col-md-12 mb-4">
                                                                        <div>
                                                                            <div class="card-body row">
    
                                                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                                                    <div class="form-group mb-4">
                                                                                        <label for="inputLeftIcon">Full
                                                                                            Name</label>
                                                                                        <span class="form-icon-wrapper">
                                                                                            <span
                                                                                                class="form-icon form-icon--left">
                                                                                                <i
                                                                                                    class="fa fa-user-circle form-icon__item"></i>
                                                                                            </span>
                                                                                            <input
                                                                                                class="form-control form-icon-input-left @error('name') is-invalid @enderror"
                                                                                                id="name" type="text"
                                                                                                name="name"
                                                                                                placeholder="Enter full name"
                                                                                                value="{{ $user->name }}"
                                                                                                required />
                                                                                            @error('name')
                                                                                                <span class="invalid-feedback"
                                                                                                    role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                                                    <div class="form-group mb-4">
                                                                                        <label for="inputLeftIcon">Email</label>
                                                                                        <span class="form-icon-wrapper">
                                                                                            <span
                                                                                                class="form-icon form-icon--left">
                                                                                                <i
                                                                                                    class="fa fa-user-circle form-icon__item"></i>
                                                                                            </span>
                                                                                            {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                                                            <input
                                                                                                class="form-control form-icon-input-left @error('email') is-invalid @enderror"
                                                                                                id="email" type="email"
                                                                                                name="email"
                                                                                                placeholder="Enter User email"
                                                                                                value="{{ $user->email }}"
                                                                                                required />
                                                                                            @error('email')
                                                                                                <span class="invalid-feedback"
                                                                                                    role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                                                    <div class="form-group mb-4">
                                                                                        <label
                                                                                            for="inputLeftIcon">Address</label>
                                                                                        <span class="form-icon-wrapper">
                                                                                            <span
                                                                                                class="form-icon form-icon--left">
                                                                                                <i
                                                                                                    class="fa fa-user-circle form-icon__item"></i>
                                                                                            </span>
    
                                                                                            <input
                                                                                                class="form-control form-icon-input-left @error('address') is-invalid @enderror"
                                                                                                id="address" type="text"
                                                                                                name="address"
                                                                                                placeholder="Enter User address"
                                                                                                value="{{ $user->address ?? '' }}" />
                                                                                            @error('address')
                                                                                                <span class="invalid-feedback"
                                                                                                    role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="col-md-2 col-xs-12 col-lg-2">
                                                                                    <div class="form-group mb-4">
                                                                                        <label for="inputLeftIcon">City</label>
                                                                                        <span class="form-icon-wrapper">
                                                                                            <span
                                                                                                class="form-icon form-icon--left">
                                                                                                <i
                                                                                                    class="fa fa-user-circle form-icon__item"></i>
                                                                                            </span>
                                                                                            {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                                                            <input
                                                                                                class="form-control form-icon-input-left @error('city') is-invalid @enderror"
                                                                                                id="city" type="city"
                                                                                                name="city"
                                                                                                placeholder="Enter User city"
                                                                                                value="{{ $user->city ?? '' }}" />
                                                                                            @error('city')
                                                                                                <span class="invalid-feedback"
                                                                                                    role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2 col-xs-12 col-lg-2">
                                                                                    <div class="form-group mb-4">
                                                                                        <label for="inputLeftIcon">State</label>
                                                                                        <span class="form-icon-wrapper">
                                                                                            <span
                                                                                                class="form-icon form-icon--left">
                                                                                                <i
                                                                                                    class="fa fa-user-circle form-icon__item"></i>
                                                                                            </span>
    
                                                                                            <input
                                                                                                class="form-control form-icon-input-left @error('state') is-invalid @enderror"
                                                                                                id="state" type="state"
                                                                                                name="state"
                                                                                                placeholder="Enter User state"
                                                                                                value="{{ $user->state ?? '' }}" />
                                                                                            @error('state')
                                                                                                <span class="invalid-feedback"
                                                                                                    role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2 col-xs-12 col-lg-2">
                                                                                    <div class="form-group mb-4">
                                                                                        <label
                                                                                            for="inputLeftIcon">Country</label>
                                                                                        <span class="form-icon-wrapper">
                                                                                            <span
                                                                                                class="form-icon form-icon--left">
                                                                                                <i
                                                                                                    class="fa fa-user-circle form-icon__item"></i>
                                                                                            </span>
    
                                                                                            <input
                                                                                                class="form-control form-icon-input-left @error('country') is-invalid @enderror"
                                                                                                id="country" type="country"
                                                                                                name="country"
                                                                                                placeholder="Enter User country"
                                                                                                value="{{ $user->country ?? '' }}" />
                                                                                            @error('country')
                                                                                                <span class="invalid-feedback"
                                                                                                    role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                                                    <div class="form-group mb-4">
                                                                                        <label for="inputLeftIcon">Phone</label>
                                                                                        <span class="form-icon-wrapper">
                                                                                            <span
                                                                                                class="form-icon form-icon--left">
                                                                                                <i
                                                                                                    class="fa fa-user-circle form-icon__item"></i>
                                                                                            </span>
                                                                                            <input
                                                                                                class="form-control  form-icon-input-left @error('phone') is-invalid @enderror"
                                                                                                id="confirm-password"
                                                                                                type="text" name="phone"
                                                                                                placeholder="Phone Number"
                                                                                                value="{{ $user->phone }}"
                                                                                                required />
                                                                                            @error('phone')
                                                                                                <span class="invalid-feedback"
                                                                                                    role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                                                    <div class="form-group mb-4">
                                                                                        <label>Select Role</label>
                                                                                        <select
                                                                                            class="placeholder js-states form-control"
                                                                                            required
                                                                                            placeholder="Select upto 5 tags"
                                                                                            name="roles[]" multiple>
                                                                                            @foreach ($roles as $role)
                                                                                                <option
                                                                                                    value="{{ $role->id }}"
                                                                                                    @foreach ($userRoles as $userRole) 
                                                                                                    @if ($userRole->name==$role->name)
                                                                                                    selected @endif
                                                                                            @endforeach
                                                                                            >
                                                                                            {{ $role->name }}</option>
                                                                                            @endforeach
    
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                {{-- <hr class="my-4"> --}}
                                                                                <div class="input-group">
                                                                                    <button class="btn btn-primary m-1"
                                                                                        type="submit">
                                                                                        Update User</button>
                                                                                    <a href="{{ route('admin.users.index') }}"
                                                                                        class="btn btn-outline-secondary m-1">Cancel Upate</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                </div>
                                                                <!-- End Form Controls -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
            </div>
          
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>All fields are required*</h4>
                            </div>


                            <div class="col-lg-12 col-12 layout-spacing mt-2">
                                    <div class="widget-content widget-content-area">
                                       <form action="{{ route('admin.resetPassword', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                            <div class="form-row mb-4">
                                                <div class="col">
                                                    <input
                                                    class="form-control form-icon-input-left @error('password') is-invalid @enderror"
                                                    id="password" type="password"
                                                    name="password"
                                                    placeholder="Enter Password" />
                                                  @error('password')
                                                  <span class="invalid-feedback"
                                                      role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                                </div>
                                                <div class="col">
                                                    <input
                                                    class="form-control  form-icon-input-left @error('confirm-password') is-invalid @enderror"
                                                    id="password" type="password"
                                                    name="password_confirmation"
                                                    placeholder="Confirm Password" />
                                                @error('confirm-password')
                                                    <span class="invalid-feedback"
                                                        role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <input type="submit" name="time" class="btn btn-primary">
                                        </form>
    
                                       
    
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                   
                </div>
            </div>


        </div>
        
    </div>
    
</div>
@endsection


@section('custom_styles')

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('chnlsgasplant/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('chnlsgasplant/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/select2/select2.min.css') }}">
    <!--  END CUSTOM STYLE FILE  -->

@endsection


@section('custom_scripts')

<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="{{ asset('chnlsgasplant/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('chnlsgasplant/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('chnlsgasplant/assets/js/users/account-settings.js') }}"></script>
@include('admin.includes.multipleSelectJs')
<!--  END CUSTOM SCRIPTS FILE  -->
@endsection
