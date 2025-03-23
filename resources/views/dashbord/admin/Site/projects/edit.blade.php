@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('project.update')}}</h1>
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
                       class="text-muted text-hover-primary"> {{trans('Toolbar.project')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.projectCreate')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
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

    <!--begin::Content container-->
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
              action="{{route('admin.projects.update',$one_data->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH"/>

            <input type="hidden" name="id" value="{{$one_data->id}}">
            <!--begin::Aside column-->
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!--begin::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{trans('project.main_image')}}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <!--begin::Image input placeholder-->
                        <style>.image-input-placeholder {
                                background-image: url('{{$one_data->eventImage}}');
                            }

                            [data-bs-theme="dark"] .image-input-placeholder {
                                background-image: url('{{$one_data->eventImage}}');
                            }</style>
                        <!--end::Image input placeholder-->
                        <div class="mb-7">
                            <!--begin::Image input-->
                            <div
                                class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="main_image" accept=".png, .jpg, .jpeg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    title="Cancel avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    title="Remove avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                                <!--end::Remove-->
                            </div>

                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg
                                and
                                *.jpeg image files are accepted
                            </div>
                            <!--end::Description-->
                        </div>

                        @error('main_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{trans('project.time_data')}}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
                        <div class="row g-9 mb-7">
                         {{--    <!--begin::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('project.date_at')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-solid @error('date_at') is-invalid @enderror"
                                    value="{{old('date_at',$one_data->date_at)}}" name="date_at"
                                    placeholder="Pick date rage" id="date_at"/>
                                <!--end::Input-->
                                @error('date_at')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                           <!--begin::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('project.from_time')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time"
                                       class="form-control form-control-solid @error('from_time') is-invalid @enderror"
                                       value="{{old('from_time',$one_data->from_time)}}" name="from_time"
                                       placeholder="Pick date rage" id="from_time"/>
                                <!--end::Input-->
                                @error('from_time')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('project.to_time')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time"
                                       class="form-control form-control-solid @error('to_time') is-invalid @enderror"
                                       value="{{old('to_time',$one_data->to_time)}}" name="to_time"
                                       placeholder="Pick date rage" id="to_time"/>
                                <!--end::Input-->
                                @error('to_time')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('project.publisher')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-solid @error('publisher') is-invalid @enderror"
                                    placeholder=""
                                    name="publisher" value="{{old('publisher',$one_data->publisher)}}">
                                <!--end::Input-->
                                @error('publisher')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
--}}
                            <div>
                                <div class="mb-10 fv-row col">
                                    <label
                                        class="required fs-6 fw-semibold mb-2">{{trans('project.city')}}
                                    </label>
                                    <select class="form-select mb-2 @error('city_id') is-invalid @enderror"
                                            onchange=""
                                            data-control="select2" data-hide-search="false"
                                            data-placeholder="Select an option"
                                            id="city_id" name="city_id">

                                        @foreach($cities as $city)
                                            <option
                                                value="{{ $city->id }}" @if($city->id==$one_data->city_id) {{'selected'}} @endif >{{ $city->city_name }}
                                            </option>
                                        @endforeach


                                    </select>
                                    <!--end::Select2-->
                                    @error('governorate')
                                    <div
                                        class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div class="mb-10 fv-row col">
                                    <label
                                        class="required fs-6 fw-semibold mb-2">{{trans('project.district')}}
                                    </label>
                                    <select class="form-select mb-2 @error('$district->id') is-invalid @enderror"
                                            onchange=""
                                            data-control="select2" data-hide-search="false"
                                            data-placeholder="Select an option"
                                            id="district_id" name="district_id">


                                        @foreach($districts as $district)
                                            <option
                                                value="{{ $district->id }}" @if($district->id==$one_data->district_id) {{'selected'}} @endif>{{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!--end::Select2-->
                                    @error('district_id')
                                    <div
                                        class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{trans('project.mainData')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{trans('project.title')}}
                                <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>

                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="title_en"
                                   class="form-control mb-2  @error('title_en') is-invalid @enderror"
                                   placeholder="Product name"
                                   value="{{old('title_en',$one_data->title_en)}}"/>
                            <!--end::Input-->
                            @error('title_en')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{trans('project.details')}}
                                <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>
                            </label>
                            <!--end::Label-->
                        {{--                                        <input type="hidden" id="details_en" name="details_en" value="{{old('details_en',$one_data->details_en)}}" >--}}
                        <!--begin::Editor-->
                            <textarea id="details_en" name="details_en"
                                      class="min-h-200px mb-2 @error('details_en') is-invalid @enderror">
                                            {{old('details_en',$one_data->details_en)}} </textarea>
                            <!--end::Editor-->
                            @error('details_en')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{trans('project.features')}}
                                <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>
                            </label>
                            <!--end::Label-->
                        {{--                                        <input type="hidden" id="features_en" name="features_en" value="{{old('features_en',$one_data->features_en)}}" >--}}
                        <!--begin::Editor-->
                            <textarea id="features_en" name="features_en"
                                      class="min-h-200px mb-2 @error('features_en') is-invalid @enderror">
                                            {{old('features_en',$one_data->features_en)}} </textarea>
                            <!--end::Editor-->
                            @error('features_en')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{trans('project.title')}}
                                <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>

                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="title_ar"
                                   class="form-control mb-2  @error('title_ar') is-invalid @enderror"
                                   placeholder="Product name"
                                   value="{{old('title_ar',$one_data->title_ar)}}"/>
                            <!--end::Input-->
                            @error('title_ar')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{trans('project.details')}}
                                <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>
                            </label>
                            <!--end::Label-->
                        {{--                                        <input type="hidden" id="details_ar" name="details_ar" value="{{old('details_ar',$one_data->details_ar)}}" >--}}

                        <!--begin::Editor-->
                            <textarea id="details_ar" name="details_ar"
                                      class="min-h-200px mb-2 @error('details_ar') is-invalid @enderror">
                                            {{old('details_ar',$one_data->details_ar)}}

                                        </textarea>
                            <!--end::Editor-->
                            @error('details_ar')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->
   <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{trans('project.features')}}
                                <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>
                            </label>
                            <!--end::Label-->
                        {{--                                        <input type="hidden" id="features_ar" name="features_ar" value="{{old('features_ar',$one_data->features_ar)}}" >--}}

                        <!--begin::Editor-->
                            <textarea id="features_ar" name="features_ar"
                                      class="min-h-200px mb-2 @error('features_ar') is-invalid @enderror">
                                            {{old('features_ar',$one_data->features_ar)}}

                                        </textarea>
                            <!--end::Editor-->
                            @error('features_ar')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class=" required form-label">{{trans('project.location')}}
                                <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>
                            </label>
                            <!--end::Label-->
                        {{--                                        <input type="hidden" id="details_ar" name="details_ar" >--}}

                        <!--begin::Editor-->
                            <input type="text" id="location_ar" name="location_ar"
                                   class="form-control mb-2 @error('location_ar') is-invalid @enderror"
                                   value="{{old('location_ar',$one_data->location_ar)}}"/>
                            <!--end::Editor-->
                            @error('location_ar')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{trans('project.location')}}
                                <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>
                            </label>
                            <!--end::Label-->
                        {{--                                        <input type="hidden" id="details_ar" name="details_ar" >--}}

                        <!--begin::Editor-->
                            <input type="text" id="location_en" name="location_en"
                                   class="form-control mb-2 @error('location_en') is-invalid @enderror"
                                   value="{{old('location_en',$one_data->location_en)}}">
                            <!--end::Editor-->
                            @error('location_en')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{trans('project.location_map')}}
                            </label>
                            <!--end::Label-->

                            <!--begin::Editor-->
                            <textarea id="location_map" name="location_map"
                                      class="form-control mb-2 @error('location_map') is-invalid @enderror">{{old('location_map',$one_data->location_map)}}</textarea>
                            <!--end::Editor-->
                            @error('location_map')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->


                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::General options-->
                <!--begin::Meta options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{trans('project.images')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label">{{trans('project.images')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" multiple
                                   class="form-control mb-2  @error('images') is-invalid @enderror"
                                   name="images[]"
                                   accept=".png, .jpg, .jpeg" placeholder="Meta tag name"/>
                            <!--end::Input-->
                            @error('images')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <div class="row ">

                            @if(isset($one_data->imgaes)&&(!empty($one_data->imgaes)))
                                @foreach($one_data->imgaes as $image)
                                    <div class="col-3">
                                        <div class="card shadow-sm">

                                            <div class="card-body">
                                                <div class="card-toolbar">
                                                    <a href="{{route('admin.project.destroy_image',$image->imageId)}}"
                                                       class="btn btn-icon btn-sm btn-active-color-primary"
                                                       data-kt-card-action="remove"
                                                       data-kt-card-confirm="true"
                                                       data-kt-card-confirm-message="{{trans('forms.delete_quetion')}}"
                                                       data-kt-card-confirm-ButtonText="{{trans('forms.delete_btn')}}"
                                                       data-bs-toggle="tooltip" title="Remove card"
                                                       data-bs-dismiss="click">
                                                        <i class="fas fa-trash fs-1 text-danger"></i>
                                                    </a>
                                                </div>
                                                <div class="text-center px-4">
                                                    <img class="mw-100 mh-300px card-rounded-bottom" alt=""
                                                         src="{{$image->image}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>

                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Meta options-->

                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
            <!--        <button type="reset" class="btn btn-light me-5">{{trans('forms.cancel_btn')}}</button>
            -->
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
    <!--end::Content container-->

@endsection
@section('js')
    <!--begin::Vendors Javascript(used for this page only)-->
    {{--        <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>--}}
    {{--        <script src="assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>--}}
    {{--    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/save-category.js')}}"></script>--}}

    <!--end::Vendors Javascript-->

    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Site\Event\UpdateRequest', '#StorForm') !!}
    <script>
        var KTAppBlogSave = function () {
            const initckeditor = () => {

                const elements_en = [
                    '#details_en',
                    '#features_en'
                ];
                const elements_ar = [
                    '#details_ar',
                    '#features_ar'
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
                            },
                            heading: {
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



            // Init daterangepicker
            const initDaterangepicker = () => {

                $("#date_at").daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true,
                        minYear: 2000,
                        maxYear: parseInt(moment().format("YYYY"), 12)
                    }
                );
            }

            const initSelectcity = () => {
                $('#city_id').on('change', function () {
                    $('#district_id').val(null).trigger('change');
                });
            };
            const initSelectdistricts = () => {
                var city_id = $('#city_id').val();
                $('#district_id').select2({
                    ajax: {
                        url: '{{ route('admin.setting.getDistricts') }}',
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                city_id: $('#city_id').val(),
                                search: params.term,// search term
                                page: params.page || 1
                            };
                        }, processResults: function (data, params) {
                            params.page = params.page || 1;
                            var mappedData = $.map(data.data, function (item) {
                                return {id: item.id, text: item.name, imageUrl: item.imageUrl};
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
            };

            // Public methods
            return {
                init: function () {
                    // Init forms
                    initckeditor();
                    initDaterangepicker();
                    initSelectcity();
                    initSelectdistricts();
                    $('#city_id').trigger('change');

                }
            };
        }();
        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTAppBlogSave.init();
        });
    </script>
@endsection

