@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('dash_site.create')}}</h1>
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
                    <a href="{{ route('admin.gallery.index') }}"
                       class="text-muted text-hover-primary"> {{trans('Toolbar.gallery')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.galleryCreate')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.gallery.index')}}"
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
                          action="{{route('admin.gallery.update',$one_data->id)}}" method="post"
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
                                        <h2>{{trans('dash_site.main_image')}}</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body text-center pt-0">
                                    <!--begin::Image input-->
                                    <!--begin::Image input placeholder-->
                                    <style>.image-input-placeholder {
                                            background-image: url('{{$one_data->photoImage}}');
                                        }

                                        [data-bs-theme="dark"] .image-input-placeholder {
                                            background-image: url('{{$one_data->photoImage}}');
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
                        </div>
                        <!--end::Aside column-->
                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{trans('dash_site.mainData')}}</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row english">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{trans('dash_site.title')}}
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
                                    <div class="mb-10 fv-row arabic">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{trans('dash_site.title')}}
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


                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->
                            <!--begin::Meta options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{trans('dash_site.images')}}</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label">{{trans('dash_site.images')}}</label>
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
                                                                <a href="{{route('admin.gallery.destroy_image',$image->imageId)}}"
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
                     <!--           <button type="reset" class="btn btn-light me-5">{{trans('forms.cancel_btn')}}</button>
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

@endsection
@section('js')


    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Site\Gallery\UpdateRequest', '#StorForm') !!}

@endsection

