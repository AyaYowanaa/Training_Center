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
                        <td>{{ trans('trainingCenter.Entity') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->entityData->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('trainingCenter.Course') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->coursesData->title}}</td>
                    </tr> 
                  
                    <tr>
                        <td>{{ trans('trainingCenter.Price') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->amount}}</td>
                    </tr>
                         <tr>
                        <td>{{ trans('trainingCenter.Remain_balance') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->balance}}</td>

                    </tr>
                    <tr>
                        <td>{{ trans('trainingCenter.Date') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->date}}</td>
                    </tr>
               
                      <tr>
                        <td>{{ trans('trainingCenter.Invoice_type') }}</td>
                        <td class="fs-6 fw-semibold text-dark">{{$one_data->status}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>


