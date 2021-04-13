@extends('layouts.adminApp',array('bodyClass'=>'alt-menu sidebar-noneoverflow'))

@section('content')

    <div class="header-container">
        @include('admin.partials._adminHeader')
    </div>


    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="row">

                        <div class="col-xl-12  col-md-12">

                            <div class="mail-box-container">
                                <div class="mail-overlay"></div>

                                <div class="tab-title">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12 text-center mail-btn-container">
                                            <a id="btn-compose-mail" class="btn btn-block" href="javascript:void(0);"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg></a>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12 mail-categories-container">

                                            <div class="mail-sidebar-scroll">

                                                <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions active" id="mailInbox"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-inbox">
                                                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12">
                                                                </polyline>
                                                                <path
                                                                    d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                                                </path>
                                                            </svg> <span class="nav-names">Inbox</span> <span
                                                                class="mail-badge badge"></span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions" id="important"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-star">
                                                                <polygon
                                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                </polygon>
                                                            </svg> <span class="nav-names">Attended</span></a>
                                                    </li>
                                                  

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="mailbox-inbox" class="accordion mailbox-inbox">

                                    <div class="action-center">

                                        <div class="">
                                            <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown"
                                                href="#" role="button" aria-haspopup="true" aria-expanded="false"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" data-toggle="tooltip"
                                                    data-placement="top" data-original-title="Label" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-bell">
                                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                                </svg></a>
                                            <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                <a class="label-group-item label-personal dropdown-item position-relative g-dot-primary"
                                                    href="javascript:void(0);"> Personal</a>
                                                <a class="label-group-item label-work dropdown-item position-relative g-dot-warning"
                                                    href="javascript:void(0);"> Work</a>
                                                <a class="label-group-item label-social dropdown-item position-relative g-dot-success"
                                                    href="javascript:void(0);"> Social</a>
                                                <a class="label-group-item label-private dropdown-item position-relative g-dot-danger"
                                                    href="javascript:void(0);"> Private</a>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" data-toggle="tooltip" data-placement="top"
                                                data-original-title="Important" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-star action-important">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Spam"
                                                class="feather feather-alert-circle action-spam">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12" y2="16"></line>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" data-toggle="tooltip" data-placement="top"
                                                data-original-title="Revive Mail" stroke-linejoin="round"
                                                class="feather feather-activity revive-mail">
                                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Delete Permanently"
                                                class="feather feather-trash permanent-delete">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                            </svg>
                                            <div class="dropdown d-inline-block more-actions">
                                                <a class="nav-link dropdown-toggle" id="more-actions-btns-dropdown"
                                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-vertical">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="more-actions-btns-dropdown">
                                                    <a class="dropdown-item action-mark_as_read" href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-book-open">
                                                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                                        </svg> Mark as Read
                                                    </a>
                                                    <a class="dropdown-item action-mark_as_unRead"
                                                        href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-book">
                                                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                                            <path
                                                                d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z">
                                                            </path>
                                                        </svg> Mark as Unread
                                                    </a>
                                                    <a class="dropdown-item action-delete" href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Delete" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg> Trash
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="message-box">
                                        <div id="mailCollapseThree" class="collapse ps  show"
                                            aria-labelledby="mailHeadingThree" data-parent="#mailbox-inbox">
                                            <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com"
                                                data-mailto="linda@mail.com" data-mailcc="">

                                                <div class="d-flex justify-content-between">

                                                    <div class="d-flex user-info">
                                                        <div class="f-head">
                                                            <img src="/chnlsgasplant/images/user/{{ $ticket->user->image }}"
                                                                class="user-profile" alt="avatar">
                                                        </div>
                                                        <div class="f-body">
                                                            <div class="meta-title-tag">
                                                                <h4 class="mail-usr-name" data-mailtitle="Promotion Page">
                                                                    {{ $ticket->user->name }}</h4>
                                                            </div>
                                                            <div class="meta-mail-time">
                                                                <p class="user-email" data-mailto="laurieFox@mail.com">
                                                                    {{ $ticket->user->email }}</p>
                                                                <p class="mail-content-meta-date current-recent-mail">
                                                                    {{ \Carbon\Carbon::parse($ticket->created_at)->toFormattedDateString() }}
                                                                    -</p>
                                                                <p class="meta-time align-self-center">2:00 PM</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="action-btns">
                                                        <a href="{{ route('admin.tickect.edit', $ticket->id) }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Reply">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                class="feather feather-corner-up-left reply">
                                                                <polyline points="9 14 4 9 9 4"></polyline>
                                                                <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="javascript:void(0);" data-toggle="tooltip"
                                                            data-placement="top" data-original-title="Forward">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                class="feather feather-corner-up-right forward">
                                                                <polyline points="15 14 20 9 15 4"></polyline>
                                                                <path d="M4 20v-7a4 4 0 0 1 4-4h12"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>

                                                <p class="mail-content" data-mailTitle="Promotion Page"
                                                    data-maildescription='{"ops":[{""}]}'> {{ $ticket->message }} </p>


                                                @if ($ticket->file)

                                                    <div class="gallery text-center">
                                                        <img alt="image-gallery" src="assets/img/scroll-6.jpg"
                                                            class="img-fluid mb-4 mt-4"
                                                            style="width: 250px; height: 180px;">
                                                        <img alt="image-gallery" src="assets/img/scroll-7.jpg"
                                                            class="img-fluid mb-4 mt-4"
                                                            style="width: 250px; height: 180px;">
                                                        <img alt="image-gallery" src="assets/img/scroll-8.jpg"
                                                            class="img-fluid mb-4 mt-4"
                                                            style="width: 250px; height: 180px;">
                                                    </div>

                                                    <div class="attachments">
                                                        <h6 class="attachments-section-title">Attachments</h6>
                                                        <div class="attachment file-pdf">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-file-text">
                                                                    <path
                                                                        d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                                    </path>
                                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                                </svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Confirm File.txt</p>
                                                                    <p class="file-size">450kb</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="attachment file-folder">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-file-text">
                                                                    <path
                                                                        d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                                    </path>
                                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                                </svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Important Docs.xml</p>
                                                                    <p class="file-size">2.1MB</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endif

                                                <hr />
                                                 
                                                <div class="compose-content">
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
                                                       {{-- include flash mesage --}}
                                                    @include('admin.partials._alerts')
                                                    {{-- include flash mesage --}}
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

        </div>

    </div>
    <!--  END CONTENT AREA  -->
@endsection



{{-- custom style section --}}
@section('custom_styles')

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('chnlsgasplant/plugins/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('chnlsgasplant/assets/css/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />

@endsection
{{-- custom style section --}}
