@extends('layouts.adminApp',array('bodyClass'=>'sidebar-noneoverflow'))


@section('custom_styles')
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link href="{{asset('chnlsgasplant/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('chnlsgasplant/plugins/select2/select2.min.css')}}">
@endsection


@section('content')

@include('admin.partials._adminHeader')

 <!--  BEGIN MAIN CONTAINER  -->
 <div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN TOPBAR  -->
   @include('admin.partials._adminNavBar')
    <!--  END TOPBAR  -->
    
 <!--  BEGIN MAIN CONTAINER  -->
 <div class="main-container" id="container">

  <div class="overlay"></div>
  <div class="search-overlay"></div>


  <!--  BEGIN CONTENT AREA  -->
  <div id="content" class="main-content">
      <div class="layout-px-spacing">
          
          <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-spacing">

                    <!-- Content -->
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Info</h3>
                                    <a href="{{route('admin.profile.edit',Auth::user()->id)}}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                </div>
                                <div class="text-center user-info">
                                    @if (Auth::user()->image != null)
                                    <img src="/chnlsgasplant/images/user/{{Auth::user()->image}}" alt="{{Auth::user()->name}}"> 
                                    @else
                                    <img src="/chnlsgasplant/images/user/default.png" alt="{{Auth::user()->name}}">
                                    @endif
                                    <p class="">{{ Auth::user()->name }}</p>
                                </div>
                                <div class="user-info-list">

                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                          
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>{{ \Carbon\Carbon::parse( Auth::user()->created_at )->toFormattedDateString() }}
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{Auth::user()->state ?? 'N/A'}},{{Auth::user()->city ?? 'N/A'}}
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{ Auth::user()->email ?? 'N/A'}}</a>
                                            </li>
                                            
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg> 
                                                @if(!empty(Auth::user()->getRoleNames()))
                                                @foreach(Auth::user()->getRoleNames() as $role)
                                                    <label class="badge badge-success">{{ $role }}</label>
                                                @endforeach
                                            @endif
                                            </li>
                                            
                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                        <div class="bio layout-spacing ">
                            <div class="widget-content widget-content-area">
                               
                                <div class="bio-skill-box">

                                    <div class="row">
                                        <form action="{{ route("admin.users.update",Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
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
                                                                            value="{{Auth::user()->name}}" required/>
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
                                                                            value="{{Auth::user()->email}}" required/>
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
                                                                            value="{{Auth::user()->address ?? ''}}" />
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
                                                                            value="{{Auth::user()->city ?? ''}}" />
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
                                                                            value="{{Auth::user()->state ?? ''}}" />
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
                                                                            value="{{Auth::user()->country ?? ''}}" />
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
                                                                            placeholder="Phone Number" value="{{Auth::user()->phone}}"  required/>
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
                                                            {{-- <hr class="my-4"> --}}
                                                            <div class="input-group">
                                                                <button class="btn btn-primary m-1" type="submit" disabled>
                                                                    Update User</button>
                                                                <a href="{{route('admin.users.index')}}" class="btn btn-outline-secondary m-1"
                                                                    >Cancel</a>
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

          </div>

  </div>
  <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->
@endsection
@section('custom_scripts')
<script src="{{asset('chnlsgasplant/plugins/select2/select2.min.js')}}"></script>
@include('admin.includes.multipleSelectJs')
@endsection