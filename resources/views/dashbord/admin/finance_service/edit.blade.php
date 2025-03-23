@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('Surveys/service.update')}}</h1>
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
                       class="text-muted text-hover-primary"> {{trans('Toolbar.blog')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.blogCreate')}}
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
 action="{{route('admin.service.update',$service->id)}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="_method" value="PATCH"/>
        <!--begin::Aside column-->
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!--begin::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{trans('Surveys/service.image')}}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <!--begin::Image input placeholder-->
                        <style>.image-input-placeholder {
                                background-image: url('{{$service->image_url}}');
                            }

                            [data-bs-theme="dark"] .image-input-placeholder {
                                background-image: url('{{$service->image_url}}');
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
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg
                                and
                                *.jpeg image files are accepted
                            </div>
                            <!--end::Description-->
                        </div>

                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{trans('Surveys/service.mainData')}}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
                        <div class="row g-9 mb-7">

                            <div class="row">
                                <!--begin::Input group-->
                                <div class="mb-10 col  fv-row">
                                    <label for="name" class="required form-label"> {{trans('Surveys/service.Name')}}</label>

                                    <input type="text" name="name" id="name" class="form-control mb-2"
                                           placeholder="name" value="{{old('name',$service->name)}}"/>
                                    @error('name')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-10 col ">
                                    <!--begin::Label-->
                                    <label for="address" class="required form-label"> {{trans('Surveys/service.address')}}</label>

                                    <input type="text" name="address" id="address" class="form-control mb-2"
                                           placeholder="" value="{{old('address',$service->address)}}"/>
                                    @error('address')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-10 fv-row col">
                                    <label class="required fs-6 fw-semibold mb-2">{{trans('Surveys/service.governorate')}}
                                    </label>
                                    <select class="form-select mb-2 @error('governorate') is-invalid @enderror"
                                            onchange="/*set_status()*/"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select an option"
                                            id="governorate" name="governorate">
                                        <?php
                                        $status_array = array('0' => 'menofia', '1' => 'gharbia')
                                        ?>
                                        @foreach($status_array as $key=>$value)
                                            <option value="{{ $key }}" @if($service->city==  $key) {{'selected'}} @endif>{{ $value }}
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
                            <div class="row">
                                <div class="mb-10 fv-row col">
                                    <label class="required fs-6 fw-semibold mb-2">{{trans('Surveys/service.city')}}
                                    </label>
                                    <select class="form-select mb-2 @error('governorate') is-invalid @enderror"
                                            onchange="/*set_status()*/"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select an option"
                                            id="city" name="city">
                                        <?php
                                        $status_array = array('0' => 'tanta', '1' => 'chebien')
                                        ?>


                                        @foreach($status_array as $key=>$value)
                                            <option value="{{ $key }}" @if($service->city==  $key) {{'selected'}} @endif>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!--end::Select2-->
                                    @error('city')
                                    <div
                                        class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!--begin::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('Surveys/service.phone')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="tel"
                                       class="form-control  @error('phone') is-invalid @enderror"
                                       value="{{old('phone',$service->phone)}}" name="phone"
                                       placeholder="" id="phone"/>
                                <!--end::Input-->
                                @error('phone')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('Surveys/service.fax')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="tel"
                                       class="form-control  @error('fax') is-invalid @enderror"
                                       value="{{old('fax',$service->fax)}}" name="fax"
                                       placeholder="" id="fax"/>
                                <!--end::Input-->
                                @error('fax')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="">
                                <!--begin::Label-->
                                <label
                                    class="required fs-6 fw-semibold mb-2">{{trans('Surveys/service.email')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email"
                                       class="form-control  @error('email') is-invalid @enderror"
                                       placeholder=""
                                       name="email" value="{{old('email',$service->email)}}">
                                <!--end::Input-->
                                @error('email')
                                <div
                                    class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <div class="row">

                                <div class="mb-10 fv-row col">
                                    <label for="manager_name" class="required form-label"> {{trans('Surveys/service.managaer_name')}}</label>

                                    <input type="text" name="manager_name" id="manager_name" class="form-control mb-2"
                                           placeholder="" value="{{old('manager_name',$service->manager_name)}}"/>
                                    @error('manager_name')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-10 fv-row col">
                                    <!--begin::Label-->
                                    <label
                                        class="required fs-6 fw-semibold mb-2">{{trans('Surveys/service.manager_phone')}}</label>
                                    <input type="tel"
                                           class="form-control  @error('manager_phone') is-invalid @enderror"
                                           value="{{old('manager_phone',$service->manager_phone)}}" name="manager_phone"
                                           placeholder="" id="manager_phone"/>
                                    <!--end::Input-->
                                    @error('manager_phone')
                                    <div
                                        class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-10 fv-row col">
                                    <label for="manager_job" class="required form-label"> {{trans('Surveys/service.managaer_name')}}</label>

                                    <input type="text" name="manager_job" id="manager_job" class="form-control mb-2"
                                           placeholder="" value="{{old('manger_job',$service->manger_job)}}"/>
                                    @error('manager_job')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
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
                            <h2>{{trans('Surveys/service.financing_service_provider')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        @php
                            $stories = $service->getTranslations('stories');
                            $training_before = $service->getTranslations('training_before');
                            $loan_again = $service->getTranslations('loan_again');
                            $how_pay = $service->getTranslations('how_pay');
                            $loan_period = $service->getTranslations('loan_period');
                            $service_period = $service->getTranslations('service_period');
                            $expenses = $service->getTranslations('expenses');
                            $conditions = $service->getTranslations('conditions');
                            $target_groups = $service->getTranslations('target_groups');
                            $finance_value = $service->getTranslations('finance_value');
                            $services = $service->getTranslations('services');
                            $legal_intity = $service->getTranslations('legal_intity');


                        @endphp
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="legal_intity_en"
                                       class="required form-label"> {{trans('Surveys/service.legal_intity')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="legal_intity_en" id="legal_intity_en" class="form-control mb-2"
                                       placeholder="" >{{old('legal_intity_en',$legal_intity['en'])}}</textarea>
                                @error('legal_intity_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="legal_intity_ar"
                                       class="required form-label"> {{trans('Surveys/service.legal_intity')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="legal_intity_ar" id="legal_intity_ar" class="form-control mb-2"
                                       placeholder="" >{{old('legal_intity_ar',$legal_intity['ar'])}}</textarea>
                                @error('legal_intity_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="services_en"
                                       class="required form-label"> {{trans('Surveys/service.services')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="services_en" id="services_en" class="form-control mb-2"
                                       placeholder="" >{{old('services_en',$services['en'])}}</textarea>
                                @error('services_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="services_ar"
                                       class="required form-label"> {{trans('Surveys/service.services')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="services_ar" id="services_ar" class="form-control mb-2"
                                       placeholder="" >{{old('services_ar',$services['ar'])}}</textarea>
                                @error('services_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!---------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="finance_value_en"
                                       class="required form-label"> {{trans('Surveys/service.finance_value')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="finance_value_en" id="finance_value_en"
                                       class="form-control mb-2"
                                       placeholder="" >{{old('finance_value_en',$finance_value['en'])}}</textarea>
                                @error('finance_value_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="finance_value_ar"
                                       class="required form-label"> {{trans('Surveys/service.finance_value')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="finance_value_ar" id="finance_value_ar"
                                       class="form-control mb-2"
                                       placeholder="" >{{old('finance_value_ar',$finance_value['ar'])}}</textarea>
                                @error('finance_value_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="target_groups_en"
                                       class="required form-label"> {{trans('Surveys/service.target_groups')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="target_groups_en" id="target_groups_en"
                                       class="form-control mb-2"
                                       placeholder="" >{{old('target_groups_en',$target_groups['en'])}}</textarea>
                                @error('target_groups_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="target_groups_ar"
                                       class="required form-label"> {{trans('Surveys/service.target_groups')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="target_groups_ar" id="target_groups_ar"
                                       class="form-control mb-2"
                                       placeholder="" >{{old('target_groups_ar',$target_groups['ar'])}}</textarea>
                                @error('target_groups_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="conditions_en"
                                       class="required form-label"> {{trans('Surveys/service.conditions')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="conditions_en" id="conditions_en" class="form-control mb-2"
                                       placeholder="" >{{old('conditions_en',$conditions['en'])}}</textarea>
                                @error('conditions_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="conditions_ar"
                                       class="required form-label"> {{trans('Surveys/service.conditions')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="conditions_ar" id="conditions_ar" class="form-control mb-2"
                                       placeholder="" >{{old('conditions_ar',$conditions['ar'])}}</textarea>
                                @error('conditions_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="expenses_en"
                                       class="required form-label"> {{trans('Surveys/service.expenses')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="expenses_en" id="expenses_en" class="form-control mb-2"
                                       placeholder="" >{{old('expenses_en',$expenses['en'])}}</textarea>
                                @error('expenses_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="expenses_ar"
                                       class="required form-label"> {{trans('Surveys/service.expenses')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="expenses_ar" id="expenses_ar" class="form-control mb-2"
                                       placeholder="" >{{old('expenses_ar',$expenses['ar'])}}</textarea>
                                @error('expenses_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="service_period_en"
                                       class="required form-label"> {{trans('Surveys/service.service_period')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="service_period_en" id="service_period_en"
                                       class="form-control mb-2"
                                       placeholder="" >{{old('service_period_en',$service_period['en'])}}</textarea>
                                @error('service_period_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="service_period_ar"
                                       class="required form-label"> {{trans('Surveys/service.service_period')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="service_period_ar" id="service_period_ar"
                                       class="form-control mb-2"
                                       placeholder="" >{{old('service_period_ar',$service_period['ar'])}}</textarea>
                                @error('service_period_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="loan_period_en"
                                       class="required form-label"> {{trans('Surveys/service.loan_period')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="loan_period_en" id="loan_period_en" class="form-control mb-2"
                                       placeholder="" >{{old('loan_period_en',$loan_period['en'])}}</textarea>
                                @error('loan_period_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="loan_period_ar"
                                       class="required form-label"> {{trans('Surveys/service.loan_period')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="loan_period_ar" id="loan_period_ar" class="form-control mb-2"
                                       placeholder="" >{{old('loan_period_ar',$loan_period['ar'])}}</textarea>
                                @error('loan_period_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="_en"
                                       class="required form-label"> {{trans('Surveys/service.loan_again')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="loan_again_en" id="loan_again_en" class="form-control mb-2"
                                       placeholder="" >{{old('loan_again_en',$loan_again['en'])}}</textarea>
                                @error('loan_again_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="loan_again_ar"
                                       class="required form-label"> {{trans('Surveys/service.loan_again')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="loan_again_ar" id="loan_again_ar" class="form-control mb-2"
                                       placeholder="" >{{old('loan_again_ar',$loan_again['ar'])}}</textarea>
                                @error('loan_again_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="how_pay_en"
                                       class="required form-label"> {{trans('Surveys/service.how_pay')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="how_pay_en" id="how_pay_en" class="form-control mb-2"
                                       placeholder="" >{{old('how_pay_en',$how_pay['en'])}}</textarea>
                                @error('how_pay_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="how_pay_ar"
                                       class="required form-label"> {{trans('Surveys/service.how_pay')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="how_pay_ar" id="how_pay_ar" class="form-control mb-2"
                                       placeholder="" >{{old('how_pay_ar',$how_pay['ar'])}}</textarea>
                                @error('how_pay_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="training_before_en"
                                       class="required form-label"> {{trans('Surveys/service.training_before')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="training_before_en" id="training_before_en"
                                       class="form-control mb-2"
                                       placeholder="" >{{old('training_before_en',$training_before['en'])}}</textarea>
                                @error('training_before_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="training_before_ar"
                                       class="required form-label"> {{trans('Surveys/service.training_before')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="training_before_ar" id="training_before_ar"
                                       class="form-control mb-2"
                                       placeholder="" >{{old('training_before_ar',$training_before['ar'])}}</textarea>
                                @error('training_before_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="stories_en"
                                       class="required form-label"> {{trans('Surveys/service.stories')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="stories_en" id="stories_en" class="form-control mb-2"
                                       placeholder="" >{{old('stories_en',$stories['en'])}}</textarea>
                                @error('stories_en')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="stories_ar"
                                       class="required form-label"> {{trans('Surveys/service.stories')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_ar') }})</span>
                                <textarea data-kt-autosize="true"  type="text" name="stories_ar" id="stories_ar" class="form-control mb-2"
                                       placeholder="" >{{old('stories_ar',$stories['ar'])}}</textarea>
                                @error('stories_ar')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <!-------------------------------------------------------------------------------->

                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::General options-->

                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                   
                  <!--  <button type="reset" class="btn btn-light me-5">{{trans('forms.cancel_btn')}}</button>
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



    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    <script>


    </script>
@endsection

