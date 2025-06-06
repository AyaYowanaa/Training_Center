@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('TC_Setting.createEntities')}}</h1>
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
                    {{trans('Toolbar.setting')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.Entities')}}
                </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-icon btn-sm btn-success flex-shrink-0 ms-4">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                              rx="1" transform="rotate(-90 11.364 20.364)"
                                                              fill="currentColor"/>
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                              fill="currentColor"/>
													</svg>
												</span>
                    <!--end::Svg Icon-->
                </button>
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
    <!-- Modal 1-->
    <div class="modal fade" id="exampleModal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.Settings.Entity.store')}}" method="POST" id="kt_ecommerce_add_product_form"
                  class="form d-flex flex-column flex-lg-row my-form" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" value="0">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{trans('TC_Setting.Add')}}</h5>
                    </div>
                    <!--begin::Formmmmm-->

                    <div class="modal-body">
                        <div class="container-fluid">


                            <div class="row">
                                <label
                                    class="required form-label">{{trans('TC_Setting.NameEntities')}}
                                    (<span
                                        class="text-gray-600">{{trans('forms.lable_en')}}</span>)</label>

                                <input type="text" name="name_en" class="form-control mb-2"
                                       placeholder="Name" value=""
                                       {{-- value="{{$name['en']?? '-'}}---}}
                                       required autocomplete/>


                                <label
                                    class="required form-label">{{trans('TC_Setting.NameEntities')}}
                                    (<span
                                        class="text-gray-600">{{trans('forms.lable_ar')}}</span>)</label>

                                <input type="text" name="name_ar" class="form-control mb-2"
                                       placeholder="name" value=""
                                       required autocomplete/>

                                <label
                                    class="required form-label">{{trans('TC_Setting.address')}}
                                    (<span
                                        class="text-gray-600">{{trans('forms.lable_en')}}</span>)</label>

                                <input type="text" name="address_en" class="form-control mb-2"
                                       placeholder="Address" value=""
                                       {{-- value="{{$name['en']?? '-'}}---}}
                                       required autocomplete/>

                                <label
                                    class="required form-label">{{trans('TC_Setting.Address')}}
                                    (<span
                                        class="text-gray-600">{{trans('forms.lable_ar')}}</span>)</label>

                                <input type="text" name="address_ar" class="form-control mb-2"
                                       placeholder="العنوان" value=""
                                       required autocomplete/>
                                <label
                                    class="required form-label">{{trans('TC_Setting.Email')}}
                                </label>
                                <input type="text" name="email" class="form-control mb-2"
                                       placeholder="example@yahoo.com" value=""
                                       required autocomplete/>
                                <label
                                    class="required form-label">{{trans('TC_Setting.Phone')}}
                                </label>
                                <input type="text" name="phone" class="form-control mb-2"
                                       placeholder="" value=""
                                       required autocomplete/>

                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">{{trans('settings.Save Changes')}}</span>
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


    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Category-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-3 gap-2 gap-md-1">
                <!--begin::Card title-->
                <div class="card-title">

                </div>
                <!--end::Card title-->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="card-body pt-0">
                <!--begin::Table-->
                <table id="kt_datatable_zero_configuration"
                       class="table align-middle table-row-dashed fs-6 gy-3">
                    <!--begin::Table head-->
                    <thead>

                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-250px">#</th>

                        <th class="min-w-250px">{{trans('TC_Setting.NameEntities')}}</th>
                        <th class="text-end min-w-70px">{{trans('TC_Setting.Action')}}</th>
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

                    @foreach  ($obj as $x)
                            <?php $name = json_decode($x->name, true);
                            $address = json_decode($x->address, true); ?>

                        <tr>
                            <td>{{$i++}}</td>
                            {{--        <td>{{ $x->name[app()->getLocale()] ?? '-' }}</td>
                            {{--            <td>{{ json_decode($x->name, true)['en'] ?? '-' }}</td>
                                       <td>{{ $name['en'] ?? '-' }}</td> --}}
                            <td>{{$x->name}}</td>


                            <!--begin::Action=-->
                            <td class="text-end">
                                <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3"
                                   href="{{route('admin.Settings.Entity.edit', $x->id)}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$x->id}}">
{{--                                    <i class="ki-duotone ki-setting-3 fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>--}}
                                    <i class="ki-duotone ki-notepad-edit"><span class="path1"></span><span class="path2"></span></i>
                                </a>
                                 <a class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" href="{{route('admin.Settings.Entity.show', $x->id)}}">
                                     <i class="ki-duotone ki-eye"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                 </a>
                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px" href="{{route('admin.Settings.Entity.delete', $x->id)}}">
                                    <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>
                            </td>
{{--
                            <td class="text-end">

                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <a href="{{route('admin.Settings.Entity.show', $x->id)}}"
                                       class="btn btn-sm btn-light-info   btn-text-info btn-icon-info"><i
                                            class="fas fa-eye"></i></a>

                                    <a href="{{route('admin.Settings.Entity.edit', $x->id)}}"

                                       data-bs-toggle="modal" data-bs-target="#exampleModal{{$x->id}}"
                                       class="btn btn-sm btn-warning  "><i
                                            class="fas fa-pencil"></i></a>

                                    <a href="{{route('admin.Settings.Entity.delete', $x->id)}}"
                                       class="btn btn-sm btn-danger  "><i
                                            class="fas fa-trash"></i></a>

                                </div>
                            </td>
--}}
                            <!--end::Action=-->
                        </tr>

                    @endforeach

                    </tbody>

                </table>
                <!--end::Table-->

                @foreach  ($obj as $x)
                    <!-- Modal 1-->
                    <div class="modal fade" id="exampleModal{{$x->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <!--begin::Formmmmm-->
                            <form action="{{route('admin.Settings.Entity.update',$x->id)}}" method="POST"
                                  id="kt_ecommerce_add_product_form "
                                  class="form d-flex flex-column flex-lg-row my-form"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                {{csrf_field()}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            {{trans('TC_Setting.Update')}}</h5>
                                    </div>


                                    <div class="modal-body">
                                        <div class="container-fluid">

                                            <input type="hidden" name="id" value="{{$x->id}}">
                                            {{--     @php
                                                    $name=optional($x->getTranslations('name')); //return local lang
                                                @endphp --}}
                                                <?php
                                                $name = optional($x->getTranslations('name'));
                                                $address = optional($x->getTranslations('address'));
                                                /* $name = optinal(json_decode($x->name, true)); */ ?>


                                            <div class="row">
                                                <label
                                                    class="required form-label">{{trans('TC_Setting.NameEntities')}}
                                                    (<span
                                                        class="text-gray-600">{{trans('forms.lable_en')}}</span>)</label>

                                                <input type="text" name="name_en" class="form-control mb-2"
                                                       placeholder="Name" value="{{$name['en']}}"
                                                       {{-- value="{{$name['en']?? '-'}}---}}
                                                       required autocomplete/>


                                                <label
                                                    class="required form-label">{{trans('TC_Setting.NameEntities')}}
                                                    (<span
                                                        class="text-gray-600">{{trans('forms.lable_ar')}}</span>)</label>

                                                <input type="text" name="name_ar" class="form-control mb-2"
                                                       placeholder="name" value="{{$name['ar']}}"
                                                       required autocomplete/>

                                                <label
                                                    class="required form-label">{{trans('TC_Setting.address')}}
                                                    (<span
                                                        class="text-gray-600">{{trans('forms.lable_en')}}</span>)</label>

                                                <input type="text" name="address_en" class="form-control mb-2"
                                                       placeholder="Address" value="{{$address['en']}}"
                                                       {{-- value="{{$name['en']?? '-'}}---}}
                                                       required autocomplete/>

                                                <label
                                                    class="required form-label">{{trans('TC_Setting.address')}}
                                                    (<span
                                                        class="text-gray-600">{{trans('forms.lable_ar')}}</span>)</label>

                                                <input type="text" name="address_ar" class="form-control mb-2"
                                                       placeholder="العنوان" value="{{$address['ar']}}"
                                                       required autocomplete/>
                                                <label
                                                    class="required form-label">{{trans('TC_Setting.Email')}}
                                                </label>
                                                <input type="text" name="email" class="form-control mb-2"
                                                       placeholder="example@yahoo.com" value="{{$x->email}}"
                                                       required autocomplete/>
                                                <label
                                                    class="required form-label">{{trans('TC_Setting.Phone')}}
                                                </label>
                                                <input type="text" name="phone" class="form-control mb-2"
                                                       placeholder="" value="{{$x->phone}}"
                                                       required autocomplete/>

                                            </div>


                                            <!--end::Button-->

                                            <!--end::Main column-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">
                                                    <span
                                                        class="indicator-label">{{trans('settings.Save Changes')}}</span>
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
@endsection
