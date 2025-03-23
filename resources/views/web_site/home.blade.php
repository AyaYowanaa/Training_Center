@extends('web_site.layouts.master')
@section('content')
    @php
        $mainData=getMainData();
    @endphp
    {{-- {{dd($banners)}} --}}
    <!-- :: Header -------------------------------------------------------------------------->
    <section class="header" id="page">
        @if (isset($banners) && (!empty($banners)))
            <div class="header-carousel owl-carousel owl-theme">


                @foreach ($banners as $item)
                    @if (!empty($item->image))
                        @php
                            $img_url = $item->image;
                        @endphp
                    @else
                        @php $img_url = asset('assets/images/blank.png'); @endphp
                    @endif
                    <div class="sec-hero display-table" style="background-image: url({{$img_url}})">
                        <div class="table-cell">
                            <div class="overlay"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="banner">
                                            <div class="top-handline">{{$item->title}}</div>
                                            <h1 class="handline">{{$item->sub_title}}</h1>
                                            <div class="btn-box">
                                                <a class="btn-1 "
                                                   href="{{route('projects')}}"><span><?= trans('web_site.Our_Projects') ?></span></a>
                                                <a class="btn-1 btn-2 ml-30"
                                                   href="{{route('contact_us')}}"><span><?= trans('web_site.Contact_Us') ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @endif

    </section>




    <!-- :: About Us --------------------------------------------------------------------------->

    @if (isset($about) && (!empty($about)))
        <section class="about-us home-3 bck1">
            <div class="container c-relative">
                <div class="row align-items-center column-reverse">

                    <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
                        <div class="about-us-text-box">
                            <div class="sec-title home-3">
                                <h2>{{trans('web_site.About_Us')}}</h2>
                                <h3>{{$about->MainAddress}}</h3>
                                <p class="sec-explain">{!! $about->Details !!} </p>

                            </div>

                            <div class="about-btn">
                                <a href="{{route('about_us')}}"
                                   class="btn-1 btn-3"><span>{{trans('web_site.More_About_Us')}}</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6" data-aos="fade-down" data-aos-easing="linear"
                         data-aos-duration="900">
                        <div class="about-us-img-box">
                            <div class="img-box" style="background-image: url({{$about->Image}})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif
    @if(isset($projects)&&(!empty($projects)))
        <!-- :: New developments ---------------------------------------------------------------------------->
        <div class="our-services bck">
            <div class="container c-relative" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
                <div class="sec-title">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>{{trans('web_site.projects')}}</h2>
                            <h3>{{trans('web_site.projects_tile')}}</h3>
                        </div>

                    </div>
                </div>

                <div class="row">
                    @foreach($projects as $project)
                    <div class="col-md-4 mb-30">
                        <div class="serv-box">
                            <div class="back-serv"
                                 style="background-image: url({{$project->eventImage}})">
                            </div>
                        </div>
                        <div class="div-pro">
                            <a href="{{route('one_project',$project->IEvent)}}" class="pro-title"><h3>{{$project->eventTitle}}</h3></a>
                            <span class="span-pro">{{$project->city}}-{{$project->district}}</span>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-md-12 text-center ">
                        <a href="{{route('projects')}}" class="btn-1 btn-3"><span>{{trans('web_site.all_projects')}} </span> </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (isset($advantages) && (!empty($advantages)))

        <!---- :: why choose us---------------------------------------------------------->
    <section class="services home-2 home-3 py-100-70 back1">
        <div class="container" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
            <div class="sec-title">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>{{trans('advantages.why_choose_us')}}</h2>
                        <h3>{{trans('advantages.Where_happiness_lives')}}</h3>
                    </div>

                </div>
            </div>

            <div class="row">
                    @foreach ($advantages as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="item-box">
                                <span></span>
                                <i class="fas {{$item->icon}}"></i>
                                <div class="content-box">
                                    <h4>{{$item->title}}</h4>
                                    <p>{!! $item->description !!} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </section>
    @endif
    @if (isset($statistics) && (!empty($statistics)))

    <!--- :: counter ---------------------------------------------------------------->
    <section class="counter-style-three" style="background-image: url({{asset('assets_web/img/Cover.png')}});">
        <div class="overlayc overlay-counter"></div>
        <div class="container">
            <div class="sec-title">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>{{trans('statistics.awards_and_recognition')}}</h2>
                        <h3>{{trans('statistics.Merits_we_have_earned')}}</h3>
                    </div>

                </div>
            </div>
            <div class="row">
                    @foreach ($statistics as $item)
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">

                            <div class="inner-box" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="300">
                                <div class="layer-bg"
                                     style="background-image: url({{asset('assets_web/img/pattern-25.png')}});"></div>
                                <div class="count-outer count-box">
                                    <span class="count-text counter statistic-counter">{{$item->number}}</span>
                                </div>
                                <div class="text">{{$item->title}}</div>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </section>
    @endif
    @if (isset($blogs) && (!empty($blogs)))

    <!--:: News ----------------------------------------------------------------------->
    <section class="blog back1">
        <div class="container" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
            <div class="sec-title">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>{{trans('web_site.from_our_blog')}}</h2>
                        <h3>{{trans('web_site.News_and_Events')}}</h3>
                    </div>

                </div>
            </div>


                <div class="row">
                    @foreach ($blogs as $item)


                        <div class="col-md-6 col-lg-4">
                            <div class="blog-item">
                                <div class="img-box">
                                    <a href="#" class="open-post">
                                        <div class="Blog-bck img-fluid"
                                             style="background-image: url(<?= $item->blogImage ?>)"></div>
                                    </a>
                                    <ul>
                                        <li><i class="fas fa-calendar-alt"></i>{{$item->blogDate}}</li>
                                    </ul>
                                </div>
                                <div class="text-box">
                                    <a href="{{route('one_blog',$item->IBlog)}}" class="title-blog">
                                        <h5><?= $item->blogTitle ?></h5>
                                    </a>
                                    <p>
                                        {{\Illuminate\Support\Str::words(strip_tags($item->blogDetails), 30, '...')}}
                                    </p>
                                    <a href="{{route('one_blog',$item->IBlog)}}"
                                       class="link-more"><span>{{trans('web_site.Read_more')}}</span></a>
                                </div>
                            </div>
                        </div>

                    @endforeach


                    <div class="col-md-12 text-center ">
                        <a href="{{route('blogs')}}" class="btn-1 btn-3"><span>
                                    {{trans('web_site.view_all_news')}}</span> </a>
                    </div>
                </div>
        </div>
    </section>
    @endif
    @if (isset($feedback) && (!empty($feedback)))
{{--{{dd($feedback)}}--}}
    <!-- :: feedbackback --------------------------------------------------------------->
    <section class="testimonial py-100 bck1">
        <div class="container c-relative" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
            <div class="sec-title text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{trans('feedback.impression')}}</h2>
                        <h3>{{trans('feedback.Customer_feedback')}}</h3>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="testimonial-carousel owl-carousel owl-theme">
                        @foreach ($feedback as $item)
                            <div class="item-box inner-box">


                                {{--  @if (!empty($item->Image))
                             --   @php
                                  $image_path = Storage::disk('images')->url($item->Image);

                                  $img_url = asset((Storage::disk('images')->exists($item->Image)) ? $image_path :'assets/images/blank.png');
                                  @endphp
                              @else
                                  @php $img_url = asset('assets/images/blank.png'); @endphp

                              @endif
                              --}}
                                <img class="img-says" src="{{$item->Image}}">


                                <div class="text-box">{!! $item->feedback !!}</div>
                                <div class="item-name text-center">
                                    <i class="ar-icons-right-quote"></i>
                                    <h5> {{$item->name}}</h5>
                                    <span>{{$item->jop_title}}</span>

                                </div>
                            </div>

                        @endforeach
                </div>
            </div>

        </div>

    </section>
    @endif
    @if (isset($partner) && (!empty($partner)))

    <!-- :: clients ----------------------------------------------------------------------->
    <div class="sponsors" style="background-image: url({{asset('assets_web/img/bg-7.png')}})">
        <div class="container" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
            <div class="sec-title">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>{{trans('partner.trust_us')}}</h2>
                        <h3>{{trans('partner.our_clients')}}</h3>
                    </div>
                </div>
            </div>
            <div class="sponsors-carousel owl-carousel owl-theme">
                    @foreach ($partner as $item)
                        <div class="sponsors-box-item client-box">

                            <a href="{{$item->link}}">
                                <div class="img-fluid client-bck" style="background-image: url('{{$item->Image}}');"
                                     alt="clients"></div>
                            </a>

                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------------------------->
    @endif

    <section class="lastsec" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
        <div class="container">
            <!-- :: Get Update -->
            <div class="get-update">
                <div class="row">
                    <div class="col-lg-4">
                        <h5>{{trans('web_site.text1')}} <span>{{trans('web_site.Free')}}</span> {{trans('web_site.text2')}}</h5>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                        <div class="phone">
                            <a href="tel:{{$mainData->phone}}" class="pulse">
                                <i class="ar-icons-phone"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-center justify-content-between">
                        <div>
                            <a class="phone-mail" href="tel:{{$mainData->phone}}">{{$mainData->phone}}</a>
                            <a class="phone-mail" href="mailto:{{$mainData->email}}">{{$mainData->email}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
