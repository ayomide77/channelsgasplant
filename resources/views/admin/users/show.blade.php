@extends('layouts.adminApp',['bodyClass'=>'sidebar-noneoverflow','title'=>'Admin Dashboard | User'])


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Dashboard','title1'=>'Dashbord'])
           {{-- INCLUDE PAGE HEADER --}}

        <div class="row">
          
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>All fields are required*</h4>
                            </div>
                            <form action="{{ route("admin.users.update",$user->id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PATCH')
                                <!-- Form Controls -->
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div>
                                            <div class="card-body row">

                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label for="inputLeftIcon">Full Name</label>
                                                        <span class="form-icon-wrapper">
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>
                                                            <input
                                                                class="form-control form-icon-input-left @error('name') is-invalid @enderror"
                                                                id="name" type="text" name="name"
                                                                placeholder="Enter full name" 
                                                                value="{{$user->name}}" required/>
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
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
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>
                                                            {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                            <input
                                                                class="form-control form-icon-input-left @error('email') is-invalid @enderror"
                                                                id="email" type="email" name="email"
                                                                placeholder="Enter User email" 
                                                                value="{{$user->email}}" required/>
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label for="inputLeftIcon">Address</label>
                                                        <span class="form-icon-wrapper">
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>
                                                            
                                                            <input
                                                                class="form-control form-icon-input-left @error('address') is-invalid @enderror"
                                                                id="address" type="text" name="address"
                                                                placeholder="Enter User address" 
                                                                value="{{$user->address ?? ''}}" />
                                                            @error('address')
                                                                <span class="invalid-feedback" role="alert">
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
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>
                                                            {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                            <input
                                                                class="form-control form-icon-input-left @error('city') is-invalid @enderror"
                                                                id="city" type="city" name="city"
                                                                placeholder="Enter User city" 
                                                                value="{{$user->city ?? ''}}" />
                                                            @error('city')
                                                                <span class="invalid-feedback" role="alert">
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
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>
      
                                                            <input
                                                                class="form-control form-icon-input-left @error('state') is-invalid @enderror"
                                                                id="state" type="state" name="state"
                                                                placeholder="Enter User state" 
                                                                value="{{$user->state ?? ''}}" />
                                                            @error('state')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-12 col-lg-2">
                                                    <div class="form-group mb-4">
                                                        <label for="inputLeftIcon">Country</label>
                                                        <span class="form-icon-wrapper">
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>

                                                            <input
                                                                class="form-control form-icon-input-left @error('country') is-invalid @enderror"
                                                                id="country" type="country" name="country"
                                                                placeholder="Enter User country" 
                                                                value="{{$user->country ?? ''}}" />
                                                            @error('country')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label for="inputLeftIcon">Password</label>
                                                        <span class="form-icon-wrapper">
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>
                                                            {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                            <input
                                                                class="form-control form-icon-input-left @error('password') is-invalid @enderror"
                                                                id="password" type="password" name="password"
                                                                placeholder="********" />
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label for="inputLeftIcon">Confirm Password</label>
                                                        <span class="form-icon-wrapper">
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>
                                                            <input
                                                                class="form-control  form-icon-input-left @error('confirm-password') is-invalid @enderror"
                                                                id="password" type="password"
                                                                name="password_confirmation" placeholder="*******"
                                                                 />
                                                            @error('confirm-password')
                                                                <span class="invalid-feedback" role="alert">
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
                                                            <span class="form-icon form-icon--left">
                                                                <i class="fa fa-user-circle form-icon__item"></i>
                                                            </span>
                                                            <input
                                                                class="form-control  form-icon-input-left @error('phone') is-invalid @enderror"
                                                                id="confirm-password" type="text" name="phone"
                                                                placeholder="Phone Number" value="{{$user->phone}}"  required/>
                                                            @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-xs-12 col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label>Select Role</label>
                                                        <select class="placeholder js-states form-control" required
                                                            placeholder="Select upto 5 tags" name="roles[]" multiple>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}" 
                                                                    
                                                                    @foreach ($userRoles as $userRole)
                                                                    @if ($userRole->name == $role->name)
                                                                    selected
                                                                @endif
                                                                    @endforeach
                                                                    >
                                                                {{ $role->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Form Controls -->
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>


        </div>
        
    </div>
    
</div>
@endsection

{{-- CUSTOM SELECT JS --}}
@section('custom_scripts')
<script src="{{asset('chnlsgasplant/plugins/select2/select2.min.js')}}"></script>
@include('admin.includes.multipleSelectJs')
@endsection
{{-- CUSTOM SELECT JS --}}


{{-- CUSTOM STYLE --}}
@section('custom_styles')
   <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{asset('chnlsgasplant/plugins/select2/select2.min.css')}}">
@endsection

{{-- CUSTOM STYLE --}}