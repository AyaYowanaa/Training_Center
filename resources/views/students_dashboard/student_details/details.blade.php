@extends('students_dashboard.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('trainingCenter.StudentDetails')}}</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">

                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('student.dashboard') }}" class="text-muted text-hover-primary">
                        {{trans('Toolbar.home')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.Student')}}
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
             
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.StudentDetails')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
  
        <!--end::Actions-->

    </div>
    <!--end::Toolbar container-->
@endsection
@section('content')

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Navbar-->
        <div class="card card-flush mb-9" id="kt_user_profile_panel">

            <!--begin::Body-->
            <div class="card-body ">
                <!--begin::Details-->
                <div class="m-0">
                    <!--begin: Pic-->

                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="d-flex flex-stack flex-wrap align-items-end">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">
                                    {{$one_data->name}} </a>
                                <a href="#" class="" data-bs-toggle="tooltip" data-bs-placement="right"
                                   title="Account is verified">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                         height="24px" viewBox="0 0 24 24">
																		<path
                                                                            d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                                            fill="currentColor"/>
																		<path
                                                                            d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                                            fill="white"/>
																	</svg>
																</span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                            <!--end::Name-->
                            <!--begin::Text-->
                            <span
                                class="fw-bold text-gray-600 fs-6 mb-2 d-block">{{$one_data->phone}}</span>
                            <!--end::Text-->
                            <!--begin::Info-->
                            <div class="d-flex align-items-center flex-wrap fw-semibold fs-7 pe-2">
                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary">{{$one_data->email}}</a>
                                <span class="bullet bullet-dot h-5px w-5px bg-gray-400 mx-3"></span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->

                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                       href="#kt_customer_view_overview_tab">{{trans('trainingCenter.mainData')}}</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                       href="#kt_customer_view_overview_events_and_logs_tab">{{trans('trainingCenter.StudentCourses')}}</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                       href="#attendances">{{trans('trainingCenter.StudentAttendances')}}</a>
                </li>
                <!--end:::Tab item-->
    <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                       href="#invoice">{{trans('trainingCenter.StudentInvoice')}}</a>
                </li>
                <!--end:::Tab item-->

                <!--begin:::Tab item-->
                <li class="nav-item ms-auto">
                    <!--begin::Action menu-->
                    <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                       data-kt-menu-placement="bottom-end">{{trans('forms.action')}}
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-2 me-0">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="currentColor"/>
														</svg>
													</span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--begin::Menu-->
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6"
                        data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-5 my-1">
                               {{--  <a href="{{route('admin.TrainingCenter.Student.edit', $one_data->id)}}"
                                   class="menu-link px-5">{{trans('forms.edite_btn')}}</a> --}}
                            </div>
                            <!--end::Menu item-->
                

                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                            {{--     <a href="{{route('admin.TrainingCenter.Student.destroy', $one_data->id)}}"
                                   class="menu-link text-danger px-5">{{trans('forms.delete_btn')}}</a> --}}
                            </div>
                            <!--end::Menu item-->
                

                    </div>
                    <!--end::Menu-->
                    <!--end::Menu-->
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">

                    <!--begin::details View-->
                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                        <!--begin::Card header-->
                        <div class="card-header cursor-pointer">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">{{trans('trainingCenter.mainData')}}</h3>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--begin::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <!--begin::Row-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label
                                    class="col-lg-4 fw-semibold text-muted">{{trans('trainingCenter.name')}}</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{$one_data->name}}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label
                                    class="col-lg-4 fw-semibold text-muted">{{trans('trainingCenter.email')}}</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <a href="#"
                                       class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{$one_data->email}}</a>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::details View-->

                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bold mb-0">{{trans('trainingCenter.StudentCourses')}}</h2>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            @if((isset($one_data->Courses)&&(!empty($one_data->Courses))))
                                <div class="table-responsive border-bottom mb-9">
                                    <!--begin::Table-->
                                    <table class="table table-striped border rounded gy-5 gs-7  data-table"
                                           id="kt_table_customers_inbody">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                        <!--begin::Table row-->
                                        <tr style="text-align: center" class="text-start text-muted text-uppercase gs-0">
                                            <th style="text-align: center">{{trans('trainingCenter.training_title')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.training_code')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.coursesName')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.locationData')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.from_date')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.to_date')}}</th>

                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        @if($one_data->Courses)
                                            {{--                            {{dd($one_data->inbody)}}--}}
                                            @foreach($one_data->Courses as $course)
                                                <tr>
                                                    <td style="text-align: center">{{$course->title}}</td>
                                                    <td style="text-align: center">{{$course->code}}</td>
                                                    <td style="text-align: center">{{optional($course->coursesData)->name}}</td>
                                                    <td style="text-align: center">{{optional($course->locationData)->title}}</td>
                                                    <td style="text-align: center">{{$course->from_date}}</td>
                                                    <td style="text-align: center">{{$course->to_date}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7"
                                                    style="text-align: center">{{trans('messages.no_data')}}</td>
                                            </tr>
                                        @endif

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>

                                </div>

                            @endif


                        </div>
                        <!--end::Card body-->
                        <div class="row col-12 h-sm-300px h-md-600px h-300px  p-5 ">
                            {{--    AIzaSyB4faQXKyTkD7s0biojP-ci0WaazXciNMA--}}
                            <div id="map"></div>


                        </div>

                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                 <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="attendances" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bold mb-0">{{trans('trainingCenter.StudentAttendances')}}</h2>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            @if((isset($one_data->attendances)&&(!empty($one_data->attendances))))
                                <div class="table-responsive border-bottom mb-9">
                                    <!--begin::Table-->
                                    <table class="table table-striped border rounded gy-5 gs-7  data-table"
                                           id="kt_table_customers_inbody">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                        <!--begin::Table row-->
                                        <tr style="text-align: center"
                                            class="text-start text-muted text-uppercase gs-0">
                                            <th style="text-align: center">{{trans('trainingCenter.training_title')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.training_code')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.date')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.time')}}</th>


                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        @if($one_data->attendances)
                                            {{--                            {{dd($one_data->inbody)}}--}}
                                            @foreach($one_data->attendances as $attendance)
                                                <tr>
                                                    <td style="text-align: center">{{optional($attendance->coursesData)->title}}</td>
                                                    <td style="text-align: center">{{optional($attendance->coursesData)->code}}</td>
                                                    <td style="text-align: center">{{formatDateDayDisplay($attendance->date)}}</td>
                                                    <td style="text-align: center">{{formatTimeForDisplay($attendance->time)}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7"
                                                    style="text-align: center">{{trans('messages.no_data')}}</td>
                                            </tr>
                                        @endif

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>

                                </div>

                            @endif


                        </div>
                        <!--end::Card body-->
                        <div class="row col-12 h-sm-300px h-md-600px h-300px  p-5 ">
                            {{--    AIzaSyB4faQXKyTkD7s0biojP-ci0WaazXciNMA--}}
                            <div id="map"></div>


                        </div>

                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
       <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="invoice" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bold mb-0">{{trans('trainingCenter.StudentInvoice')}}</h2>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            @if((isset($one_data->invoice)&&(!empty($one_data->invoice))))
                                <div class="table-responsive border-bottom mb-9">
                                    <!--begin::Table-->
                                    <table class="table table-striped border rounded gy-5 gs-7  data-table"
                                           id="kt_table_customers_inbody">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                        <!--begin::Table row-->
                                        <tr style="text-align: center"
                                            class="text-start text-muted text-uppercase gs-0">
                                            <th style="text-align: center">{{trans('trainingCenter.training_title')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.training_code')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.amount')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.date')}}</th>
                                            <th style="text-align: center">{{trans('trainingCenter.paymentMethod')}}</th>


                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        @if($one_data->invoice)
                                            {{--                            {{dd($one_data->inbody)}}--}}
                                            @foreach($one_data->invoice as $invoice)
                                                <tr>
                                                    <td style="text-align: center">{{optional($invoice->coursesData)->title}}</td>
                                                    <td style="text-align: center">{{optional($invoice->coursesData)->code}}</td>
                                                    <td style="text-align: center">{{$invoice->amount}}</td>
                                                    <td style="text-align: center">{{formatDateDayDisplay($invoice->date)}}</td>
                                                    <td style="text-align: center">{{optional($invoice->payment)->name}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7"
                                                    style="text-align: center">{{trans('messages.no_data')}}</td>
                                            </tr>
                                        @endif

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>

                                </div>

                            @endif


                        </div>
                        <!--end::Card body-->
                        <div class="row col-12 h-sm-300px h-md-600px h-300px  p-5 ">
                            {{--    AIzaSyB4faQXKyTkD7s0biojP-ci0WaazXciNMA--}}
                            <div id="map"></div>


                        </div>

                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->

            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content container-->

    <!-- Modal --->
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{trans('contactus.details')}}</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" id="load_div">


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">{{trans('forms.close')}}</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>

    <!-- prettier-ignore -->


    <script>
        var editors = {};

        // Class definition
        var KTDatatablesServerSide = function () {

            var handleWebDataRows = function () {

                KTUtil.on(document.body, '[data-kt-table-webData="webData_row"]', 'click', function (e) {
                    var id = e.target.getAttribute('data-id');
                    var action = e.target.getAttribute('data-url');
                    $.ajax({
                        type: 'get',
                        url: action,
                        beforeSend: function () {
                            const loadingEl = document.createElement("div");
                            document.getElementById('kt_modal_1').prepend(loadingEl);
                            loadingEl.classList.add("page-loader");
                            loadingEl.classList.add("flex-column");
                            loadingEl.classList.add("bg-dark");
                            loadingEl.classList.add("bg-opacity-25");
                            loadingEl.innerHTML = `
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-gray-800 fs-6 fw-semibold mt-5">{{trans('forms.Loading')}}</span>`;
                            // Show page loading
                            KTApp.showPageLoading();
                        },

                        success: function (resb) {
                            KTApp.hidePageLoading();
                            // loadingEl.remove();
                            $('#load_div').html(resb);
                            KTImageInput.createInstances();
                            initckeditor();

                            initsaveform();

                        }
                    });
                });
            }


            var initsaveform = () => {
                console.log('StorForm');
                $('#StorForm').on('submit', function (event) {
                    event.preventDefault();
                    var formData = new FormData(this);
                    console.log(editors, editors['description_en'].getData(), editors['description_ar'].getData());
                    formData.append('description[en]', editors['description_en'].getData());
                    formData.append('description[ar]', editors['description_ar'].getData());

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: formData,
                        processData: false, // Important!
                        contentType: false, // Important!
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                        },

                        success: function (response) {
                            $('#response').html('<p>' + response.message + '</p>');

                            Swal.fire({
                                text: response.message,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "{{trans('forms.action_done')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                            $('#kt_modal_1').modal('hide'); // Close the modal on success
                            dt.draw();
                        },
                        error: function (xhr) {
                            $('#response').html('<p>' + xhr.responseText + '</p>');
                            Swal.fire({
                                text: xhr.error,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "{{trans('forms.action_done')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                });
            }
            var initckeditor = () => {

                const elements_en = [
                    '#description_en'
                ];
                const elements_ar = [
                    '#description_ar'
                ];

                // Loop all elements
                elements_en.forEach((element, index) => {

                    // Get quill element
                    let ckeditor = document.querySelector(element);

                    // Break if element not found
                    if (!ckeditor) {
                        return;
                    }

                    // Init quill --- more info: https://quilljs.com/docs/quickstart/
                    ClassicEditor
                        .create(ckeditor, {
                            toolbar: {
                                items: [
                                    'undo', 'redo',
                                    '|', 'heading',
                                    '|', 'bold', 'italic',
                                    '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                                ]
                            }, heading: {
                                options: [
                                    {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                                    {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                                    {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                                    {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                                    {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                                    {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'}
                                ]
                            }, language: 'en'
                        })
                        .then(editor => {
                            editors[ckeditor.id] = editor;
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });


                });
                // Loop all elements
                elements_ar.forEach((element, index) => {
                    // Get quill element
                    let ckeditor = document.querySelector(element);

                    // Break if element not found
                    if (!ckeditor) {
                        return;
                    }

                    // Init quill --- more info: https://quilljs.com/docs/quickstart/
                    ClassicEditor
                        .create(ckeditor, {
                            toolbar: {
                                items: [
                                    'undo', 'redo',
                                    '|', 'heading',
                                    '|', 'bold', 'italic',
                                    '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                                ]
                            }, heading: {
                                options: [
                                    {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                                    {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                                    {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                                    {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                                    {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                                    {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                                ]
                            }, language: 'ar'
                        })
                        .then(editor => {
                            editors[ckeditor.id] = editor;

                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });


                });

            };

            // Public methods
            return {
                init: function () {
                    handleWebDataRows();
                }
            }
        }();
        // On document ready
        KTUtil.onDOMContentLoaded(function () {

            KTDatatablesServerSide.init();

        });
    </script>
@endsection
