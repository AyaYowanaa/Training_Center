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
                    <a href="{{ route('admin.Settings.training_courses.index') }}"
                       class="text-muted text-hover-primary"> {{trans('Toolbar.TrainingCenter')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.Trainer_Courses_Create')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.Settings.training_courses.index')}}"
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
              action="{{route('admin.Settings.training_courses.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{trans('course.mainData')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row row">
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('course.name')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="title_en"
                                       class="form-control mb-2  @error('title_en') is-invalid @enderror"
                                       placeholder="{{trans('course.name')}}" value="{{old('title_en')}}"/>
                                <!--end::Input-->
                                @error('title_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('course.name')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="title_ar"
                                       class="form-control mb-2  @error('title_ar') is-invalid @enderror"
                                       placeholder="{{trans('course.name')}}" value="{{old('title_ar')}}"/>
                                <!--end::Input-->
                                @error('title_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        {{--     <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('course.code')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="code"
                                       class="form-control mb-2  @error('code') is-invalid @enderror"
                                       placeholder="{{trans('course.code')}}" value="{{old('code')}}"/>
                                <!--end::Input-->
                                @error('code')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('course.Duration')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="duration"
                                       class="form-control mb-2  @error('duration') is-invalid @enderror"
                                       placeholder="{{trans('course.duration')}}" value="{{old('duration')}}"/>
                                <!--end::Input-->
                                @error('duration')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-10 fv-row row">
                           
                            <div class="col-md-4">
                                
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('trainingCenter.To_date')}}</label>
                                <input
                                    class="form-control form-control-solid @error('from_date') is-invalid @enderror"
                                    value="" name="from_date"
                                    placeholder="Pick date rage" id="from_date"/>
                                @error('from_date')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                           
                           
                        </div>
                          
                            <div class="col-md-4">
                                
                                    <label
                                        class="required fs-6 fw-semibold mb-2">{{trans('trainingCenter.From_date')}}</label>
                                    <input
                                        class="form-control form-control-solid @error('to_date') is-invalid @enderror"
                                        value="" name="to_date"
                                        placeholder="Pick date rage" id="to_date"/>
                                    @error('to_date')
                                    <div
                                        class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                               
                               
                            </div>
                            
                          
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('course.Capacity')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="capacity"
                                       class="form-control mb-2  @error('capacity') is-invalid @enderror"
                                       placeholder="{{trans('course.capacity')}}"/>
                                <!--end::Input-->
                                @error('capacity')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-10 fv-row row">
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('course.Courses')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>

                                </label>
                                        <!--begin::Select2-->
                                        <select class="form-select mb-2 @error('courses_id') is-invalid @enderror"
                                        onchange="/*set_status()*/"
                                        data-control="select2" data-hide-search="false"
                                    data-placeholder="Select an option" data-allow-clear="true"
                                        id="courses_id" name="courses_id">

                                    <option value=" ">{{trans('maindata.Select')}}</option>
                                    @foreach($courses as $row)
                                    <option value="{{ $row->id }}">{{ $row->name}}</option>
                                @endforeach
                                </select>

                           
                            </div> 

                           
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class=" required form-label">{{trans('dash_site.location')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>
                                </label>
                    
                           
                                <!--begin::Select2-->
                                <select class="form-select mb-2 @error('location_id') is-invalid @enderror"
                                        onchange="/*set_status()*/"
                                        data-control="select2" data-hide-search="false"
                                    data-placeholder="Select an option" data-allow-clear="true"
                                        id="location_id" name="location_id">

                                    <option value=" ">{{trans('maindata.Select')}}</option>
                                    @foreach($location_id as $row)
                                    <option value="{{ $row->id }}">{{ $row->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('course.Fees')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="fee"
                                       class="form-control mb-2  @error('fee') is-invalid @enderror"
                                       placeholder="{{trans('course.fee')}}" value="{{old('fee')}}"/>
                                <!--end::Input-->
                                @error('fee')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                        </div>
                        <div class="mb-10 fv-row row">
                            <div class="col-md-6 english">
                                <!--begin::Label-->
                                <label class="form-label">{{trans('dash_site.details')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>
                                </label>
                                <!--end::Label-->
                            {{--                                        <input type="hidden" id="details_en" name="details_en" >--}}
                            <!--begin::Editor-->
                                <textarea id="details_en" name="details_en"
                                          class="min-h-200px mb-2 @error('details_en') is-invalid @enderror">{{old('details_en')}}</textarea>
                                <!--end::Editor-->
                                @error('details_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 arabic">
                                <!--begin::Label-->
                                <label class="form-label">{{trans('dash_site.details')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>
                                </label>
                                <!--end::Label-->
                            {{--                                        <input type="hidden" id="details_ar" name="details_ar" >--}}
    
                            <!--begin::Editor-->
                                <textarea id="details_ar" name="details_ar"
                                          class="min-h-200px mb-2 @error('details_ar') is-invalid @enderror">{{old('details_ar')}}</textarea>
                                <!--end::Editor-->
                                @error('details_ar')
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

     {!! JsValidator::formRequest('App\Http\Requests\training_center\training_courses\StoreRequest', '#StorForm') !!}
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
    '#details_en'
];
const elements_ar = [
    '#details_ar'
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
                    initckeditor();
                }
            };
        }();
        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTAppaccountSave.init();
        });
    </script>
@endsection

