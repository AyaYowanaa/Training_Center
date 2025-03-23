@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
               Show Data</h1>
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
                    <a href="{{ route('admin.service.index') }}"
                       class="text-muted text-hover-primary">Hr</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                   Loan
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.service.index')}}"
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

          <!--begin::Content container-->
          <div id="kt_app_content_container" class="app-container container-xxxl">
            <!--begin::Post card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-10 pb-lg-0">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-15">
                            <!--begin::Post content-->
                            <div class="mb-17">
                                <!--begin::Wrapper-->
                                <div class="mb-8">
                                    <!--begin::Container-->
                                    <div class="overlay mt-0">


                                    </div>
                                    <!--end::Container-->
                                </div>


                                <!--end::Wrapper-->

                                <!--begin::Body-->
                            <div class="fs-5 fw-semibold text-gray-600 mt-4" >

                                <table style=" border-collapse: collapse; width=50%">
                                    <tbody>
                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.name')}}:-</td>
                                           <td style="color:black">{{$service->name}}</td>
                                        </tr>

                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.phone')}}:-</td>
                                            <td style="color:black">{{$service->phone}}</td>
                                        </tr>

                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.address')}}:-</td>
                                            <td style="color:black">{{$service->address}}</td>
                                        </tr>

                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.fax')}}:-</td>
                                            <td style="color:black">{{$service->fax}}</td>
                                        </tr>
                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.governorate')}}:-</td>
                                            <td style="color:black">{{$service->governorate}}</td>
                                        </tr>
                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.city')}}:-</td>
                                            <td style="color:black">{{$service->city}}</td>
                                        </tr>
                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.manager_name')}}:-</td>
                                            <td style="color:black">{{$service->manager_name}}</td>
                                        </tr>
                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.manager_job')}}:-</td>
                                            <td style="color:black">{{$service->manager_job}}</td>
                                        </tr>
                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.manager_phone')}}:-</td>
                                            <td style="color:black">{{$service->manager_phone}}</td>
                                        </tr>
                                        <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.legal_intity')}}:-</td>
                                            <td style="color:black">{{$service->legal_intity}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.services')}}:-</td>
                                            <td style="color:black">{{$service->services}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.finance_value')}}:-</td>
                                            <td style="color:black">{{$service->finance_value}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.conditions')}}:-</td>
                                            <td style="color:black">{{$service->conditions}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.target_groups')}}:-</td>
                                            <td style="color:black">{{$service->target_groups}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.expenses')}}:-</td>
                                            <td style="color:black">{{$service->expenses}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.service_period')}}:-</td>
                                            <td style="color:black">{{$service->service_period}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.loan_period')}}:-</td>
                                            <td style="color:black">{{$service->loan_period}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.how_pay')}}:-</td>
                                            <td style="color:black">{{$service->how_pay}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.loan_again')}}:-</td>
                                            <td style="color:black">{{$service->loan_again}}</td>
                                        </tr>   <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.training_before')}}:-</td>
                                            <td style="color:black">{{$service->training_before}}</td>
                                        </tr>
                                         <tr  class="fs-5 fw-semibold text-gray-400">
                                            <td>{{trans('Surveys/service.stories')}}:-</td>
                                            <td style="color:black">{{$service->stories}}</td>
                                         </tr>
                                    </tbody>


                                </table>


                                    <!--end::Text-->
                                    <!--end::Body-->
                                </div>
                                <!--end::Post content-->

                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Layout-->

                    </div>

                    <!--end::Body-->
                </div>
                <!--end::Post card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
 @endsection

@section('js')

    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    @endsection
