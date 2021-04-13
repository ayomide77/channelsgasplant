@extends('layouts.adminApp',['title'=>'Admin Dashboard | Create User','bodyClass'=>'sidebar-noneoverflow'])


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Users','title1'=>'Users','title2'=>'Create'])
           {{-- INCLUDE PAGE HEADER --}}

           <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('admin.partials._alerts')

                <div class="widget-content widget-content-area br-6">
                    <form action="{{ route('admin.users.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <!-- Form Controls -->
                        <div class="row">
                            
                            <div class="col-md-12 mb-4">
                                <h5>All fields are required*</h5>
                                    <div class="card-body row">

                                        <div class="col-md-12 col-xs-12 col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputLeftIcon">Full Name</label>
                                                <span class="form-icon-wrapper">
                                                    <span class="form-icon form-icon--left">
                                                        <i class="fa fa-user-circle form-icon__item"></i>
                                                    </span>
                                                    {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                    <input
                                                        class="form-control form-icon-input-left @error('name') is-invalid @enderror"
                                                        id="name" type="text" name="name"
                                                        placeholder="Enter full name" required
                                                        value="{{ old('name') }}" />
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
                                                        placeholder="Enter User email" required
                                                        value="{{ old('email') }}" />
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
                                                    {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                    <input
                                                        class="form-control form-icon-input-left @error('address') is-invalid @enderror"
                                                        id="address" type="text" name="address"
                                                        placeholder="Enter User address" 
                                                        value="{{ old('address') }}" />
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
                                                        value="{{ old('city') }}" />
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
                                                        value="{{ old('state') }}" />
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
                                                        placeholder="Enter User country" required
                                                        value="{{ old('country') }}" />
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
                         
                                                    <input
                                                        class="form-control form-icon-input-left @error('password') is-invalid @enderror"
                                                        id="password" type="password" name="password"
                                                        placeholder="Enter Password" required
                                                        value="{{ old('password') }}" />
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
                                                        id="confirm-password" type="password"
                                                        name="confirm-password" placeholder="Confirm Password"
                                                        required />
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
                                                        id="phone" type="text" name="phone"
                                                        placeholder="Phone Number" required />
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
                                                <select class="placeholder js-states form-control"
                                                    placeholder="Select upto 5 tags" name="roles[]" multiple>
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        {{-- <hr class="my-4"> --}}
                                        <div class="input-group">
                                            <button class="btn btn-primary m-1" type="submit">
                                                Create User</button>
                            <a href="{{route('admin.users.index')}}" class="btn btn-outline-secondary m-1">Cancel</a>
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
@endsection

{{-- CUSTOM SCRIPT FOR BOOTSTRAP SELECT  --}}
@section('custom_scripts')
    <script src="{{asset('chnlsgasplant/plugins/select2/select2.min.js')}}"></script>
    @include('admin.includes.multipleSelectJs')
@endsection


@section('custom_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('chnlsgasplant/plugins/select2/select2.min.css')}}">
@endsection

{{-- CUSTOM SCRIPT FOR BOOTSTRAP SELECT --}}


