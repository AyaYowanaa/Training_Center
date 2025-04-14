@extends('dashbord.layouts.master')

@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">
        <!--begin::Page title-->
        <div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Students: 6</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless  fs-7 my-0 pt-1">
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
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
                <a href="{{route('admin.creat_students')}}"  class="btn btn-primary">
                    <i class="fas fa-plus"></i> add student
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

            <!--begin::Card body-->
            <div class="card-body pt-0">
         <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" style="width: 100%;" id="kt_ecommerce_products_table">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-10px">ID</th>
                        <th class=" min-w-10px">image</th>
                        <th class=" min-w-30px">First Name</th>
                        <th class="  min-w-30px">Last Name</th>
                        <th class="  min-w-50px">Courses &amp; Sessions</th>
                        <th class="  min-w-40px">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600">
                    <tr>
                        <td>
                            <span>1</span>
                        </td>
                        <td>
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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
                            <div class="symbol">
                                <span class="symbol-label" style="background-image:url(https://traineasyv3.intermaticsng.com/tmp/cache/usermedia/student_uploads/2020_12/16069997486_xW9Zuryp6Zd9gtMztTPoW1pK79C03ky1xJuZPCiQ-300x300.jpeg);"></span>
                            </div>
                        </td>
                        <td>
                            <span>ali</span>
                        </td>
                        <td>
                            <span>ahmed</span>
                        </td>
                        <td>
                            <span>java course</span>
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