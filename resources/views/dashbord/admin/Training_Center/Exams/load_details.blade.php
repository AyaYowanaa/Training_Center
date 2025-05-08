<div class="card">
    <!--begin::Body-->
    <div class="card-body p-lg-10 pb-lg-0">
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
                        <td>{{ trans('trainingCenter.courses') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->coursesData->title}}</td>
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


