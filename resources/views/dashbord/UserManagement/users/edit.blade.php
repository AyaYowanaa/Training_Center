@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('Toolbar.usersUpdate')}}</h1>
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
                    <a href="{{ route('admin.UserManagement.users.index') }}"
                       class="text-muted text-hover-primary">{{trans('Toolbar.users')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="#"
                       class="text-muted text-hover-primary">{{trans('Toolbar.usersUpdate')}}</a>
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.UserManagement.users.index')}}"
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

        <form method="POST" action="{{ route('admin.UserManagement.users.update',$user_data->id) }}" id="store_form"
              class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH"/>
            <input type="hidden" name="id" value="{{$user_data->id}}"/>
            @csrf
            <!--begin::Aside column-->
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">


                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>User Image</h2>
                        </div>
                    </div>

                    <div class="card-body text-center pt-0">

                        <style>.image-input-placeholder {
                                background-image: url('{{asset('assets/media/svg/files/blank-image.svg')}}');
                            }

                            [data-bs-theme="dark"] .image-input-placeholder {
                                background-image: url('{{asset('assets/media/svg/files/blank-image-dark.svg')}}');
                            }</style>

                        <div
                                class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                            <div class="image-input-wrapper w-150px h-150px"
                                 style="background-image:url({{ asset($user_data->image) }})"></div>
                            <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    title="Change avatar">
                                <i class="fa fa-pencil ">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="file" name="user_image" id="user_image"
                                       accept=".png, .jpg, .jpeg"/>
                                <input type="hidden" name="avatar_remove"/>
                            </label>

                            <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    title="Cancel image">
															<i class="ki-duotone ki-cross fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>

                            <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    title="Remove image">
															<i class="ki-duotone ki-cross fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->

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
                            <h2>General</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="mb-10 fv-row col">
                                <label class="required form-label">User Name</label>

                                <input type="text" name="user_name" id="user_name" class="form-control mb-2"
                                       placeholder="User name" value="{{ old('user_name',$user_data->name) }}"/>
                            </div>

                            <div class="mb-10 fv-row col">
                                <label class="required form-label"> Email </label>
                                <input type="text" name="email" id="email" class="form-control mb-2"
                                       placeholder=" Email " value="{{ old('email',$user_data->email) }}"/>
                            </div>


                            <div class="mb-10 fv-row col">
                                <label class="required form-label"> Phone </label>
                                <input type="text" name="phone" id="phone" class="form-control mb-2"
                                       placeholder=" Phone " value="{{ old('phone',$user_data->phone) }}"/>
                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-10 fv-row col">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">{{trans('users.status')}}
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
                                    @foreach($status_array as $key=>$value)
                                        <option value="{{ $key }}" <?php if ($key == old('status', $user_data->status)) {
                                            echo 'selected';
                                        } ?>>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                                @error('status')
                                <div
                                        class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{--
                                                     <div class="mb-10 fv-row col">
                                                         <!--begin::Label-->
                                                         <label
                                                             class="required fs-6 fw-semibold mb-2">{{trans('users.roles')}}</label>
                                                         <!--end::Label-->

                                                         <select class="form-select mb-2 @error('roles') is-invalid @enderror"
                                                                 data-control="select2" data-hide-search="false"
                                                                 data-placeholder="Select an option"
                                                                 id="roles" name="roles">

                                                             <option></option>
                                                             @foreach($roles as $row)
                                                                 <option value="{{ $row->id }}" @if($row->id == old('roles', $user_data->group_name))
                                                                     {{'selected'}}
                                                                     @endif>{{ $row->title }}</option>
                                                             @endforeach
                                                         </select>

                                                         @error('roles')
                                                         <div
                                                             class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                                         @enderror
                                                     </div>
                            --}}
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

    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdminUpdateRequest', '#store_form') !!}
@endsection



