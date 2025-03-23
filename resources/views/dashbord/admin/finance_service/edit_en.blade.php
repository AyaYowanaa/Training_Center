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
        <form id="StorForm" class="form d-flex flex-column flex-lg-row "
              action="{{route('admin.service.update_en',$service->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH"/>

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

                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label for="legal_intity_en"
                                       class="required form-label"> {{trans('Surveys/service.legal_intity')}}</label>
                                <span
                                    class="text-muted">({{ trans('forms.lable_en') }})</span>
                                <textarea data-kt-autosize="true"  name="legal_intity_en" id="legal_intity_en" class="form-control mb-2"
                                       placeholder="" > {{old('legal_intity_en',$legal_intity['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="legal_intity_ar"  readonly  id="legal_intity_ar"  class="form-control mb-2"
                                       placeholder="" > {{old('legal_intity_ar',$legal_intity['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="services_en" id="services_en" class="form-control mb-2"
                                       placeholder="" > {{old('services_en',$services['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="services_ar"  readonly  id="services_ar" class="form-control mb-2"
                                       placeholder="" readonly > {{old('services_ar',$services['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="finance_value_en" id="finance_value_en"
                                       class="form-control mb-2"
                                       placeholder="" > {{old('finance_value_en',$finance_value['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="finance_value_ar"  readonly  id="finance_value_ar"
                                       class="form-control mb-2"
                                       placeholder="" readonly > {{old('finance_value_ar',$finance_value['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="target_groups_en" id="target_groups_en"
                                       class="form-control mb-2"
                                       placeholder="" > {{old('target_groups_en',$target_groups['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="target_groups_ar"  readonly  id="target_groups_ar"
                                       class="form-control mb-2"
                                       placeholder="" readonly > {{old('target_groups_ar',$target_groups['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="conditions_en" id="conditions_en" class="form-control mb-2"
                                       placeholder="" > {{old('conditions_en',$conditions['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="conditions_ar"  readonly  id="conditions_ar" class="form-control mb-2"
                                       placeholder=""  readonly> {{old('conditions_ar',$conditions['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="expenses_en" id="expenses_en" class="form-control mb-2"
                                       placeholder="" > {{old('expenses_en',$expenses['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="expenses_ar"  readonly  id="expenses_ar" class="form-control mb-2"
                                       placeholder="" readonly > {{old('expenses_ar',$expenses['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="service_period_en" id="service_period_en"
                                       class="form-control mb-2"
                                       placeholder="" > {{old('service_period_en',$service_period['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="service_period_ar"  readonly  id="service_period_ar"
                                       class="form-control mb-2"
                                       placeholder="" readonly > {{old('service_period_ar',$service_period['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="loan_period_en" id="loan_period_en" class="form-control mb-2"
                                       placeholder="" > {{old('loan_period_en',$loan_period['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="loan_period_ar"  readonly  id="loan_period_ar" class="form-control mb-2"
                                       placeholder="" readonly> {{old('loan_period_ar',$loan_period['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="loan_again_en" id="loan_again_en" class="form-control mb-2"
                                       placeholder="" > {{old('loan_again_en',$loan_again['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="loan_again_ar"  readonly  id="loan_again_ar" class="form-control mb-2"
                                       placeholder="" readonly> {{old('loan_again_ar',$loan_again['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="how_pay_en" id="how_pay_en" class="form-control mb-2"
                                       placeholder="" > {{old('how_pay_en',$how_pay['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="how_pay_ar"  readonly  id="how_pay_ar" class="form-control mb-2"
                                       placeholder="" readonly> {{old('how_pay_ar',$how_pay['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="training_before_en" id="training_before_en"
                                       class="form-control mb-2"
                                       placeholder="" > {{old('training_before_en',$training_before['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="training_before_ar"  readonly  id="training_before_ar"
                                       class="form-control mb-2"
                                       placeholder="" readonly> {{old('training_before_ar',$training_before['ar'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="stories_en" id="stories_en" class="form-control mb-2"
                                       placeholder="" > {{old('stories_en',$stories['en'])}}</textarea>
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
                                <textarea data-kt-autosize="true"  name="stories_ar"  readonly  id="stories_ar" class="form-control mb-2"
                                       placeholder="" readonly> {{old('stories_ar',$stories['ar'])}}</textarea>
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
              <!--       <button type="reset" class="btn btn-light me-5">{{trans('forms.cancel_btn')}}</button>
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

