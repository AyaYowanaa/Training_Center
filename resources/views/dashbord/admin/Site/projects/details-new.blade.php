@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('dash_site.details')}}</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">

                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        {{trans('Toolbar.home')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.site')}}
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.projects.index') }}"
                       class="text-muted text-hover-primary"> {{trans('Toolbar.projec')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.projectDetails')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.projects.create')}}"
                   class="btn btn-icon btn-sm btn-success flex-shrink-0 ms-4">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                              rx="1" transform="rotate(-90 11.364 20.364)"
                                                              fill="currentColor"/>
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                              fill="currentColor"/>
													</svg>
												</span>
                    <!--end::Svg Icon-->
                </a>
                <a href="{{route('admin.projects.index')}}"
                   class="btn btn-icon btn-sm btn-primary flex-shrink-0 ms-4">

                    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/arrows/arr054.svg-->
                    <span class="svg-icon svg-icon-2">
                                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                       <path
                                           d="M17.6 4L9.6 12L17.6 20H13.6L6.3 12.7C5.9 12.3 5.9 11.7 6.3 11.3L13.6 4H17.6Z"
                                           fill="currentColor"/>
                                   </svg>
                                </span>
                    <!--end::Svg Icon-->
                </a>

            </div>
            <!--end::Filter menu-->
            <!--begin::Secondary button-->
            <!--end::Secondary button-->
            <!--begin::Primary button-->
            <!--end::Primary button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
@endsection
@section('content')
    {{--    {{dd($one_data)}}--}}

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxxl">

        <!--begin::Contacts-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                    <h2>Contact Details</h2>
                </div>
                <!--end::Card title-->
                {{--
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar gap-3">
                                        <!--begin::Chat-->
                                        <button class="btn btn-sm btn-light btn-active-light-primary" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">
                                            <i class="ki-duotone ki-message-text-2 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                Chat
                                        </button>
                                        <!--end::Chat-->

                                        <!--begin::Chat-->
                                        <a href="/keen/demo1/apps/inbox/reply.html" class="btn btn-sm btn-light btn-active-light-primary">
                                            <i class="ki-duotone ki-messages fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                Message
                                        </a>
                                        <!--end::Chat-->

                                        <!--begin::Action menu-->
                                        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-dots-square fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>            </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/keen/demo1/apps/contacts/edit-contact.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" id="kt_contact_delete" data-kt-redirect="/keen/demo1/apps/contacts/getting-started.html">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->            <!--end::Action menu-->
                                    </div>
                                    <!--end::Card toolbar-->--}}
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Profile-->
                <div class="d-flex gap-7 align-items-center">
                    <!--begin::Avatar-->
                {{--    <div class="symbol symbol-circle symbol-100px">
                        <img src="{{$one_data->eventImage}}" class="overlay-layer" alt="image">
                    </div>
--}}
                    <a class="d-block overlay" data-fslightbox="lightbox-basic"
                       href="{{$one_data->eventImage}}">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-circle symbol-100px">

                            <img src="{{$one_data->eventImage}}" class=" overlay-wrapper" alt="image">


                        </div>
                        <!--end::Avatar-->
                        <!--begin::Action-->
                        <div
                            class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                            <i class="bi bi-eye-fill text-white fs-3x"></i>
                        </div>
                        <!--end::Action-->
                    </a>

                    <!--end::Avatar-->

                    <!--begin::Contact details-->
                    <div class="d-flex flex-column gap-2">
                        <!--begin::Name-->
                        <h3 class="mb-0">{{$one_data->eventTitle}}</h3>
                        <!--end::Name-->
{{--
                        <!--begin::Email-->
                        <div class="d-flex align-items-center gap-2">
                            <i class="ki-duotone ki-sms fs-2"><span class="path1"></span><span class="path2"></span></i>
                            <a href="#" class="text-muted text-hover-primary">{{$one_data->eventPublisher}}</a>
                        </div>
                        <!--end::Email-->

                        <!--begin::Phone-->
                        <div class="d-flex align-items-center gap-2">
                            <i class="ki-duotone ki-phone fs-2"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <a href="#" class="text-muted text-hover-primary">{{$one_data->eventDate}}</a>
                        </div>
                        <!--end::Phone-->
                        --}}
                    </div>
                    <!--end::Contact details-->
                </div>
                <!--end::Profile-->

                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8 gap-2"
                    role="tablist">
                    <!--begin:::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-4 active"
                           data-bs-toggle="tab"
                           href="#kt_contact_view_general" aria-selected="false" role="tab" tabindex="-1">
                            <i class="ki-duotone ki-home fs-4 me-1"></i> {{trans('dash_site.details')}}
                        </a>
                    </li>
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary d-flex align-items-center pb-4 "
                           data-bs-toggle="tab" href="#kt_contact_view_meetings" aria-selected="true" role="tab">
                            <i class="ki-duotone ki-calendar-8 fs-4 me-1"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                    class="path5"></span><span class="path6"></span></i>
                            {{trans('dash_site.images')}}
                        </a>
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <div class="tab-content" id="">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade  active show" id="kt_contact_view_general" role="tabpanel">

                        <!--begin::Additional details-->
                        <div class="d-flex flex-column gap-5 mt-7">
                            <!--begin::Company name-->
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">{{trans('dash_site.title')}}</div>
                                <div class="fw-bold fs-5">{{$one_data->eventTitle}}</div>
                            </div>
                            <!--end::Company name-->
                            <div class="row">

                                <!--begin::City-->
                                <div class="d-flex flex-column gap-1 col">
                                    <div class="fw-bold text-muted">{{trans('dash_site.publisher')}}</div>
                                    <div class="fw-bold fs-5">{{$one_data->eventPublisher}}</div>
                                </div>
                                <!--end::City-->

                                <!--begin::Country-->
                                <div class="d-flex flex-column gap-1 col">
                                    <div class="fw-bold text-muted">{{trans('dash_site.date_at')}}</div>
                                    <div class="fw-bold fs-5">{{$one_data->eventDate}}</div>
                                </div>
                                <!--end::Country-->
                            </div>
                            <div class="row">
                                <!--begin::City-->
                                <div class="d-flex flex-column gap-1 col">
                                    <div class="fw-bold text-muted">{{trans('dash_site.city')}}</div>
                                    <div class="fw-bold fs-5">{{$one_data->city}}</div>
                                </div>
                                <!--end::City-->

                                <!--begin::Country-->
                                <div class="d-flex flex-column gap-1 col ">
                                    <div class="fw-bold text-muted">{{trans('dash_site.district')}}</div>
                                    <div class="fw-bold fs-5">{{$one_data->district}}</div>
                                </div>
                                <!--end::Country-->
                            </div>
                            <!--begin::Country-->
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">{{trans('dash_site.location')}}</div>
                                <div class="fw-bold fs-5">{{$one_data->eventLocation}}</div>
                            </div>
                            <!--end::Country-->

                            <!--begin::Notes-->
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">{{trans('dash_site.details')}}</div>
                                <div>
                                    {!! $one_data->eventDetails !!}
                                </div>
                            </div>
                            <!--end::Notes-->
                            <!--begin::Notes-->
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">{{trans('dash_site.features')}}</div>
                                <div>
                                    {!! $one_data->eventFeatures !!}
                                </div>
                            </div>
                            <!--end::Notes-->
                        </div>
                        <!--end::Additional details-->
                    </div>
                    <!--end:::Tab pane-->

                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_contact_view_meetings" role="tabpanel">

                        <!--begin::Tab Content-->

                        <div class="tab-content">
                            <!--begin::Day-->
                            @if(isset($one_data->eventImgaes)&&($one_data->eventImgaes))

                                <div class="row">

                                    @foreach($one_data->eventImgaes as $image)
                                        <div class="col-3 mb-2">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                               href="{{$image->image}}">
                                                <!--begin::Image-->
                                                <div
                                                    class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                    style="background-image:url('{{$image->thumbnailsm}}')">
                                                </div>
                                                <!--end::Image-->

                                                <!--begin::Action-->
                                                <div
                                                    class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Overlay-->
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!--end::Tab Content-->
                    </div>
                    <!--end:::Tab pane-->


                </div>
                <!--end::Tab content-->


            </div>
            <!--end::Card body-->
        </div>
        <!--end::Contacts-->

    </div>
    <!--end::Content-->

@endsection
@section('js')
    <script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>

@endsection
