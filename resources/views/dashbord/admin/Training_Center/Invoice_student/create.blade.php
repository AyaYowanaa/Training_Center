@extends('dashbord.layouts.master')

@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('Invoice.create')}}</h1>
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
                    {{trans('Toolbar.Add_Invoices')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.TrainingCenter.Invoice.index')}}"
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

    <div id="kt_app_content_container" class="app-container container-xxxl">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="StorForm" class="form d-flex flex-column flex-lg-row "
              action="{{route('admin.TrainingCenter.Invoice.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{trans('Invoice.mainData')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->

                        <div class="mb-10 fv-row row">

                            <div class="col-md-4">

                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('Invoice.Date')}}</label>
                                <input
                                    class="form-control form-control-solid @error('date') is-invalid @enderror"
                                    value="" name="date"
                                    placeholder="Pick date range" id="date"/>
                                @error('date')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror


                            </div>

                            <div class="col-md-4">
                                <label class="form-label">{{trans('Invoice.Student')}}</label>
                                <select name="student_id" class="form-select mb-2" data-control="select2"
                                        data-hide-search="false"
                                        data-placeholder="Select an option" data-allow-clear="true"
                                        id="studentSelect">
                                    {{-- <option value="">-- اختر طالب --</option>
                                     @foreach($students as $student)
                                         <option value="{{ $student->id }}">{{ $student->name }}</option>
                                     @endforeach--}}
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{trans('Invoice.Courses')}}</label>

                                <!--begin::Select2-->
                                <select class="form-select mb-2 @error('course_id') is-invalid @enderror"
                                        data-control="select2" data-hide-search="false"
                                        data-placeholder="Select an option" data-allow-clear="true"
                                        id="courseSelect" name="course_id">

                                    {{--  <option value=" ">{{trans('maindata.Select')}}</option>
                                     @foreach($courses as $row)
                                     <option value="{{ $row->id }}">{{ $row->title}}</option>
                                 @endforeach--}}
                                    {{--                                <option value="">اختر طالب أولاً</option>--}}
                                </select>
                                <!--end::Select2-->
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <label class="form-label">{{trans('Invoice.invoice_type')}}</label>
                                <select class="form-select mb-2 @error('invoice_type') is-invalid @enderror"
                                        data-control="select2" data-hide-search="false"
                                        data-placeholder="Select an option" data-allow-clear="true"
                                        id="invoice_type" name="invoice_type">

                                    <option value="">{{ __('forms.Select') }}</option>
                                    <option
                                        value="completed" {{ old('invoice_type') == 'completed' ? 'selected' : '' }}>{{ __('Invoice.Completed') }}</option>
                                    <option
                                        value="credit" {{ old('invoice_type') == 'credit' ? 'selected' : '' }}>{{ __('Invoice.credit') }}</option>
                                </select>

                                @error('invoice_type')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('Invoice.TotalAmount')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="balance" id="balance" readonly
                                       class="form-control mb-2  @error('balance') is-invalid @enderror"
                                       placeholder="{{trans('Invoice.TotalAmount')}}"
                                       value="{{old('balance')}}"/>
                                <!--end::Input-->
                                @error('balance')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('Invoice.Amount')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="amount" id="amount"
                                       class="form-control mb-2  @error('amount') is-invalid @enderror"
                                       placeholder="{{trans('Invoice.Amount')}}" value="{{old('amount')}}"/>
                                <!--end::Input-->
                                @error('amount')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{trans('Invoice.payment_method')}}</label>
                                <select name="payment_method" class="form-select mb-2" data-control="select2"
                                        data-hide-search="false"
                                        data-placeholder="Select an option" data-allow-clear="true"
                                        id="paymentSelect">

                                </select>
                            </div>

                        </div>

                    </div>

                </div>
                <!--end::Card header-->

                <!--end::General options-->


                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <button type="reset" class="btn btn-light me-5">{{trans('forms.cancel_btn')}}</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="" class="btn btn-primary">
                        <span class="indicator-label">{{trans('forms.save_btn')}}</span>
                        <span class="indicator-progress">Please wait...
													<span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Main column-->
        </form>
    </div>

