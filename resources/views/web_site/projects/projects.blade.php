<?php
use Illuminate\Support\Facades\Storage;
?>
@extends('web_site.layouts.master')
@section('content')
   <!-- :: Breadcrumb Header -->
   <section class="breadcrumb-header style-2" id="page"
   style="background-image: url({{asset('assets_web/img/page-baner/project.webp')}})">
    <div class="overlayin"></div>
    <div class="container">
        <div class="row justify-content">
            <div class="col-md-8">
                <div class="banner">
                    <h1>      <?= trans('web_site.Our_Projects') ?></h1>
                 </div>
            </div>
        </div>
    </div>
</section>
<section class="newspage bck">

    <div class="container"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
        @if (isset($all) && (!empty($all)))

         <div class="row">

             @foreach($all as $project)
                 <div class="col-md-4 mb-30">
                     <div class="serv-box">
                         <div class="back-serv"
                              style="background-image: url({{$project->image_url}})">
                         </div>
                     </div>
                     <div class="div-pro">
                         <a href="{{route('one_project',$project->id)}}" class="pro-title"><h3>{{$project->title}}</h3></a>
                         <span class="span-pro">{{$project->city->city_name}}-{{$project->district->name}}</span>
                     </div>
                 </div>
             @endforeach
         </div>
            <div class="col-lg-12 text-center">
                {!! $all->withQueryString()->links('vendor/pagination/default') !!}

            </div>
         @endif
    </div>

@endsection
