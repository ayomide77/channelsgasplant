@extends('layouts.adminApp',['bodyClass'=>'sidebar-noneoverflow'])


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Customers','title1'=>'Customers List'])
           {{-- INCLUDE PAGE HEADER --}}

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="customersTable" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                              <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                           $i = 0;   
                          @endphp
                         
                          @foreach ($data as $user)
                          <tr>
                            
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                              @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $roles)
                                 <label class="badge badge-info" >{{ $roles }}</label>
                              @endforeach
                            @endif
                          </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse( $user->created_at )->toFormattedDateString() }}</td>
                          
                            <td class="text-center">
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <a class="btn btn-info btn-sm" href="{{ route('admin.users.show',$user->id) }}">Show</a>
                              <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
                             
                               <form  action="{{ route("admin.users.destroy",$user->id) }}"
                                                   method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button class="btn btn-danger btn-sm" >Delete</button>
                                  </form>
                              </div>
                          </td>
                        </tr>
                          @endforeach       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        
    </div>
    
</div>
@endsection

{{-- CUSTOM DATA TABLE SRIPTS --}}
@section('custom_scripts')
{{-- IMPORT SCRIPTS FOR DATA TABLE --}}
@include('admin.includes.dataTableJs',array('tableID'=>'customersTable'))
{{-- IMPORT SCRIPTS FOR DATA TABLE --}}
@endsection
{{-- CUSTOM DATA TABLE SRIPTS --}}