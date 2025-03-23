<!--begin::Profile-->
<div class="d-flex gap-7 align-items-center">
    <!--begin::Avatar-->
  {{--  <div class="symbol symbol-circle symbol-100px">
        <img src="{{$one_data->eventImage}}" class="overlay-layer" alt="image">
    </div>--}}

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
            <i class="ki-duotone ki-home fs-4 me-1"></i> {{trans('projects.details')}}
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
            {{trans('projects.images')}}
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
                <div class="fw-bold text-muted">{{trans('projects.title')}}</div>
                <div class="fw-bold fs-5">{{$one_data->eventTitle}}</div>
            </div>
            <!--end::Company name-->
            <div class="row">

                <!--begin::City-->
                <div class="d-flex flex-column gap-1 col">
                    <div class="fw-bold text-muted">{{trans('projects.publisher')}}</div>
                    <div class="fw-bold fs-5">{{$one_data->eventPublisher}}</div>
                </div>
                <!--end::City-->

                <!--begin::Country-->
                <div class="d-flex flex-column gap-1 col">
                    <div class="fw-bold text-muted">{{trans('projects.date_at')}}</div>
                    <div class="fw-bold fs-5">{{$one_data->eventDate}}</div>
                </div>
                <!--end::Country-->
            </div>
            <div class="row">
                <!--begin::City-->
                <div class="d-flex flex-column gap-1 col">
                    <div class="fw-bold text-muted">{{trans('projects.city')}}</div>
                    <div class="fw-bold fs-5">{{$one_data->city}}</div>
                </div>
                <!--end::City-->

                <!--begin::Country-->
                <div class="d-flex flex-column gap-1 col ">
                    <div class="fw-bold text-muted">{{trans('projects.district')}}</div>
                    <div class="fw-bold fs-5">{{$one_data->district}}</div>
                </div>
                <!--end::Country-->
            </div>
            <!--begin::Country-->
            <div class="d-flex flex-column gap-1">
                <div class="fw-bold text-muted">{{trans('projects.location')}}</div>
                <div class="fw-bold fs-5">{{$one_data->eventLocation}}</div>
            </div>
            <!--end::Country-->

            <!--begin::Notes-->
            <div class="d-flex flex-column gap-1">
                <div class="fw-bold text-muted">{{trans('projects.details')}}</div>
                <div>
                    {!! $one_data->eventDetails !!}
                </div>
            </div>
            <!--end::Notes-->
            <!--begin::Notes-->
            <div class="d-flex flex-column gap-1">
                <div class="fw-bold text-muted">{{trans('projects.features')}}</div>
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
                        <div class="col-6 mb-2">
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



