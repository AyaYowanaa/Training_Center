<?php
use Illuminate\Support\Facades\Storage;
?>
@extends('web_site.layouts.master')
@section('content')
   <!-- :: Breadcrumb Header -->
   <section class="breadcrumb-header style-2" id="page"
   style="background-image: url({{asset('assets_web/img/page-baner/news.jpg')}})">
    <div class="overlayin"></div>
    <div class="container">
        <div class="row justify-content">
            <div class="col-md-8">
                <div class="banner">
                    <h1>      <?= trans('web_site.Our_Blog') ?></h1>
                 </div>
            </div>
        </div>
    </div>
</section>
<section class="newspage bck">

<div class="container"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
        @if (isset($all) && (!empty($all)))

         <div class="row">

            @foreach ($all as $item)

            @if (!empty($item->main_image))
                @php
                $image_path = Storage::disk('images')->url($item->main_image);

                $img_url = asset((Storage::disk('images')->exists($item->main_image)) ? $image_path :'assets/images/blank.png');
                @endphp
            @else
                @php $img_url = asset('assets/images/blank.png'); @endphp

            @endif
        <div class="col-md-6 col-lg-4">
            <div class="blog-item">
                <div class="img-box">
                    <a href="{{route('one_blog',$item->id)}}" class="open-post">
                        <div class="Blog-bck img-fluid" style="background-image: url(<?= $img_url ?>)"></div>
                     </a>
                    <ul>
                        <li><i class="fas fa-calendar-alt"></i>{{$item->date_at}}</li>
                      </ul>
                </div>
                <div class="text-box">
                    <a href="{{route('one_blog',$item->id)}}" class="title-blog">
                        <h5><?= $item->title ?></h5>
                    </a>
                    <p class="text">
                        {{\Illuminate\Support\Str::words(strip_tags($item->details), 30, '...')}}
                                  </p>
                <a href="{{route('one_blog',$item->id)}}" class="link-more"><span>{{trans('web_site.Read_more')}}</span></a>
                </div>
            </div>
            </div>
            @endforeach


                <div class="col-lg-12 text-center">
                    {!! $all->withQueryString()->links('vendor/pagination/default') !!}

                </div>

         </div>

         @endif
    </div>

@endsection
