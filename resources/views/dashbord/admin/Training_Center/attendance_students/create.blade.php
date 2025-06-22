@extends('dashbord.layouts.master')

@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('trainingCenter.create')}}</h1>
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
                    {{trans('Toolbar.AttendanceStudents')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
{{--
                <a href="{{route('admin.TrainingCenter.AttendanceStudents.index')}}"
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
--}}
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
              action="{{route('admin.TrainingCenter.AttendanceStudents.store')}}" method="post"
              enctype="multipart/form-data">
            @csrf

            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{trans('trainingCenter.mainData')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->


                        <div class="mb-10 fv-row row">


                            <div class="col-md-4">
                                <label class="form-label">{{trans('trainingCenter.Courses')}}</label>

                                <!--begin::Select2-->
                                <select class="form-select mb-2 @error('course_id') is-invalid @enderror"
                                        data-control="select2" data-hide-search="false"
                                        data-placeholder="Select an option" data-allow-clear="true"
                                        id="course_id" name="course_id">

                                    {{--                                    <option value=" ">{{trans('maindata.Select')}}</option>--}}
                                    {{-- @foreach($courses as $row)
                                         <option value="{{ $row->id }}">{{ $row->title}}</option>
                                     @endforeach--}}
                                </select>
                                <!--end::Select2-->
                                @error('course_id')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">{{trans('trainingCenter.Entity')}}</label>

                                <!--begin::Select2-->
                                <select class="form-select mb-2 @error('entity_id') is-invalid @enderror"
                                        onchange="/*set_status()*/"
                                        data-control="select2" data-hide-search="false"
                                        data-placeholder="Select an option" data-allow-clear="true"
                                        id="entity_id" name="entity_id">

                                    {{--                                    <option value=" ">{{trans('maindata.Select')}}</option>--}}
                                    {{--@foreach($trainers as $row)
                                        <option value="{{ $row->id }}">{{ $row->name}}</option>
                                    @endforeach--}}
                                </select>
                                <!--end::Select2-->

                                @error('entity_id')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div class="mb-10 fv-row row">
                            <div class="col-md-4">
                                <button class="btn btn-sm btn-icon btn-success btn-add-all-student" >{{trans('trainingCenter.AttendanceAll')}} </button>
                            </div>
                        </div>
                        <div class="mb-10 fv-row row">
                            <div class="col" id="kt_block_ui">
                                <div class="table-responsive">

                                    <table class="table align-middle table-row-dashed fs-6 gy-3"
                                           id="data">
                                        <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800">
                                            <th>{{trans('trainingCenter.NameStudent')}}</th>
                                            <th>{{trans('trainingCenter.code')}}</th>
                                            <th>{{trans('trainingCenter.entity')}}</th>
                                            <th>{{trans('forms.Action')}}</th>
                                        </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                            <div class="col" id="kt_block_ui2">
                                <div class="table-responsive">
                                    <table
                                        class="table align-middle table-row-dashed fs-6 gy-3 {{ $errors->has('student_id') ? 'is-invalid' : '' }}"
                                        id="tableStudent">
                                        <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800">
                                            <th>{{trans('trainingCenter.NameStudent')}}</th>
                                            <th>{{trans('trainingCenter.code')}}</th>
                                            <th>{{trans('trainingCenter.entity')}}</th>
                                            <th>{{trans('forms.Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="4">  @error('student_id')
                                                <div
                                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                                @enderror</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>


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
    {!! JsValidator::formRequest('App\Http\Requests\training_center\AttendanceStudents\StoreAttendanceStudentsRequest','#StorForm'); !!}
    <script>
        var KTAppaccountSave = function () {
            var table;
            var dt;
            var tableS;
            var dtS;
            var target = document.querySelector("#kt_block_ui");

            var blockUI = new KTBlockUI(target, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> {{trans('forms.Loading')}}...</div>',
            });    var target2 = document.querySelector("#kt_block_ui2");

            var blockUI2 = new KTBlockUI(target2, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> {{trans('forms.Loading')}}...</div>',
            });
            // Private functions
            var initDatatable = function () {
                dt = $('#data').DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    ajax: {
                        url: "{{route('admin.TrainingCenter.AttendanceStudents.getStudent')}}",
                        data: function (d) {
                            d.entity_id = $('#entity_id').val();
                            d.course_id = $('#course_id').val();
                        }
                    },
                    columns: [
                        {data: 'name', name: 'name', orderable: false},
                        {data: 'code', name: 'code', orderable: false},
                        {data: 'entity', name: 'entity', orderable: false},
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']],

                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function () {
                    KTMenu.createInstances();
                });
            }
            var initDatatableStudent = function () {
                dtS = $('#tableStudent').DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    ajax: {
                        url: "{{route('admin.TrainingCenter.AttendanceStudents.getCourseStudent')}}",
                        data: function (d) {
                            d.entity_id = $('#entity_id').val();
                            d.course_id = $('#course_id').val();
                        }
                    },
                    {{--                    ajax: "{{route('admin.TrainingCenter.AttendanceStudents.getStudent')}}",--}}
                    columns: [
                        {data: 'name', name: 'name', orderable: false},
                        {data: 'code', name: 'code', orderable: false},
                        {data: 'entity', name: 'entity', orderable: false},
                        {data: 'action', name: 'action', orderable: false},
                    ],

                });

                tableS = dtS.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dtS.on('draw', function () {
                    KTMenu.createInstances();
                });
            }

            var initAddStudent = function () {
                KTUtil.on(document.body, '.btn-add-student', 'click', function (e) {

                    // $(document).on('click', '.btn-add-student', function (e) {
                    e.preventDefault();

                    var courseId = $('#course_id').val();
                    // var entityId = $('#entity_id').val();
                    var studentId = $(this).data('student_id');
                    var entityId = $(this).data('entity_id');
                    var studentName = $(this).data('name');
                    var studentCode = $(this).data('code');
                    var studentPhone = $(this).data('phone');

                    // تحقق من التكرار
                    if ($('#tableStudent input[value="' + studentId + '"]').length > 0) {
                        // alert('.');
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toastr-top-center",
                            "preventDuplicates": false,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };

                        toastr.warning("", "{{trans('trainingCenter.This student is already added')}} ");
                        return;
                    }

                    /*var newRow = `
            <tr>
                <td>${studentName}
                    <input type="hidden" name="student_ids[]" value="${studentId}">
                </td>
                <td>${studentCode}</td>
                <td>${studentPhone}</td>
                <td><button type="button" class="btn btn-danger btn-sm btn-remove-student" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="{{trans('forms.delete')}}">
                <i class="ki-duotone ki-trash-square fs-1 ">
 <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></button></td>
            </tr>
        `;
                    $('#tableStudent tbody').append(newRow);
                */
                    $.ajax({
                        url: '{{route('admin.TrainingCenter.AttendanceStudents.store')}}',
                        method: 'POST',
                        data: {
                            course_id: courseId,
                            entity_id: entityId,
                            student_id: studentId
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                        },
                        beforeSend: function () {
                            blockUI.block();

                        },
                        success: function (response) {
                            blockUI.release();
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toastr-top-center",
                                "preventDuplicates": false,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };

                            toastr.success("", "{{trans('forms.success')}}");
                            dt.draw();
                            dtS.draw();
                        },
                        error: function (xhr) {
                            blockUI.release();

                            if (xhr.status === 422) { // Laravel validation error

                                var errors = xhr.responseJSON.errors;
                                // Iterate over the errors and add error feedback to corresponding fields
                                $.each(errors, function (field, messages) {

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


                });


            }
            var initAddAllStudent = function () {
                KTUtil.on(document.body, '.btn-add-all-student', 'click', function (e) {

                    e.preventDefault();

                    var courseId = $('#course_id').val();
                    var entityId = $(this).data('entity_id');

                    $.ajax({
                        url: '{{route('admin.TrainingCenter.AttendanceStudents.storeAll')}}',
                        method: 'POST',
                        data: {
                            course_id: courseId,
                            entity_id: entityId
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                        },
                        beforeSend: function () {
                            blockUI.block();

                        },
                        success: function (response) {
                            blockUI.release();
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toastr-top-center",
                                "preventDuplicates": false,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };

                            toastr.success("", "{{trans('forms.success')}}");
                            dt.draw();
                            dtS.draw();
                        },
                        error: function (xhr) {
                            blockUI.release();

                            if (xhr.status === 422) { // Laravel validation error

                                var errors = xhr.responseJSON.errors;
                                // Iterate over the errors and add error feedback to corresponding fields
                                $.each(errors, function (field, messages) {

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


                });


            }
            var initRemoveStudent = function () {
                KTUtil.on(document.body, '.btn-remove-student', 'click', function (e) {
                    e.preventDefault();
                    // $(this).closest('tr').remove();
                    var Id = $(this).data('id');

                    $.ajax({
                        url: '{{route('admin.TrainingCenter.AttendanceStudents.deleteStudent')}}',
                        method: 'delete',
                        data: {
                            id: Id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                        },
                        beforeSend: function () {
                            blockUI2.block();

                        },
                        success: function (response) {
                            blockUI2.release();
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toastr-top-center",
                                "preventDuplicates": false,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };
                            toastr.success("", "{{trans('forms.Delete')}}");
                            dt.draw();
                            dtS.draw();
                        },
                        error: function (xhr) {
                            blockUI2.release();

                            if (xhr.status === 422) { // Laravel validation error

                                var errors = xhr.responseJSON.errors;
                                // Iterate over the errors and add error feedback to corresponding fields
                                $.each(errors, function (field, messages) {

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


                });
            }
            var initSelectCource = function () {
                $('#course_id').select2({
                    ajax: {
                        url: '{{ route('admin.TrainingCenter.getTrainingCourse') }}',
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
                                return {id: item.id, text: item.name};
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

                $('#search-input').on('keyup', function () {
                    $('#select2-dropdown').empty().trigger('change');
                });
            }
            var initSelectEntity = function () {
                $('#entity_id').select2({
                    ajax: {
                        url: '{{ route('admin.TrainingCenter.getEntity') }}',
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
                                return {id: item.id, text: item.title};
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

                $('#search-input').on('keyup', function () {
                    $('#select2-dropdown').empty().trigger('change');
                });
            }
            const changeCourseSelect = () => {
                $('#course_id').on('change', function () {
                    dt.draw();
                    dtS.draw();
                });
            };  const changeEntitySelect = () => {
                $('#entity_id').on('change', function () {
                    dt.draw();
                    dtS.draw();
                });
            };
            // Public methods
            return {
                init: function () {
                    initSelectCource();
                    initSelectEntity();
                    initDatatable();
                    initRemoveStudent();
                    initAddStudent();
                    initDatatableStudent();
                    changeCourseSelect();
                    changeEntitySelect();
                    initAddAllStudent();
                }
            };
        }();
        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTAppaccountSave.init();
        });
    </script>
@endsection

