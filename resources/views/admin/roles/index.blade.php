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
                       
                            <div class="widget-content widget-content-area">
                                <div class=" split-buttons">
                                    <a href="{{ route('admin.roles.create') }}" class="btn btn-outline-info mb-1">Create
                                        Role</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('admin.roles.show', $role->id) }}">Show</a>
                                                        @can('edit role')
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                                                        @endcan
                                                        @can('delete role')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::submit('Delete', [
                                                                    'class' => 'btn btn-danger
                                                                btn-sm',
                                                                ]) !!}
                                                            {!! Form::close() !!}
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>

                                    {!! $roles->render() !!}
                                </div>

                            </div>
                         
                    </div>
                   
                </div>
            </div>


        </div>
        
    </div>
    
</div>
@endsection