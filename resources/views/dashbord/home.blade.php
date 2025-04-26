@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
         <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">
        <!--begin::Page title-->
             <div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <!--begin::Title-->
              <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0"> Dashboard </h1>
            <!--end::Title-->

             </div>

    </div>
    <!--end::Toolbar container-->
@endsection

@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid " >


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container ">
            <!--begin::Row-->
            <div class="row gx-5 gx-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-10">

                    <!--begin::Lists Widget 19-->
                    <div class="card card-flush h-xl-100" >
                        <!--begin::Heading-->
                        <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                             style="background-color: var(--bs-app-sidebar-dark-bg-color)" data-bs-theme="light">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column text-white pt-15">
                                <span class="fw-bold fs-2x mb-3">My Tasks</span>

                                <div class="fs-4 text-white">
                                    <span class="opacity-75">You have</span>

                                    <span class="position-relative d-inline-block">
                    <a href="/keen/demo1/pages/user-profile/projects.html" class="link-white opacity-75-hover fw-bold d-block mb-1">4 tasks</a>

                                        <!--begin::Separator-->
                    <span class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                                        <!--end::Separator-->
                </span>

                                    <span class="opacity-75">to comlete</span>
                                </div>
                            </h3>
                            <!--end::Title-->
                              </div>
                        <!--end::Heading-->

                        <!--begin::Body-->
                        <div class="card-body mt-n20">
                            <!--begin::Stats-->
                            <div class="mt-n20 position-relative">
                                <!--begin::Row-->
                                <div class="row g-3 g-lg-6">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                <span class="symbol-label">
                                    <i class="ki-duotone ki-flask fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i>
                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">37</span>
                                                <!--end::Number-->

                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Courses</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                <span class="symbol-label">
                                    <i class="ki-duotone ki-bank fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i>
                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">6</span>
                                                <!--end::Number-->

                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Certificates</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                <span class="symbol-label">
                                    <i class="ki-duotone ki-award fs-1 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">4,7</span>
                                                <!--end::Number-->

                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Avg. Score</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                <span class="symbol-label">
                                    <i class="ki-duotone ki-timer fs-1 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">822</span>
                                                <!--end::Number-->

                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Hours Learned</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->

                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Lists Widget 19-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-8 mb-10">
                    <!--begin::Timeline Widget 1-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-5">
                            <!--begin::Card title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Team Schedule</span>

                                <span class="text-gray-500 pt-2 fw-semibold fs-6">49 Acual Tasks</span>
                            </h3>
                            <!--end::Card title-->

                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Tabs-->
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_day">Day</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_week">Week</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_month">Month</a>
                                    </li>
                                </ul>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pb-0">
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div class="tab-pane active" id="kt_timeline_widget_1_tab_day" role="tabpanel" aria-labelledby="day-tab" data-kt-timeline-widget-1-blockui="true">
                                    <div class="table-responsive pb-10">
                                        <!--begin::Timeline-->
                                        <div id="kt_timeline_widget_1_1" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-1-image-root="/public/assets/media/"></div>
                                        <!--end::Timeline-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->

                                <!--begin::Tab pane-->
                                <div class="tab-pane" id="kt_timeline_widget_1_tab_week" role="tabpanel" aria-labelledby="week-tab" data-kt-timeline-widget-1-blockui="true">
                                    <div class="table-responsive pb-10">
                                        <!--begin::Timeline-->
                                        <div id="kt_timeline_widget_1_2" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-1-image-root="/public/assets/media/"></div>
                                        <!--end::Timeline-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->

                                <!--begin::Tab pane-->
                                <div class="tab-pane" id="kt_timeline_widget_1_tab_month" role="tabpanel" aria-labelledby="month-tab" data-kt-timeline-widget-1-blockui="true">
                                    <div class="table-responsive pb-10">
                                        <!--begin::Timeline-->
                                        <div id="kt_timeline_widget_1_3" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-1-image-root="/public/assets/media/"></div>
                                        <!--end::Timeline-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->
                            </div>
                            <!--end::Tab content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Timeline Widget 1-->
                </div>
                <!--end::Col-->

            </div>
            <!--end::Row-->



            <!--begin::Row-->
            <div class="row g-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4">

                    <!--begin::List widget 21-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Active Lessons</span>

                                <span class="text-muted mt-1 fw-semibold fs-7">Avg. 72% completed lessons</span>
                            </h3>

                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="javascript:;" class="btn btn-sm btn-light">All Lessons</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-5">

                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/svg/brand-logos/laravel-2.svg')}}" class="me-4 w-30px" alt=""/>
                                    <!--end::Logo-->

                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="javascript:;" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Laravel</a>
                                        <!--end::Text-->

                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">PHP Framework</span>
                                        <!--end::Description--->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-success">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->

                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">
                                          65%
                                      </span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->


                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/svg/brand-logos/vue-9.svg')}}" class="me-4 w-30px" alt=""/>
                                    <!--end::Logo-->

                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="javascript:;" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Vue 3</a>
                                        <!--end::Text-->

                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">JS Framework</span>
                                        <!--end::Description--->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-warning">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->

                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">
                        87%
                    </span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->


                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/svg/brand-logos/bootstrap5.svg')}}" class="me-4 w-30px" alt=""/>
                                    <!--end::Logo-->

                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="javascript:;" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Bootstrap 5</a>
                                        <!--end::Text-->

                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">CSS Framework</span>
                                        <!--end::Description--->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-primary">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 44%" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->

                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">
                                               44%
                                            </span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->


                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/svg/brand-logos/angular-icon.svg')}}" class="me-4 w-30px" alt=""/>
                                    <!--end::Logo-->

                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="javascript:;" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Angular 16</a>
                                        <!--end::Text-->

                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">JS Framework</span>
                                        <!--end::Description--->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-info">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->

                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">
                        70%
                    </span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->


                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/svg/brand-logos/spring-3.svg')}}" class="me-4 w-30px" alt=""/>
                                    <!--end::Logo-->

                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="javascript:;" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Spring</a>
                                        <!--end::Text-->

                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Java Framework</span>
                                        <!--end::Description--->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-danger">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->

                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">
                        56%
                    </span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->


                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src=" {{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/svg/brand-logos/typescript-1.svg')}}" class="me-4 w-30px" alt=""/>
                                    <!--end::Logo-->

                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="javascript:;" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">TypeScript</a>
                                        <!--end::Text-->

                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Better Tooling</span>
                                        <!--end::Description--->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-success">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->

                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">
                        82%
                    </span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->



                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 21-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Chart widget 18-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Learn Activity</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Hours per course</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4">
                                    <!--begin::Display range-->
                                    <div class="text-gray-600 fw-bold">
                                        Loading date range...
                                    </div>
                                    <!--end::Display range-->

                                    <i class="ki-duotone ki-calendar-8 text-gray-500 lh-0 fs-2 ms-2 me-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></i>
                                </div>
                                <!--end::Daterangepicker-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_18_chart" class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Chart widget 18-->

                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

@endsection

@section('css')


    @if(app()->getLocale() =='ar')

        <link href="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    @else
        <link href="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet"
              type="text/css"/>
    @endif

@endsection
@section('js')
    <script src="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>

    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/products.js')}}"></script>

    <script type="text/javascript">
        document.querySelectorAll('input[type="date"], input[type="time"]').forEach(function(input) {
            input.addEventListener("click", function() {
                this.showPicker();
            });
        });
    </script>
@endsection
