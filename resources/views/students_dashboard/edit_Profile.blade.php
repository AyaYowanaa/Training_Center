@extends('students_dashboard.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Add User</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('student.dashboard') }}" class="text-muted text-hover-primary">
                        {{trans('Toolbar.home')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('student.profile.edit',auth('student')->user()->id) }}"
                       class="text-muted text-hover-primary">{{trans('Toolbar.users')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
              


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('student.profile.edit',auth('student')->user()->id)}}"
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

        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
@endsection

@section('content')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('student.profile.update') }}" id="store_form"
              class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH"/>
            <input type="hidden" name="id" value="{{auth('student')->user()->id}}"/>
        @csrf
        
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>General</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label class="required form-label">User Name</label>

                                <input type="text" name="user_name" id="name" class="form-control mb-2"
                                       placeholder="User name" value="{{ old('user_name',auth('student')->user()->user_name) }}"/>
                            </div>

                            <div class="mb-10 fv-row col">
                                <label class="required form-label"> Email </label>
                                <input type="text" name="email" id="email" class="form-control mb-2"
                                       placeholder=" Email " value="{{ old('email',auth('student')->user()->email) }}"/>
                            </div>


                        
                        </div>
                     <div  class="row">

                         <div class="mb-10 fv-row col">
                             <!--begin::Label-->
                             <label class="required fs-6 fw-semibold mb-2">{{trans('user.status')}}
                             </label>

                             <!--end::Label-->
                             <!--begin::Select2-->
                             <select class="form-select mb-2 @error('status') is-invalid @enderror"
                                     onchange="/*set_status()*/"
                                     data-control="select2" data-hide-search="true"
                                     data-placeholder="Select an option"
                                     id="status" name="status">
                                 <?php
                                 $status_array = array('0' => 'NotActive', '1' => 'Active')
                                 ?>
                                 <option></option>
                                 @foreach($status_array as $key => $value)
                                        <option value="{{ $key }}" @if($key == old('status', auth('supplier')->user()->status)) selected @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                             </select>
                             <!--end::Select2-->
                             @error('status')
                             <div
                                 class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>

                     </div>


                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::General options-->


                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="../../demo1/dist/apps/ecommerce/catalog/products.html"
                       id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                        <span class="indicator-label">Save</span>
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
    <script>
        $(document).ready(function () {
            $("#password-toggle").click(function () {
                var passwordField = $("#password-field");
                var passwordIcon = $(".toggle-password");

                if (passwordField.attr("type") === "password") {
                    passwordField.attr("type", "text");
                    passwordIcon.each(function () {
                        if ($(this).data("mode") === "password") {
                            $(this).addClass("d-none");
                        } else {
                            $(this).removeClass("d-none");
                        }
                    });
                } else {
                    passwordField.attr("type", "password");
                    passwordIcon.each(function () {
                        if ($(this).data("mode") === "password") {
                            $(this).removeClass("d-none");
                        } else {
                            $(this).addClass("d-none");
                        }
                    });
                }
            });
            set_status(value);
        });
    </script>


    <script>
        function set_status(value) {
            var status = $('#kt_ecommerce_add_category_status');
            if (value == 0) {
                status.removeClass('bg-success').addClass('bg-danger');
            } else if (value == 1) {
                status.removeClass('bg-danger').addClass('bg-success');
            }
        }
    </script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

@endsection



