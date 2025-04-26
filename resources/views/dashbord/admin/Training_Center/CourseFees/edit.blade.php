@extends('dashbord.layouts.master')

@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('trainingCenter.createCourseFees')}}</h1>
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
                    <a href="{{ route('admin.Settings.CoursesFees.index') }}"
                       class="text-muted text-hover-primary"> {{trans('Toolbar.TrainingCenter')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.Update_CourseFees')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.Settings.CoursesFees.index')}}"
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
        action="{{route('admin.Settings.CoursesFees.update',$one_data->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{$one_data->id}}">
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
                                <label class="required form-label">{{trans('trainingCenter.Amount')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="amount"
                                       class="form-control mb-2  @error('amount') is-invalid @enderror"
                                       placeholder="{{trans('trainingCenter.Amount')}}" value="{{old('amount',$one_data->amount)}}"/>
                                <!--end::Input-->
                                @error('amount')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>






                            <div class="col-md-4">
                                <label class="form-label">{{ trans('trainingCenter.Courses') }}</label>

                                <!--begin::Select2-->
                                <select class="form-select mb-2 @error('courses_id') is-invalid @enderror"
                                        data-control="select2" data-hide-search="false"
                                        id="courses_id" name="courses_id">

                                    <option disabled {{ old('courses_id') ? '' : 'selected' }} value="">
                                        {{ trans('maindata.Select') }}
                                    </option>

                                    @foreach($courses as $row)
                                        <option value="{{ $row->id }}" {{ old('courses_id') == $row->id ? 'selected' : '' }}>
                                            {{ $row->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">{{trans('trainingCenter.Expenses')}}</label>

                                <!--begin::Select2-->
                                <select class="form-select mb-2 @error('expenses_id') is-invalid @enderror"
                                        onchange="/*set_status()*/"
                                        data-control="select2" data-hide-search="false"
                                    data-placeholder="Select an option" data-allow-clear="true"
                                        id="expenses_id" name="expenses_id">

                                    <option value=" ">{{trans('maindata.Select')}}</option>
                                    @foreach($expenses as $row)
                                    <option value="{{ $row->id }}">{{ $row->name}}</option>
                                @endforeach
                                </select>
                                <!--end::Select2-->
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


@endsection

