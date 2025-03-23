<style>
    .google-map iframe{
        width: 100% !important;
    }
</style>
<?php

?>
@extends('web_site.layouts.master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <section class="breadcrumb-header style-2" id="page"
             style="background-image: url({{asset('assets_web/img/page-baner/project.webp')}})">
        <div class="overlayin"></div>
        <div class="container">
            <div class="row justify-content">
                <div class="col-md-8">
                    <div class="banner">
                        <h1> <?= trans('web_site.Project_Details') ?> </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- :: news details -->
    <div class="single-blog-page py-100-70 bck">
        <div class="container" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
            <div class="row justify-content">
                <div class="col-lg-10">
                    <div class="blog-details">
                        <div class="newsdetail-carousel owl-carousel owl-theme">
                            @if (isset($one_data->eventImgaes) && (!empty($one_data->eventImgaes)))
                                @foreach ($one_data->eventImgaes as $key => $img)
                                    <?php   $img_url = $img->image;   ?>
                                    <div class="img-newsdetail" style="background-image: url({{$img_url}})">
                                    </div>

                                @endforeach
                            @endif
                        </div>
 </div>
</div>

<div class="col-lg-10 direction">
                        <div class="text-box">
                            <h3 class="protitle">{{$one_data->eventTitle}}</h3>
                            <div class="mb-4">
                                <h3 class="feattitle">{{trans('web_site.Project_Description')}}:-</h3>
                                <p>{!! $one_data->eventDetails !!}</p>
                            </div>

                          </div>

 
                    
                     </div>
                      </div>

<div class="row mb-4 justify-content direction">
<div class="col-lg-5">
<div class="text-box"> 
  <div class="mb-4">
                                <h3 class="feattitle">{{trans('web_site.Project_details')}}:-</h3>
                                {{--                    <p><span class="prodet"> Business type: </span> Villa</p>--}}
                                <p><span class="prodet"> Location: </span>{{$one_data->eventLocation}} </p>
                                {{--                    <p><span class="prodet">Implementation period:   </span> 2 years</p>--}}
                                <!--<p><span
                                        class="prodet"> {{trans('web_site.Implementation_date')}}: </span> {{$one_data->eventDate}}
                                </p>-->
                                <p><span class="prodet">{{trans('web_site.city')}}:  </span> {{$one_data->city}}</p>
                                <p><span class="prodet">{{trans('web_site.district')}}:  </span> {{$one_data->district}}
                                </p>
                            </div>

                            
   </div>

  </div>
<style>
   iframe{
     width="100%" ;
     height="257" ; 
   } 
</style>
<div class="col-lg-5">
<div class="text-box">
  <!-- :: Map -->
  @if(!empty($one_data->eventLocationMap))
                        <div class="map-box google-map">
                            {!! $one_data->eventLocationMap !!}
                            <!-- <iframe width="100%" height="257" id="gmap_canvas" src="{{$one_data->eventLocationMap}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>-->
                        </div>
                        @endif
</div>

  </div>

</div>


<div class="row justify-content direction">
<div class="col-lg-10">
<div class="text-box">
                     <div class="mb-4">
                                <h3 class="feattitle">{{trans('web_site.features')}}:-</h3>
                                <div>
                                    {!! $one_data->eventFeatures !!}
                                </div>
                            </div>


                        </div>

  </div>

</div>




               
            
        </div>
    </div>


@endsection
