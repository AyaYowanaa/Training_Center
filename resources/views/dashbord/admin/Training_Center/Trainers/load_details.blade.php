<div class="card">
    <!--begin::Body-->
    <div class="card-body p-lg-10 pb-lg-0">
        <div class="mb-8">
            <!--begin::Container-->
            <div class="overlay mt-0">
                <!--begin::Image-->
                <div
                    class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-325px"
                    style="background-image:url('{{$one_data->image}}')"></div>
           
            </div>
            <!--end::Container-->
        </div>
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>{{ trans('trainingCenter.attribute') }}</th>
                        <th>{{ trans('trainingCenter.value') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ trans('trainingCenter.name') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->name}}</td>
                    </tr>
               
                    <tr>
                        <td>{{ trans('trainingCenter.code') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->code}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('trainingCenter.phone') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->phone}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('trainingCenter.email') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->email}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>


