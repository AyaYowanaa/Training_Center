<?php

?>
@extends('web_site.layouts.master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <section class="breadcrumb-header style-2" id="page"
             style="background-image: url({{asset('assets_web/img/page-baner/news.jpg')}})">
        <div class="overlayin"></div>
        <div class="container">
            <div class="row justify-content">
                <div class="col-md-8">
                    <div class="banner">
                        <h1> <?= trans('web_site.Blog_Details') ?> </h1>
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
                        @if (isset($one_data->blogImgaes) && (!empty($one_data->blogImgaes)))

                            <div class="newsdetail-carousel owl-carousel owl-theme">
                            @foreach ($one_data->blogImgaes as $key => $img)
                                <?php   $img_url = $img->image;   ?>
                                <!------- item  --------->
                                    <div class="img-newsdetail"
                                         style="background-image: url({{$img_url}})"></div>
                                @endforeach
                            </div>
                        @endif

                        <div class="text-box direction">
                            <h5>{{$one_data->blogTitle}}</h5>
                            <span class="blog-date"><i class="fas fa-calendar-alt"></i> {{$one_data->blogDate}}</span>
                            <span class="author-name"><i class="fas fa-user"></i> {{$one_data->blogPublisher}}</span>
                            <div>
                                {!! $one_data->blogDetails !!}

                            </div>
                            <div class="share-post">
                                <span>{{trans('web_site.Share_post')}} :</span>
                                <ul>
                                    <li><a href="javascript:fbShare('{{ app('request')->url() }}',520,360)"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a href="javascript:twitterShare('{{ app('request')->url() }}',520,360)"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="javascript:instagramShare('{{ app('request')->url() }}',520,360)"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="javascript:linkedinShare('{{ app('request')->url() }}',520,360)"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                    <li><a href="javascript:whatsappShare('{{ app('request')->url() }}',520,360)"><i class="fab fa-whatsapp"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


     <!-- share social -->
    <script>
    function fbShare(url, title, descr, winWidth, winHeight) {
        var url = window.location.href;
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }

    function twitterShare(url, winWidth, winHeight) {
        var url = window.location.href;

        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open('https://twitter.com/share?url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }

    function linkedinShare(url, winWidth, winHeight) {
        var url = window.location.href;

        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open(' https://www.linkedin.com/shareArticle?url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }


    function instagramShare(url, winWidth, winHeight) {
        var url = window.location.href;
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open(' https://www.instagram.com/shareArticle?url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }

    function whatsappShare(url, winWidth, winHeight) {
        var url = window.location.href;
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open('https://wa.me/?text=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }


</script>




@endsection
