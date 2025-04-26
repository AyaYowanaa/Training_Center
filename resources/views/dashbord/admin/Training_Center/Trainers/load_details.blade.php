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
        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100 ">
                    <!--begin::Card body-->
                    @if(isImageIfile($one_data->image_url))
                        @php $file_url_dark=$file_url=$one_data->image_url @endphp
                    @else
                        @php $file_url=getDefultImageIfile($one_data->file_url);
                                        $file_url_dark=$file_url['imagedark'];
                                        $file_url=$file_url['image'];
                        @endphp
                    @endif
                    <div
                        class="card-body d-flex justify-content-center text-center flex-column p-8">
                        <!--begin::Name-->
                        <a href="{{$one_data->image_url}}"
                           class="text-gray-800 text-hover-primary d-flex flex-column">
                            <!--begin::Image-->
                            <div class="symbol symbol-75px mb-5">
                                <img src="{{$file_url}}" class="theme-light-show" alt="">
                                <img src="{{$file_url_dark}}" class="theme-dark-show" alt="">

                            </div>
                            <!--end::Image-->

                            <!--begin::Title-->
                            <div class="fs-5 fw-bold mb-2">
                                {{trans('trainingCenter.image')}}
                            </div>
                            <!--end::Title-->
                        </a>
                        <!--end::Name-->

                        <!--begin::Description-->
                        {{-- <div class="fs-7 fw-semibold text-gray-500">
                             7 files
                         </div>--}}
                        <div class="card-toolbar">

                            <a href="javascript:void(0)"
                               class="btn btn-icon btn-sm btn-active-color-primary"
                               onclick="$('#FilePreview').show();$('#FilePreview').attr('src','{{$one_data->image_url}}')"
                               data-bs-toggle="tooltip" title="{{trans('forms.preview')}}"
                               data-bs-dismiss="click">
                                <i class="fas fa-eye  text-info"></i>
                            </a>
                            <a href="{{$one_data->image_url}}" download
                               class="btn btn-icon btn-sm btn-active-color-primary"
                               data-bs-toggle="tooltip" title="{{trans('forms.preview')}}"
                               data-bs-dismiss="click">
                                <i class="fas fa-download  text-warning"></i>
                            </a>
                        </div>

                        <!--end::Description-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>

            @if(isset($one_data->files)&&(!empty($one_data->files)))
                @foreach($one_data->files as $file)
                    @if(isImageIfile($file->file_url))
                        @php $file_url_dark=$file_url=$file->file_url @endphp
                    @else
                        @php $file_url=getDefultImageIfile($file->file_url);
                                        $file_url_dark=$file_url['imagedark'];
                                        $file_url=$file_url['image'];
                        @endphp
                    @endif

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <!--begin::Card-->
                        <div class="card h-100 ">
                            <!--begin::Card body-->
                            <div
                                class="card-body d-flex justify-content-center text-center flex-column p-8">
                                <!--begin::Name-->
                                <a href="{{$file->file_url}}"
                                   class="text-gray-800 text-hover-primary d-flex flex-column">
                                    <!--begin::Image-->
                                    <div class="symbol symbol-75px mb-5">
                                        <img src="{{$file_url}}" class="theme-light-show" alt="">
                                        <img src="{{$file_url_dark}}" class="theme-dark-show" alt="">

                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Title-->
                                   {{-- <div class="fs-5 fw-bold mb-2">
                                        Finance
                                    </div>--}}
                                    <!--end::Title-->
                                </a>
                                <!--end::Name-->

                                <!--begin::Description-->
                                {{-- <div class="fs-7 fw-semibold text-gray-500">
                                     7 files
                                 </div>--}}
                                <div class="card-toolbar">
                                    <a href="{{route('admin.Settings.Instructor.destroy_file',$file->id)}}"
                                       class="btn btn-icon btn-sm btn-active-color-primary"
                                       data-kt-card-action="remove"
                                       data-kt-card-confirm="true"
                                       data-kt-card-confirm-message="{{trans('forms.delete_quetion')}}"
                                       data-kt-card-confirm-ButtonText="{{trans('forms.delete_btn')}}"
                                       data-bs-toggle="tooltip" title="Remove card"
                                       data-bs-dismiss="click">
                                        <i class="fas fa-trash  text-danger"></i>
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="btn btn-icon btn-sm btn-active-color-primary"
                                       onclick="$('#FilePreview').show();$('#FilePreview').attr('src','{{$file->file_url}}')"
                                       data-bs-toggle="tooltip" title="{{trans('forms.preview')}}"
                                       data-bs-dismiss="click">
                                        <i class="fas fa-eye  text-info"></i>
                                    </a>
                                    <a href="{{$file->file_url}}" download
                                       class="btn btn-icon btn-sm btn-active-color-primary"
                                       data-bs-toggle="tooltip" title="{{trans('forms.preview')}}"
                                       data-bs-dismiss="click">
                                        <i class="fas fa-download  text-warning"></i>
                                    </a>
                                </div>

                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                @endforeach
            @endif


            <iframe id="FilePreview" src="" style="width: 100%; display: none" height="800px" >

            </iframe>

        </div>


    </div>
    <!--end::Body-->
</div>


