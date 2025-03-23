@extends('dashbord.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('dash_site.Main Data')}}</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('admin.dashboard')}}"
                       class="text-muted text-hover-primary">{{trans('dash_site.home')}}</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{trans('dash_site.siteData')}}</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{trans('dash_site.maindata')}}</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>

    </div>
    <!--end::Toolbar container-->
@endsection

@section('content')

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxxl">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{route('admin.mdata.store')}}"
              class="form d-flex flex-column flex-lg-row"
              id="mainform" enctype="multipart/form-data">
            @csrf
            @php $mdata=optional($mdata); @endphp


            @if(isset($mdata))
                <input name="id" value="{{$mdata->id}}" type="hidden">
        @endif
        <!--begin::Aside column-->
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!--begin::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 style="text-align:center">{{trans('dash_site.Logo Image')}}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <!--begin::Image input placeholder-->
                        <style>.image-input-placeholder {
                                background-image: url('{{asset($mdata['image']? $mdata['image']:'assets/media/avatars/blank.png')}}');
                            }

                            [data-bs-theme="dark"] .image-input-placeholder {
                                background-image: url('{{asset($mdata['image']? $mdata['image']:'assets/media/avatars/blank.png')}}');
                            }</style>

                        <div
                            class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                            data-kt-image-input="true">
                            <div class="image-input-wrapper w-150px h-150px"></div>
                            <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                title="Change avatar">
                                <i class="fa fa-pencil ">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="file" name="image" id="image"
                                       value="{{old('image',$mdata->image)}}" accept=".png, .jpg, .jpeg"/>
                                <input type="hidden" name="avatar_remove"/>
                            </label>

                            <span
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                title="Cancel image">
															<i class="ki-duotone ki-cross fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>

                            <span
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                title="Remove image">
															<i class="ki-duotone ki-cross fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                            <!--end::Remove-->
                            
                        </div>
                        <!--end::Image input-->
                        <div class="mb-5 mt-10">
                            <!--begin::Label-->
                            <label class="form-label">{{trans('dash_site.logo_footer')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" multiple
                                   class="form-control mb-2  @error('logo_footer') is-invalid @enderror"
                                   name="logo_footer"
                                   accept=".png, .jpg, .jpeg" placeholder="Meta tag name"/>
                            <!--end::Input-->
                            @error('logo_footer')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--begin::Status-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{trans('dash_site.Contacts')}}</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <div class="rounded-circle  w-15px h-15px"
                                 id="kt_ecommerce_add_category_status"></div>
                        </div>
                        <!--begin::Card toolbar-->
                    </div>
                    <!--end::Card header-->


                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="form-label"> {{trans('dash_site.Fax')}}</label>
                            <input type="text" name="fax" id="fax" class="form-control mb-2"
                                   placeholder=" fax " value="{{old('fax',$mdata->fax)}}"/>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="form-label"> {{trans('dash_site.Phone')}}</label>
                            <input type="text" name="phone" id="phone" class="form-control mb-2"
                                   placeholder=" Phone " value="{{old('phone',$mdata->phone)}}"/>
                        </div>

                    </div>
                    <!--end::Card body-->

                </div>


                <!--end::Status--> <!--begin::Status-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{trans('dash_site.Social_media_data')}}</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <div class="rounded-circle  w-15px h-15px"
                                 id="kt_ecommerce_add_category_status"></div>
                        </div>
                        <!--begin::Card toolbar-->
                    </div>
                    <!--end::Card header-->


                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="form-label"> {{trans('dash_site.whatsapp')}}</label>
                            <input type="tel" name="whatsapp" id="whatsapp" class="form-control mb-2"
                                   placeholder=" {{trans('dash_site.whatsapp')}} "
                                   value="{{old('whatsapp',$mdata->whatsapp)}}"/>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="form-label"> {{trans('dash_site.twitter')}}</label>
                            <input type="text" name="twitter" id="twitter" class="form-control mb-2"
                                   placeholder=" {{trans('dash_site.twitter')}} "
                                   value="{{old('twitter',$mdata->twitter)}}"/>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="form-label"> {{trans('dash_site.snabchat')}}</label>
                            <input type="tel" name="snabchat" id="snabchat" class="form-control mb-2"
                                   placeholder=" {{trans('dash_site.snabchat')}} "
                                   value="{{old('snabchat',$mdata->snabchat)}}"/>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="form-label"> {{trans('dash_site.YouTube')}}</label>
                            <input type="text" name="YouTube" id="YouTube" class="form-control mb-2"
                                   placeholder=" {{trans('dash_site.YouTube')}} "
                                   value="{{old('YouTube',$mdata->YouTube)}}"/>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="form-label"> {{trans('dash_site.Instagram')}}</label>
                            <input type="tel" name="Instagram" id="Instagram" class="form-control mb-2"
                                   placeholder=" {{trans('dash_site.Instagram')}} "
                                   value="{{old('Instagram',$mdata->Instagram)}}"/>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="form-label"> {{trans('dash_site.Facebook')}}</label>
                            <input type="text" name="Facebook" id="Facebook" class="form-control mb-2"
                                   placeholder=" {{trans('dash_site.Facebook')}} "
                                   value="{{old('Facebook',$mdata->Facebook)}}"/>
                        </div>

                    </div>
                    <!--end::Card body-->

                </div>


                <!--end::Status-->

            </div>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2> {{trans('dash_site.General')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <?php
                        // dd($mdata);
                        $name = optional($mdata->getTranslations('name'));
                        $short_about = optional($mdata->getTranslations('short_about'));
                        $address = optional($mdata->getTranslations('address'));
                        ?>
                        <div class="mb-10 fv-row arabic">
                            <label for="name_ar"
                                   class="form-label"> {{trans('dash_site.Company Name')}}</label>
                            <span
                                class="text-muted">({{ trans('forms.lable_ar') }})</span>
                            <input type="text" name="name_ar" id="name" class="form-control mb-2"
                                   placeholder="اسم الشركه" value="{{old('name_ar',$name['ar'])}}"/>
                        </div>
                        <div class="mb-10 fv-row english">
                            <label for="name_en"
                                   class="form-label"> {{trans('dash_site.Company Name')}}</label>
                            <span
                                class="text-muted">({{ trans('forms.lable_en') }})</span>
                            <input type="text" name="name_en" id="name" class="form-control mb-2"
                                   placeholder="Company name" value="{{old('name_en',$name['en'])}}"/>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="form-label">{{trans('dash_site.Email')}} </label>
                            <input type="text" name="email" id="email" class="form-control mb-2"
                                   placeholder=" Email " value="{{old('email',$mdata->email)}}"/>
                        </div>
                        <div class="mb-10 fv-row arabic">
                            <label for="address_ar"
                                   class="form-label">{{trans('dash_site.Address')}}</label>
                            <span
                                class="text-muted">({{ trans('forms.lable_ar') }})</span>
                            <input type="text" name="address_ar" id="address" class="form-control mb-2"
                                   placeholder=" العنوان "
                                   value="{{old('address_ar',$address['ar'])}}"/>
                        </div>
                        <div class="mb-10 fv-row english">
                            <label for=address_en
                                   class="form-label">{{trans('dash_site.Address')}}</label>
                            <span class="text-muted">({{ trans('forms.lable_en') }})</span>
                            <input type="text" name="address_en" id="address" class="form-control mb-2"
                                   placeholder=" Address "
                                   value="{{old('address_en',$address['en'])}}"/>
                        </div>
                        <div class="mb-10 fv-row">
                            <label for=video
                                   class="form-label">{{trans('dash_site.video')}}</label>
                            <input type="text" name="video" id="video" class="form-control mb-2"
                                   placeholder=" video "
                                   value="{{old('video',$mdata->video)}}"/>
                        </div>
                       
                        <!--begin::Label-->
                        <label for=description_ar
                               class="form-label">{{trans('dash_site.short_about')}}</label>
                        <span class="text-muted">({{ trans('forms.lable_ar') }})</span>
                        <div class="text-muted fs-7 arabic">
                                            <textarea name="short_about_ar"
                                                      class="form-control form-control form-control-solid"
                                                      rows="2"
                                                      placeholder="اكتب رسالـه">{{old('short_about_ar',$short_about['ar'])}}</textarea>
                        </div>


                        <!--begin::Label-->
                        <label for=description_en
                               class="form-label">{{trans('dash_site.short_about')}}</label>
                        <span class="text-muted">({{ trans('forms.lable_en') }})</span>
                        <div class="text-muted fs-7 english">
                                            <textarea name="short_about_en"
                                                      class="form-control form-control form-control-solid"
                                                      rows="2"
                                                      placeholder="Type a message">{{old('short_about_en',$short_about['en'])}}</textarea>
                        </div>

                        <br>
                        <!--begin::Label-->
                        <label class="form-label">{{trans('dash_site.Map_Location')}}</label>
                        <!--end::Label-->
                        <div class="text-muted fs-7">
         <textarea name="maplocation"
                class="form-control form-control form-control-solid"
                rows="2" placeholder="">{{old('maplocation',$mdata->maplocation)}}</textarea></div>
                        @if(!empty($mdata->maplocation))
                            <div class="mb-10 fv-row">
                                <label
                                    class="form-label">{{trans('dash_site.Location on Map')}}</label>

                                <div>
                                    {{$mdata->maplocation}}
                                </div>
                            </div>
                    @endif

                    <!--end::Input group-->

                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::General options-->


                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <button type="reset" id="kt_ecommerce_add_category_submit"
                            class="btn btn-primary"
                            style="margin-right: 5%;background-color: rgba(169, 169, 169, 0.959)">
                        <span class="indicator-label">{{trans('forms.reset')}}</span>

                    </button>

                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                        <span class="indicator-label">{{trans('dash_site.Save')}}</span>
                        <span class="indicator-progress">{{trans('dash_site.Please wait...')}}
													<span
                                                        class="spinner-border spinner-border-sm align-middle ms-2">
                                                    </span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Main column-->
        </form>
    </div>
    <!--end::Content container-->

@endsection
@section('js')

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Site\MainRequest', '#mainform') !!}
@endsection



