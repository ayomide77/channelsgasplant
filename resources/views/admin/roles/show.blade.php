@extends('layouts.adminApp')


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Roles','title1'=>'Roles','title2'=>'List'])
           {{-- INCLUDE PAGE HEADER --}}

        <div class="row">
          
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Role Management</h4> 
                            </div>                   
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <h4 class="mb-3">Role Name : {{ $role->name }}</h4>
                        <ul class="list-group">
                        @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $rolePermission)
                        <li class="list-group-item"><b>{{ $rolePermission->name }}</b></li>
                        @endforeach
                        @endif
                        </ul>
                     
                    </div>
                    <div class="widget-content widget-content-area text-center split-buttons">
                        <a href="{{url()->previous()}}" class="btn btn-outline-secondary mb-2">Go Back</a>
                    </div>
                </div>
            </div>


        </div>
        
    </div>
    
</div>
@endsection