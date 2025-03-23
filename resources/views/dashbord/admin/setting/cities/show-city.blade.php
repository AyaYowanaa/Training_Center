@extends('dashbord.layouts.master')

@section('content')
    <!-- Modal 1-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.setting.city.store')}}" method="POST" id="kt_ecommerce_add_product_form"
                  class="form d-flex flex-column flex-lg-row my-form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{trans('settings.Add_City')}}</h5>
                    </div>
                    <!--begin::Formmmmm-->

                    <div class="modal-body">
                        <div class="container-fluid">


                            <div class="row">
                                <label class="required form-label">{{trans('settings.City_Name')}} (<span
                                        class="text-gray-600">{{trans('forms.lable_en')}}</span>)</label>

                                <input type="text" name="city_name_en" class="form-control mb-2"
                                       placeholder="City name" value="" required autocomplete/>
                            </div>
                            <div class="row">
                                <label class="required form-label">{{trans('settings.City_Name')}}(<span
                                        class="text-gray-600">{{trans('forms.lable_ar')}}</span>)</label>

                                <input type="text" name="city_name_ar" class="form-control mb-2"
                                       placeholder="اسم المدينه" value="" required autocomplete/>
                            </div>
                            <!--end::Main column-->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">{{trans('settings.Save_Changes')}}</span>
                            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{trans('settings.Close')}}</button>

                    </div>


                </div>
            </form>
        </div>

    </div>

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        {{trans('settings.cities')}} </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">{{trans('forms.home')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{trans('forms.setting')}}</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{trans('settings.City_Name')}}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">

                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Category-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-3 gap-2 gap-md-1">
                        <!--begin::Card title-->
                        <div class="card-title">

                        </div>
                        <!--end::Card title-->


                        <div class="card-toolbar">
                            <!--begin::Add customer-->
                        {{--                            <a href="../../demo1/dist/apps/ecommerce/catalog/add-category.html" class="btn btn-primary">Add Category</a>--}}

                        <!------ button model  ---------->
                            <button type="button"

                                    class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                {{trans('settings.Add_City')}}
                            </button>
                            <!--end::Add customer-->
                        </div>

                    </div>

                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table id="kt_datatable_zero_configuration"
                               class="table align-middle table-row-dashed fs-6 gy-3">
                            <!--begin::Table head-->
                            <thead>

                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-250px">#</th>

                                <th class="min-w-250px">{{trans('settings.City_Name')}}</th>
                                <th class="text-end min-w-70px">{{trans('settings.Actions')}}</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                            <!--begin::Table row-->
                            @php
                                $i=1;
                            @endphp
                            @foreach  ($city as $x)
                                <tr>
                                    <td>{{$i++}}</td>

                                    <td>{{$x->city_name}}</td>


                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                           data-kt-menu-trigger="click"
                                           data-kt-menu-placement="bottom-end">{{trans('settings.Actions')}}
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421
                                                8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583
                                                5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835
                                                 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642
                                                  8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584
                                                  16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467
                                                  13.0468 11.4343 12.7344Z" fill="currentColor"/>
                                            </svg>
                                        </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                        menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                             data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{route('admin.setting.city.edit',$x->id)}}"
                                                   data-bs-toggle="modal" data-bs-target="#exampleModal{{$x->id}}"
                                                   class="menu-link px-3">{{trans('settings.Edit')}}</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{route('admin.setting.city.delete',$x->id)}}"
                                                   class="menu-link px-3"
                                                   data-kt-ecommerce-category-filter="delete_row">{{trans('settings.Delete')}}</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>

                            @endforeach

                            </tbody>

                        </table>
                        <!--end::Table-->

                    @foreach  ($city as $x)
                        <!-- Modal 1-->
                            <div class="modal fade" id="exampleModal{{$x->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{route('admin.setting.city.update',$x->id)}}" method="POST"
                                          id="kt_ecommerce_add_product_form my-form"
                                          class="form d-flex flex-column flex-lg-row"
                                          enctype="multipart/form-data">
                                        @method('PUT')
                                        {{csrf_field()}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{trans('settings.Update_City')}}</h5>
                                            </div>
                                            <!--begin::Formmmmm-->

                                            <div class="modal-body">
                                                <div class="container-fluid">

                                                    <input type="hidden" name="id" value="{{$x->id}}">
                                                    @php
                                                        $city_name=$x->getTranslations('city_name'); //return local lang
                                                    @endphp
                                                    <div class="row">
                                                        <label
                                                            class="required form-label">{{trans('settings.City_Name')}}
                                                            (<span
                                                                class="text-gray-600">{{trans('forms.lable_en')}}</span>)</label>

                                                        <input type="text" name="city_name_en" class="form-control mb-2"
                                                               placeholder="City name" value="{{$city_name['en']}}"
                                                               required autocomplete/>
                                                    </div>
                                                    <div class="row">
                                                        <label
                                                            class="required form-label">{{trans('settings.City_Name')}}
                                                            (<span
                                                                class="text-gray-600">{{trans('forms.lable_ar')}}</span>)</label>

                                                        <input type="text" name="city_name_ar" class="form-control mb-2"
                                                               placeholder="اسم المدينه" value="{{$city_name['ar']}}"
                                                               required autocomplete/>
                                                    </div>


                                                    <!--end::Button-->

                                                    <!--end::Main column-->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                    <span
                                                        class="indicator-label">{{trans('settings.Save_Changes')}}</span>
                                                        <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        {{trans('settings.Close')}}</button>

                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Category-->
            </div>
            <!--end::Content container-->
        </div>
    </div>

@stop
@section('js')
    <script>
        /*
                $("#kt_datatable_zero_configuration").DataTable();
        */

        $("#kt_datatable_zero_configuration").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });

    </script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\EditeCityRequest', '.my-form') !!}
@endsection
