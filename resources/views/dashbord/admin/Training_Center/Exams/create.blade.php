@extends('dashbord.layouts.master')

@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('trainingCenter.Exams')}}</h1>
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
                    {{trans('Toolbar.Create_Exams')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.TrainingCenter.Exams.index')}}"
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
              action="{{route('admin.TrainingCenter.Exams.store')}}" method="post" enctype="multipart/form-data">
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
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.Name')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name"
                                       class="form-control mb-2  @error('name') is-invalid @enderror"
                                       placeholder="{{trans('trainingCenter.Name')}}" value="{{old('name')}}"/>
                                <!--end::Input-->
                                @error('name')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.Date')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="date" id="date"
                                       class="form-control mb-2  @error('date') is-invalid @enderror"
                                       placeholder="{{trans('trainingCenter.date')}}" value="{{old('date')}}"/>
                                <!--end::Input-->
                                @error('date')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.Duration(minutes)')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="duration"
                                       class="form-control mb-2  @error('duration') is-invalid @enderror"
                                       placeholder="{{trans('trainingCenter.duration')}}" value="{{old('duration')}}"/>
                                <!--end::Input-->
                                @error('duration')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">{{trans('trainingCenter.Course')}}</label>
                            <select class="form-select mb-2 @error('course_id') is-invalid @enderror"
                                    onchange=""
                                    data-control="select2" data-hide-search="false"
                                    data-placeholder="Select an option" data-allow-clear="true"
                                    id="course_id" name="course_id">

                                <option value=" ">{{trans('maindata.Select')}}</option>
                            </select>
                        </div> 
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.Full_Mark]')}}

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="full_mark"
                                       class="form-control mb-2  @error('full_mark') is-invalid @enderror"
                                       placeholder="" value="" min="0"/>
                                <!--end::Input-->
                                @error('full_mark')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.Pass_Mark]')}}

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="pass_mark"
                                       class="form-control mb-2  @error('pass_mark') is-invalid @enderror"
                                       placeholder="" value="" min="0"/>
                                <!--end::Input-->
                                @error('pass_mark')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
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
     {!! JsValidator::formRequest('App\Http\Requests\training_center\Exams\StoreRequest','#StorForm'); !!}
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
     

            return {
                init: function () {
                    initDaterangepicker();
                    initSelectCource();
                }
            };
        }();

        KTUtil.onDOMContentLoaded(function () {
            KTAppaccountSave.init();
        });
    </script>


@endsection