@endsection
@section('js')

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
     {!! JsValidator::formRequest('App\Http\Requests\training_center\Invoices\StoreRequest','#StorForm'); !!}

    <script>
        var KTAppaccountSave = function () {
            var remain = 0;
            const initDaterangepicker = () => {
                $("#date").daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 2025,
                    maxYear: parseInt(moment().format("YYYY"), 12)
                });
            };
            const changeAmount = () => {
                $('#amount').on('change', function () {
                    var invoice_type=$('#invoice_type').val();
                    if (invoice_type==='credit') {
                        if (this.value > remain) {
                            Swal.fire({
                                text: '{{trans('Invoice.outRangeAmount')}}',
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "{{trans('forms.error_occurred')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                            this.value = remain;
                        }
                    }else {
                        if (this.value != remain) {
                            Swal.fire({
                                text: '{{trans('Invoice.AmountMustEqualBalance')}}',
                                icon: "warning",
                                buttonsStyling: false,
                                confirmButtonText: "{{trans('forms.done')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-warning",
                                }
                            });
                            this.value = remain;
                        }                    }
                });
            };
            const changeStudentSelect = () => {
                $('#studentSelect').on('change', function () {
                    $('#courseSelect').val(null).trigger('change');
                    $('#balance').val(0);
                });
            };
            const changeCourseSelect = () => {
                $('#courseSelect').on('change', function () {
                    var course = $('#courseSelect').val();
                    var student = $('#studentSelect').val();
                    if (course && student) {
                        $.ajax({
                            url: '{{route('admin.TrainingCenter.Invoice.getStudentFees')}}',
                            method: 'POST',
                            data: {course_id: course, student_id: student},
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                            },
                            success: function (response) {
                                remain = response.remain;
                                $('#balance').val(remain);


                            },
                            error: function (xhr) {
                                // blockUI.release();

                                if (xhr.status === 422) { // Laravel validation error

                                    var errors = xhr.responseJSON.errors;
                                    // Iterate over the errors and add error feedback to corresponding fields
                                    $.each(errors, function (field, messages) {
                                        // Find the input (or select) by its name attribute
                                        var $input = $('[name="' + field + '"]');
                                        // Add the is-invalid class
                                        $input.addClass('is-invalid');
                                        // Create an error message container
                                        var $error = $('<div class="invalid-feedback"></div>').text(messages[0]);
                                        // Append the error after the input element (or its parent, depending on your markup)
                                        $input.after($error);
                                    });
                                } else {
                                    // Handle other errors
                                    toastr.error('An error occurred. Please try again.');
                                    Swal.fire({
                                        text: xhr.error,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "{{trans('forms.error_occurred')}}",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    });
                                }
                            }
                        });
                    }
                });
            };
            const initStudentCourseSelect = () => {
                $('#courseSelect').select2({
                    ajax: {
                        url: '{{ route('admin.TrainingCenter.getTrainingCourseStudent') }}',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                search: params.term,// search term
                                page: params.page || 1,
                                student_id: $('#studentSelect').val()
                            };
                        }, processResults: function (data, params) {
                            params.page = params.page || 1;
                            var mappedData = $.map(data.data, function (item) {
                                return {id: item.id, text: item.text};
                            });
                            return {
                                results: mappedData,
                                pagination: {
                                    more: (params.page * 10) < data.total
                                }

                            };
                        },
                        cache: true
                    },
                    placeholder: 'اختر طالب أولاً',
                    minimumInputLength: 0
                });


            };
            const initStudentSelect = () => {
                $('#studentSelect').select2({
                    ajax: {
                        url: '{{ route('admin.TrainingCenter.getStudent') }}',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                search: params.term,// search term
                                page: params.page || 1
                            };
                        }, processResults: function (data, params) {
                            params.page = params.page || 1;
                            var mappedData = $.map(data.data, function (item) {
                                return {id: item.id, text: item.text};
                            });
                            return {
                                results: mappedData,
                                pagination: {
                                    more: (params.page * 10) < data.total
                                }

                            };
                        },
                        cache: true
                    },
                    placeholder: 'Select an option',
                    minimumInputLength: 0
                });
            };const initPaymentSelect = () => {
                $('#paymentSelect').select2({
                    ajax: {
                        url: '{{ route('admin.TrainingCenter.getPayment') }}',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                search: params.term,// search term
                                page: params.page || 1
                            };
                        }, processResults: function (data, params) {
                            params.page = params.page || 1;
                            var mappedData = $.map(data.data, function (item) {
                                return {id: item.id, text: item.text};
                            });
                            return {
                                results: mappedData,
                                pagination: {
                                    more: (params.page * 10) < data.total
                                }

                            };
                        },
                        cache: true
                    },
                    placeholder: 'Select an option',
                    minimumInputLength: 0
                });
            };

            return {
                init: function () {
                    initDaterangepicker();
                    initStudentCourseSelect(); // ← هنا بنشغله أول ما الصفحة تجهز
                    changeStudentSelect();
                    initStudentSelect();
                    initPaymentSelect();
                    changeCourseSelect();
                    changeAmount();
                }
            };
        }();

        KTUtil.onDOMContentLoaded(function () {
            KTAppaccountSave.init();
        });
    </script>

@endsection

