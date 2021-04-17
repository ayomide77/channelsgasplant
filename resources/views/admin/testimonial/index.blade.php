@extends('layouts.adminApp')


@section('custom_styles')
    <link href="/chnlsgasplant/assets/css/apps/contacts.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Testimonial','title1'=>'Testimonial','title2'=>'List'])
           {{-- INCLUDE PAGE HEADER --}}

                   <div class="col-lg-12">
                  
                        <div class="widget-content searchable-container list">

                            <div class="searchable-items list">
                                <div class="items items-header-section">
                                    <div class="item-content">
                                        <div class="">
                                            
                                            <h4>Name</h4>
                                        </div>
                                        <div >
                                            <h4>Ocupation</h4>
                                        </div>
                                        <div >
                                            <h4 style="margin-left: 0;">Testimonial</h4>
                                        </div>
                                        <div >
                                            <h4 style="margin-left: 0;">Status</h4>
                                        </div>
                                        <div class="user-phone">
                                            <h4 style="margin-left: 3px;">Action</h4>
                                        </div>
                                       
                                    </div>
                                </div>
                                @if (count($testimonials) > 0)
                                    
                                @foreach ($testimonials as $testimonial)
                                    <div class="items" style="">
                                    <div class="item-content">
                                       
                                        <div >
                                            <p  >{{$testimonial->fullname}}</p>
                                        </div>
                                        <div >
                                            <p >{{$testimonial->occupation}}</p>
                                        </div>

                                        <div class="user-phone">
                                            <p class="usr-ph-no" >{{ Str::limit($testimonial->details, 50) }}</p>
                                        </div>
                                        @if($testimonial->status == 1)
                                        <td class="text-center"><span class="badge badge-success">Approved</span></td>
                                        @else
                                        <td class="text-center"><span class="badge badge-info">Pending</span></td>
                                        @endif
                                        <div class="action-btn">
                                            <a href="{{route("admin.testimonial.edit",$testimonial->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit" ><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                            </a>

                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple" onclick="event.preventDefault();
                                                        document.getElementById('delete-form').submit();"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                @else
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                                <div class="alert alert-info mb-4" role="alert">
                                <strong>Info!</strong> {{ 'No  Top Testimonial Found' }}</button>
                                </div>
                                </div>
                                @endif

                            </div>

                        </div>
                    </div>
        
    </div>
    
</div>
@endsection