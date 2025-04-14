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
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->title}}</td>
                    </tr>
               {{--      <tr>
                        <td>{{ trans('trainingCenter.courses') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->coursesData->name}}</td>
                    </tr> --}}
                  
                    <tr>
                        <td>{{ trans('trainingCenter.Duration') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->duration}} Days</td>
                    </tr>
                    <tr>
                        <td>{{ trans('trainingCenter.Fees') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->fee}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('trainingCenter.From_Date') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->from_date}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('trainingCenter.To_Date') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->to_date}}</td>
                    </tr>
                    
                    <tr>
                        <td>{{ trans('trainingCenter.Capacity') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->capacity}} Student</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>


