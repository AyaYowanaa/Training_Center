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
                    <a href="{{ route('admin.Settings.Instructor.index') }}"
                       class="text-muted text-hover-primary"> {{trans('Toolbar.TrainingCenter')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.Instructor_Update')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.Settings.Instructor.index')}}"
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
              action="{{route('admin.Settings.Instructor.update',$one_data->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{$one_data->id}}">
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!--begin::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{trans('trainingCenter.image')}}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <!--begin::Image input placeholder-->
                        <style>.image-input-placeholder {
                                background-image: url('{{asset('assets/media/svg/files/blank-image.svg')}}');
                            }

                            [data-bs-theme="dark"] .image-input-placeholder {
                                background-image: url('{{asset('assets/media/svg/files/blank-image-dark.svg')}}');
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
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
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
                        </div>

                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <div class="card-body pt-0">
                        <div class="row g-9 mb-7">
                            <!--begin::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('trainingCenter.Data')}}</label>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="fs-6 fw-semibold mb-2">{{trans('trainingCenter.Specialization')}}</label>
                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select class="form-select mb-2 @error('specialization_id') is-invalid @enderror"
                                        onchange="/*set_status()*/"
                                        data-control="select2" data-hide-search="false"
                                        data-placeholder="Select an option" data-allow-clear="true"
                                        id="specialization_id" name="specialization_id">

                                    <option value=" ">{{trans('maindata.Select')}}</option>

                                </select>
                                <!--end::Select2-->

                            </div>
                            <!--end::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.Email')}}

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="email"
                                       class="form-control mb-2  @error('email') is-invalid @enderror"
                                       placeholder="" value="{{old('email',$one_data->email)}}"/>
                                <!--end::Input-->
                                @error('email')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--end::Aside column-->
                <?php
                $name = $one_data->getTranslations('name');

                ?>
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
                        <div class="row">
                            <div class="col-md-6">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.Name')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_en')}}"</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name_en"
                                       class="form-control mb-2  @error('name_en') is-invalid @enderror"
                                       placeholder="name in English" value="{{old('name_en',$name['en'])}}"/>
                                <!--end::Input-->
                                @error('name_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="col-md-6">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.Name')}}
                                    <span class="text-muted fs-7">"{{trans('forms.lable_ar')}}"</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name_ar"
                                       class="form-control mb-2  @error('name_ar') is-invalid @enderror"
                                       placeholder="name in Arabic" value="{{old('name_ar',$name['ar'])}}"/>
                                <!--end::Input-->
                                @error('name_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                        </div>

                        <div class="row">


                            <div class="col-md-6">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.code')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="code"
                                       class="form-control mb-2  @error('code') is-invalid @enderror"
                                       placeholder="{{trans('trainingCenter.code')}}"
                                       value="{{old('code',$one_data->code)}}"/>
                                <!--end::Input-->
                                @error('code')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('trainingCenter.phone')}}

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="phone"
                                       class="form-control mb-2  @error('phone') is-invalid @enderror"
                                       placeholder="" value="{{old('phone',$one_data->phone)}}"/>
                                <!--end::Input-->
                                @error('phone')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::General options-->
                <!--begin::Meta options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{trans('trainingCenter.Files')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label">{{trans('trainingCenter.Documents/Files')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" multiple class="form-control mb-2" name="files[]"
                                   accept=".png, .jpg, .jpeg ,.pdf" placeholder="Meta tag name"/>
                            <!--end::Input-->

                        </div>

                        <div class="previews"></div>
                        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                            @if(isset($one_data->files)&&(!empty($one_data->files)))
                                @foreach($one_data->files as $file)
                                    @if(isImageIfile($file->file_url))
                                        @php $file_url_dark=$file_url=$file->file_url @endphp
                                    @else
                                        @php $file_url=getDefultImageIfile($file->file_url);
                                        $file_url_dark=$file_url['imagedark'];
                                        $file_url=$file_url['image'];
                                        @endphp
                                    @endif

                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <!--begin::Card-->
                                        <div class="card h-100 ">
                                            <!--begin::Card body-->
                                            <div
                                                class="card-body d-flex justify-content-center text-center flex-column p-8">
                                                <!--begin::Name-->
                                                <a href="{{$file->file_url}}"
                                                   class="text-gray-800 text-hover-primary d-flex flex-column">
                                                    <!--begin::Image-->
                                                    <div class="symbol symbol-75px mb-5">
                                                        <img src="{{$file_url}}" class="theme-light-show" alt="">
                                                        <img src="{{$file_url_dark}}" class="theme-dark-show" alt="">

                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Title-->
                                                    <div class="fs-5 fw-bold mb-2">
                                                        Finance
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                                <!--end::Name-->

                                                <!--begin::Description-->
                                               {{-- <div class="fs-7 fw-semibold text-gray-500">
                                                    7 files
                                                </div>--}}
                                                <div class="card-toolbar">
                                                    <a href="{{route('admin.Settings.Instructor.destroy_file',$file->id)}}"
                                                       class="btn btn-icon btn-sm btn-active-color-primary"
                                                       data-kt-card-action="remove"
                                                       data-kt-card-confirm="true"
                                                       data-kt-card-confirm-message="{{trans('forms.delete_quetion')}}"
                                                       data-kt-card-confirm-ButtonText="{{trans('forms.delete_btn')}}"
                                                       data-bs-toggle="tooltip" title="Remove card"
                                                       data-bs-dismiss="click">
                                                        <i class="fas fa-trash  text-danger"></i>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                       class="btn btn-icon btn-sm btn-active-color-primary"
                                                       onclick="$('#FilePreview').show();$('#FilePreview').attr('src','{{$file->file_url}}')"
                                                       data-bs-toggle="tooltip" title="{{trans('forms.preview')}}"
                                                       data-bs-dismiss="click">
                                                        <i class="fas fa-eye  text-info"></i>
                                                    </a>
                                                    <a href="{{$file->file_url}}" download
                                                       class="btn btn-icon btn-sm btn-active-color-primary"
                                                       data-bs-toggle="tooltip" title="{{trans('forms.preview')}}"
                                                       data-bs-dismiss="click">
                                                        <i class="fas fa-download  text-warning"></i>
                                                    </a>
                                                </div>

                                                <!--end::Description-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                @endforeach
                            @endif
                            <iframe id="FilePreview" src="" style="width: 100%; display: none" height="800px" >

                            </iframe>

                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Meta options-->

                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <!--    <button type="reset" class="btn btn-light me-5">{{trans('forms.cancel_btn')}}</button>
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
    {!! JsValidator::formRequest('App\Http\Requests\training_center\Trainers\UpdateRequest','#StorForm'); !!}

@endsection

