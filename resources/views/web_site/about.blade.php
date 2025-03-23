@extends('web_site.layouts.master')
@section('content')

<section class="breadcrumb-header style-2" id="page" 
style="background-image: url({{asset('assets_web/img/page-baner/about.jpg')}})">
    <div class="overlayin"></div>
    <div class="container">
       <div class="row justify-content">
            <div class="col-md-8">
                <div class="banner">
                    <h1>{{trans('web_site.About_Us')}}</h1>
                 </div>
            </div>
        </div>
    </div>
</section>

<!---- :: About Us -------------->
             <section class="about-us home-3 bck1">
                <div class="container c-relative">
                    @if (isset($about) && (!empty($about)))
                    @foreach ($about as $item)
                   <div class="row align-items-center column-reverse">
                    @if (!empty($item->Image))
                    @php
                    $Image_path = Storage::disk('images')->url($item->Image);
                    $img_url = asset((Storage::disk('images')->exists($item->Image)) ? $image_path :'assets/images/blank.png');
                    @endphp
                @else
                    @php $img_url = asset('assets/images/blank.png'); @endphp
                @endif 
                         <div class="col-lg-6 col-md-6"  data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
                           <div class="about-us-text-box">
                               <div class="sec-title home-3">

                                   <h2>{{$item->MainAddress}}</h2>
                                   <h3>{{$item->SecondAddress}}</h3>
                                   <p class="text">{!! $item->Details !!} </p>

                               </div>
                                
                           </div>
                       </div>
                       <div class="col-lg-6 col-md-6"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
                            <div class="about-us-img-box">
                               <div class="img-box" style="background-image: url({{$item->Image}})"></div>
                           </div>
                       </div>
                   </div>
                   @endforeach
                   
              @endif
               </div>
           </section>
            
           
@endsection