@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">
        <!--begin::Page title-->
        <div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">students</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless   fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        {{trans('Toolbar.home')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.UserManagement.users.index') }}" class="text-muted text-hover-primary">{{trans('Toolbar.users')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.UserManagement.users.create') }}" class="text-muted text-hover-primary">{{trans('users.create')}}</a>
                </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
        
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
@endsection

@section('content')
    <div id="kt_app_content_container" class="app-container  container-fluid ">

        <form   action="#" method="post">
    <div class="card py-4">
                <div class="card-header">  <h2> Student  Details</h2></div>
                <div class="card-body">
   <div class="row mb-2">
                        <!------ col-sm-6 ---->
                             <div class="col-sm-6">

                                 <div class="mb-5 fv-row">
                                     <label for="name"  class="required form-label"> name </label>
                                    <!-- <span class="text-muted">({{ trans('forms.lable_ar') }})</span>-->
                                     <input type="text" name="name_ar" id="name" class="form-control mb-2"  placeholder="name"/>
                                 </div>

                            </div>



                              <!------ col-sm-6 ---->
                              <div class="col-sm-6">

                                  <div class="mb-5 fv-row">
                                      <label for="code"  class="required form-label"> code </label>
                                  <!-- <span class="text-muted">({{ trans('forms.lable_ar') }})</span>-->
                                      <input type="text" name="code" id="code" class="form-control mb-2"  placeholder="code"/>
                                  </div>

                              </div>

                              <!------ col-sm-6 ---->
                              <div class="col-sm-6">

                                  <div class="mb-5 fv-row">
                                      <label for="phone"  class="required form-label"> phone </label>
                                  <!-- <span class="text-muted">({{ trans('forms.lable_ar') }})</span>-->
                                      <input type="number" name="phone" id="phone" class="form-control mb-2"  placeholder="phone"/>
                                  </div>

                              </div>

                              <!------ col-sm-6 ---->
                              <div class="col-sm-6">

                                  <div class="mb-5 fv-row">
                                      <label for="name"  class="required form-label"> email </label>
                                  <!-- <span class="text-muted">({{ trans('forms.lable_ar') }})</span>-->
                                      <input type="email" name="email" id="email" class="form-control mb-2"  placeholder="example@domain.com" />
                                  </div>

                              </div>

                        </div>
   <div class="form-footer col-lg-offset-1 col-md-offset-2 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>

            </div><!--end .box -->


        </form>

    </div>
@endsection
@section('js')

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Site\MainRequest', '#mainform') !!}
@endsection