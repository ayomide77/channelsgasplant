@extends('layouts.adminApp',array('bodyClass'=>'sidebar-noneoverflow'))


@section('custom_styles')
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link href="{{asset('chnlsgasplant/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('chnlsgasplant/plugins/select2/select2.min.css')}}">
@endsection


@section('content')


 <!--  BEGIN MAIN CONTAINER  -->
 <div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    
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
                                    <a href="{{route('admin.users.edit',$ticket->user->id)}}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                </div>
                                <div class="text-center user-info">
                                    @if ($ticket->user->image != null)
                                    <img src="/chnlsgasplant/images/user/{{$ticket->user->image}}" alt="{{$ticket->user->name}}"> 
                                    @else
                                    <img src="/chnlsgasplant/images/user/default.png" alt="{{$ticket->user->name}}">
                                    @endif
                                    <p class="">{{ $ticket->user->name }}</p>
                                </div>
                                <div class="user-info-list">

                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                          
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>{{ \Carbon\Carbon::parse( $ticket->user->created_at )->toFormattedDateString() }}
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{$ticket->user->state ?? 'N/A'}},{{$ticket->user->city ?? 'N/A'}}
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{ $ticket->user->email ?? 'N/A'}}</a>
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
                                <h3 class="">Ticket Message</h3>
                                <p>{{$ticket->message}}</p>

                                <div class="bio-skill-box">

                                    <div class="row">
                                        
                                        <div class="col-12 col-xl-12 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('admin.tickect.update', $ticket->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex mb-4 mt-2">
                                                <input type="file" class="form-control-file"
                                                    id="mail_File_attachment" name="file">
                                            </div>
                                            <div class="d-flex">
                                                <textarea class="form-control" rows="5"
                                                    id="mail_File_attachment" name="response"
                                                    required></textarea>
                                            </div>

                                            <div class="d-flex mb-4 mt-2">
                                                <button id="btn-reply" type="submit" class="btn btn-success">
                                                    Reply</button>
                                                <a href="{{route('admin.tickect.index')}}" id="btn-fwd" class="btn btn-warning"> Cancel</a>
                                            </div>

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

  </div>
  <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->
@endsection
