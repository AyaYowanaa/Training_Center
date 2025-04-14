"use strict";

// Class definition
var KTAppEcommerceProducts = (function () {
    var table;
    var datatable;

    var initDatatable = function () {
        datatable = $(table).DataTable({
            info: false,
            order: [],
            pageLength: 10,
            responsive: true,
            autoWidth: false,
            columnDefs: [
                { orderable: false, targets: 0 },
                { orderable: false, targets: 5 },
            ],
            drawCallback: function () {
                var wrapper = table.closest('.dataTables_wrapper');
                $(wrapper).find('.dataTables_paginate').css({
                    display: 'flex',
                    justifyContent: 'center',
                    marginTop: '20px',
                    width: '100%'
                });
            }
        });

        datatable.on('draw', function () {
            handleDeleteRows();
        });
    };

    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-ecommerce-product-filter="search"]');
        if (filterSearch) {
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }
    };

    var handleStatusFilter = function () {
        const filterStatus = document.querySelector('[data-kt-ecommerce-product-filter="status"]');
        if (filterStatus) {
            $(filterStatus).on('change', function (e) {
                var value = e.target.value;
                datatable.search(value === 'all' ? '' : value).draw();
            });
        }
    };

    var handleDeleteRows = function () {
        const deleteButtons = table.querySelectorAll('[aria-label="Delete"]');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const row = e.target.closest('tr');
                const productName = row.querySelector('td:nth-child(3) span').innerText + " " + row.querySelector('td:nth-child(4) span').innerText;

                Swal.fire({
                    text: `Are you sure you want to delete ${productName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.isConfirmed) {
                        Swal.fire({
                            text: `You have deleted ${productName}!`,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then(function () {
                            datatable.row($(row)).remove().draw();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            text: `${productName} was not deleted.`,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        });
                    }
                });
            });
        });
    };

    return {
        init: function () {
            table = document.querySelector('#kt_ecommerce_products_table');
            if (!table) {
                return;
            }

            initDatatable();
            handleSearchDatatable();
            handleStatusFilter();
            handleDeleteRows();
        }
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceProducts.init();
});
