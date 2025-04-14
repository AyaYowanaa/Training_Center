@extends('dashbord.layouts.master')

@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">
        <!--begin::Page title-->
        <div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">  all courses</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless   fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        {{trans('Toolbar.home')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet text-muted w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.UserManagement.users.index') }}" class="text-muted text-hover-primary">{{trans('Toolbar.users')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet text-muted w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.UserManagement.users.create') }}" class="text-muted text-hover-primary">{{trans('users.create')}}</a>
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->


        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.creat_courses')}}"  class="btn btn-primary">
                    <i class="fas fa-plus"></i> add course
                    <!--end::Svg Icon-->
                </a>
            </div>


        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
@endsection

@section('content')
    <div id="kt_app_content_container" class="app-container  container-fluid ">
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>
                        <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->

            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-10px">id</th>
                         <th class="min-w-20px">Course Name</th>
                        <th class="min-w-100px">Course Specialization</th>
                        <th class="min-w-80px">start date </th>
                        <th class="min-w-80px">Course duration</th>
                        <th class="min-w-80px">Course cost</th>
                        <th class="min-w-50px">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600">
                    <tr>
                        <td>
                            <span>1</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>2</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>3</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>4</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>5</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>6</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>7</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>8</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>9</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>10</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>11</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span>12</span>
                        </td>
                        <td>
                            <span >programming</span>
                        </td>

                        <td>
                            <span >java</span>
                        </td>
                        <td>
                            <span>20-5-2025</span>
                        </td>
                        <td>
                            <span >3 months</span>
                        </td>
                        <td>
                            <span >2500 AED</span>
                        </td>
                        <td>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-edit"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="View" type="button" class="btn btn-xs btn-primary   btntable" aria-label="View" data-bs-original-title="View"><i class="fa fa-eye"></i></button>

                            <button data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Delete" type="button" class="btn btn-xs btn-primary   btntable" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-trash"></i></button>
                        </td>

                    </tr>

                    </tbody>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>

    </div>

@endsection

@section('css')

@endsection

@section('js')

@endsection