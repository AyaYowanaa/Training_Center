@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('diploma.Levels')}}</h1>
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
                    {{trans('Toolbar.Diploma')}}
                </li>
                  <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.Levels')}}
                </li>



            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
  
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
@endsection

@section('content')

    <div id="kt_app_content_container" class="app-container container-xxxl">

        <div class="card card-flush">

            <div class="card-body pt-0">
<div class="mt-5">

<form action="{{ route('admin.TrainingCenter.Diploma.addlevel') }}" method="POST" class="mb-10">
    @csrf
    <input type="hidden" name="diploma_id" value="{{ $one_data->id }}">

    <div class="row g-4">
        
        <div class="col-md-6">
            <label class="required form-label">{{ trans('diploma.Name') }}</label>
            <input type="text" name="level_name" class="form-control @error('level_name') is-invalid @enderror"
                   placeholder="{{ trans('diploma.Name') }}" value="{{ old('level_name') }}" />
            @error('level_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label class="required form-label">{{ trans('diploma.Duration-days') }}</label>
            <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror"
                   placeholder="{{ trans('diploma.Duration-days') }}" value="{{ old('duration') }}" />
            @error('duration')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
         <div class="col-md-6">
            <label class="form-label">{{ trans('diploma.Price') }}</label>
            <input type="text" name="level_price" readonly  class="form-control @error('level_price') is-invalid @enderror"
                id="level_price"   placeholder="{{ trans('diploma.Duration-days') }}" value="{{ old('level_price') }}" />
            @error('level_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- الدرجة -->
        <div class="col-md-6">
            <label class="required form-label">{{ trans('diploma.Pass_Mark') }}</label>
            <input type="text" name="pass_mark" min="1" class="form-control @error('pass_mark') is-invalid @enderror"
                   placeholder="{{ trans('diploma.pass_mark') }}" value="{{ old('pass_mark') }}" />
            @error('pass_mark')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

          <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-success px-4">
                <i class="fas fa-plus"></i> {{ trans('diploma.Save') }}
            </button>
        </div>
    </div>
</form>
</div>

            

<!--/********************************************************************************************** -->
                <table class="table align-middle table-row-dashed fs-6 gy-3"
                       id="data">
                    <thead>
                    <tr class="fw-semibold fs-6 text-gray-800">
                        <th>{{trans('diploma.ID')}}</th>
                        <th>{{trans('diploma.Name')}}</th>
                        <th>{{trans('diploma.Price')}}</th>
                        <th>{{trans('diploma.Pass_Mark')}}</th>
                        <th>{{trans('diploma.Duration')}}</th>

                        <th>{{trans('forms.Action')}}</th>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>

    </div>

    <!-- Modal --->
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{trans('diploma.details')}}</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" id="load_div">


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script>
        // Class definition
        var KTDatatablesServerSide = function () {
            // Shared variables
            var table;
            var dt;
            var filterPayment;

            // Private functions
            var initDatatable = function () {
                dt = $('#data').DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    ajax: {
                        url: "{{route('admin.TrainingCenter.Diploma.getlevel')}}",
                        data: function (d) {
                       
                            d.diploma_id = {{$one_data->id}};

                        }
                       //  data: { diploma_id: 2 },
                    },
                    
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'level_name', name: 'level_name'},
                        {data: 'level_price', name: 'level_price'},
                        {data: 'pass_mark', name: 'pass_mark'},
                        {data: 'duration', name: 'duration'},

                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']],

                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function () {
                    KTMenu.createInstances();
                });
            }
            // Delete customer
            var handleDeleteRows = function () {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Select all delete buttons
                /*   const deleteButtons = document.querySelectorAll('[data-kt-table-delete="delete_row"]');

                   deleteButtons.forEach(d => {
                       // Delete button on click
                       d.addEventListener('click', function (e) {
                           e.preventDefault();*/
                KTUtil.on(document.body, '[data-kt-table-delete="delete_row"]', 'click', function (e) {
                    e.preventDefault();
                    // Select parent row
                    const parent = e.target.closest('tr');
                    var action = e.target.getAttribute('href'); // Use 'this' instead of 'e'
                    console.log('action', action)
                    // Get customer name
                    const customerName = parent.querySelectorAll('td')[1].innerText;
                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "{{trans('forms.delete')}}?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "{{trans('forms.delete_btn')}}",
                        cancelButtonText: "{{trans('forms.action_no')}}",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function (result) {
                        if (result.value) {
                           Swal.fire({
    imageUrl: 'https://media.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif',
    imageWidth: 200,
    imageHeight: 200,
    buttonsStyling: false,
    showConfirmButton: false,
    timer: 2000,
    allowOutsideClick: false,
    allowEscapeKey: false
}).then(function () {


                                if (action) {
                                    fetch(action, {
                                        method: 'DELETE', // or 'GET', 'POST', etc. depending on your server setup
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': csrfToken,

                                            // Add any additional headers if needed
                                        },
                                        // You can add body if needed, e.g., JSON.stringify({ key: 'value' })
                                    })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json(); // or response.text() or response.blob(), etc.
                                        })
                                        .then(data => {
                                            // Handle the response data if needed
                                            Swal.fire({
                                                text: "{{trans('forms.Delete')}}",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText: "{{trans('forms.action_done')}}",

                                                customClass: {
                                                    confirmButton: "btn fw-bold btn-primary",
                                                }
                                            }).then(function () {
                                                // delete row data from server and re-draw datatable
                                                dt.draw();
                                            });
                                        })
                                        .catch(error => {
                                            console.error('There was a problem with the fetch operation:', error);
                                        });
                                }


                            });
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: " {{trans('forms.Delete')}}",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "{{trans('forms.action_done')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                });

                /* })
             });*/

            }


            var handleDetailsRows = function () {

                KTUtil.on(document.body, '[data-kt-table-details="details_row"]', 'click', function (e) {
                    var id = e.target.getAttribute('data-id');
                    var action = e.target.getAttribute('data-url');
                    $.ajax({
                        type: 'get',
                        url: action,
                        beforeSend: function () {
                            const loadingEl = document.createElement("div");
                            document.getElementById('kt_modal_1').prepend(loadingEl);
                            loadingEl.classList.add("page-loader");
                            loadingEl.classList.add("flex-column");
                            loadingEl.classList.add("bg-dark");
                            loadingEl.classList.add("bg-opacity-25");
                            loadingEl.innerHTML = `
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-gray-800 fs-6 fw-semibold mt-5">{{trans('forms.Loading')}}</span>`;
                            // Show page loading
                            KTApp.showPageLoading();
                        },

                        success: function (resb) {
                            KTApp.hidePageLoading();
                            // loadingEl.remove();
                            $('#load_div').html(resb);

                        }
                    });
                });
            }


            // Public methods
            return {
                init: function () {
                    initDatatable();
                    handleDeleteRows();
                    handleDetailsRows();
                }
            }
        }();
        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTDatatablesServerSide.init();
        });
    </script>


@endsection
