@extends('dashbord.layouts.master')

@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('diploma.create')}}</h1>
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
                    {{trans('Toolbar.Create_Diploma')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.TrainingCenter.Diploma.index')}}"
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
              action="{{route('admin.TrainingCenter.Diploma.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{trans('diploma.mainData')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row row">
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('diploma.name')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name_en"
                                       class="form-control mb-2  @error('name_en') is-invalid @enderror"
                                       placeholder="{{trans('diploma.name')}}" value="{{old('name_en')}}"/>
                                <!--end::Input-->
                                @error('name_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('diploma.name')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name_ar"
                                       class="form-control mb-2  @error('name_ar') is-invalid @enderror"
                                       placeholder="{{trans('diploma.name')}}" value="{{old('name_ar')}}"/>
                                <!--end::Input-->
                                @error('name_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                         <div class="col-md-4">
                            <label class="form-label">{{ trans('diploma.levels') }}</label>
                            <input type="text" name="levels"
                                class="form-control mb-2 @error('levels') is-invalid @enderror"
                                value="{{ old('levels') }}" placeholder="{{ trans('diploma.levels') }}">
                            @error('levels')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                            </div>

                      
                     

                        <div class="mb-10 fv-row row">
                          
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('diploma.Total_price')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="total_price"
                                       class="form-control mb-2  @error('total_price') is-invalid @enderror"
                                       placeholder="{{trans('diploma.total_price')}}" value="{{old('total_price')}}"/>
                                <!--end::Input-->
                                @error('total_price')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">{{trans('diploma.status')}}
                                </label>

                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select class="form-select mb-2"
                                        onchange="/*set_status()*/"
                                        data-control="select2" data-hide-search="true"
                                        data-placeholder="Select an option"
                                        id="status" name="status">
                                   <option value="active"> {{trans('diploma.active')}}</option>
                                    <option value="inactive">  {{trans('diploma.inactive')}}</option>
                                </select>
                          
                            </div>


                        </div>
                        <div class="mb-10 fv-row row">
                            <div class="col-md-6 english">
                                <!--begin::Label-->
                                <label class="form-label">{{trans('diploma.description')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>
                                </label>
                               
                                <textarea id="description_en" name="description_en"
                                          class="min-h-200px mb-2 @error('description_en') is-invalid @enderror">{{old('description_en')}}</textarea>
                                <!--end::Editor-->
                                @error('description_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 arabic">
                                <!--begin::Label-->
                                <label class="form-label">{{trans('diploma.description')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>
                                </label>
                                <!--end::Label-->
                                {{--                                        <input type="hidden" id="description_ar" name="description_ar" >--}}

                                <!--begin::Editor-->
                                <textarea id="description_ar" name="description_ar"
                                          class="min-h-200px mb-2 @error('description_ar') is-invalid @enderror">{{old('description_ar')}}</textarea>
                                <!--end::Editor-->
                                @error('description_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>

                    </div>
                    <!--end::Card header-->
                </div>
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
    <!--begin::Vendors Javascript(used for this page only)-->


    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\training_center\Diploma\StoreRequest', '#StorForm') !!}

<script>
        var KTAppaccountSave = function () {

            const initDaterangepicker_1 = () => {

                $("#to_date").daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true,
                        minYear: 2025,
                        maxYear: parseInt(moment().format("YYYY"), 12)
                    }
                );
            }
            const initDaterangepicker_2 = () => {

                $("#from_date").daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true,
                        minYear: 2025,
                        maxYear: parseInt(moment().format("YYYY"), 12)
                    }
                );
            }
            const initckeditor = () => {

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
                                    '|', 'link', 'insertTable', 'mediaEmbed', 'blockQuote',
                                    '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                                ]
                            }, heading: {
                                options: [
                                    {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                                    {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                                    {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                                    {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'}
                                ]
                            }, language: 'en'
                        })
                        .then(editor => {
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
                                    '|', 'link', 'insertTable', 'mediaEmbed', 'blockQuote',
                                    '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                                ]
                            }, heading: {
                                options: [
                                    {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                                    {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                                    {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                                    {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'}
                                ]
                            }, language: 'ar'
                        })
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });


                });

            }


            // Public methods
            return {
                init: function () {
                    // Init forms
                    initDaterangepicker_1();
                    initDaterangepicker_2();
                    set_status();
                    initckeditor();
                }
            };
        }();
        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTAppaccountSave.init();
        });
    </script>
     <script>
        function set_status() {
            var status = $('#kt_ecommerce_add_category_status');
            var status_val = $('#status').val();
            if (status_val == 0) {
                status.removeClass('bg-success').addClass('bg-danger');
            } else if (status_val == 1) {
                status.removeClass('bg-danger').addClass('bg-success');
            }
        }
    </script>
@endsection

