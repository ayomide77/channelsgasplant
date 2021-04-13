@extends('layouts.adminApp',['title'=>'Admin Dashboard | Edit Role'])


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Roles','title1'=>'Roles','title2'=>'Edit'])
           {{-- INCLUDE PAGE HEADER --}}
           <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('admin.partials._alerts')

                <div class="widget-content widget-content-area br-6">
                    <form action="{{ route("admin.roles.update",$role->id) }}"  method="POST">
                        @csrf
                        @method('PATCH')
                        <!-- Form Controls -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div>
                                    <div class="card-body row">
                                        <div class="col-md-12 col-xs-12 col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputLeftIcon">Role Name</label>
                                                <span class="form-icon-wrapper">
                                                    <span class="form-icon form-icon--left">
                                                        <i class="fa fa-user-circle form-icon__item"></i>
                                                    </span>
                                                    <input
                                                        class="form-control  form-icon-input-left @error('name') is-invalid @enderror"
                                                        id="confirm-password" type="text" name="name" value="{{$role->name}}"
                                                        placeholder="Role Name" required />
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
                                                <label>Select Permission</label>
                                                <select class="placeholder js-states form-control" required
                                                    placeholder="Select upto 5 tags" name="permission[]" multiple>
                                                    {{-- LOOP ALL PERMISSIONS --}}
                                                    @foreach ($permissions as $permission)

                                                    <option value="{{ $permission->id }}"
                                                            {{-- LOOP PERMISSINS ID SYNCED WITH THIS ROLE --}}
                                                        @foreach ($rolePermissions as $rolePermission)
                                                            @if ($rolePermission == $permission->id)
                                                                selected
                                                            @endif

                                                        @endforeach
                                                         >
                                                {{ $permission->name }} </option>

                                                @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        {{-- <hr class="my-4"> --}}
                                        <div class="input-group">
                                            <button class="btn btn-primary m-1" type="submit">
                                                Update Role</button>
                                            <a href="{{route('admin.roles.index')}}" class="btn btn-outline-secondary m-1">Cancel Update</a>
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
@endsection


{{-- CUSTOM STYLES --}}
@section('custom_scripts')
<script src="{{asset('chnlsgasplant/plugins/select2/select2.min.js')}}"></script>
@include('admin.includes.multipleSelectJs')
@endsection


@section('custom_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('chnlsgasplant/plugins/select2/select2.min.css')}}">
@endsection
{{-- CUSTOM STYLES --}}