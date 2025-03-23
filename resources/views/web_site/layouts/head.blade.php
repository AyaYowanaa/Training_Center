<!--begin::Head-->
<title>@yield('title')</title>

<link rel="canonical" href="https://preview.keenthemes.com/keen"/>
<link rel="shortcut icon" href="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/logos/favicon.ico')}}"/>
<!--begin::Fonts(mandatory for all pages)-->
    <!-- :: Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets_web/css/bootstrap.min.css')}}">
     <!-- :: Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets_web/img/logo-dark.png')}}">
      <!-- :: Fontawesome -->
    <link rel="stylesheet" href="{{asset('assets_web/fonts/fontawesome/css/all.min.css')}}">
     <!-- :: Flaticon -->
    <link rel="stylesheet" href="{{asset('assets_web/fonts/flaticon/flaticon.css')}}">
     <!-- :: Animate -->
    <link rel="stylesheet" href="{{asset('assets_web/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets_web/css/aos.css')}}">
    <!-- :: Owl Carousel -->
    <link rel="stylesheet" href="{{asset('assets_web/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_web/css/owl.theme.default.min.css')}}">
     <!-- :: Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('assets_web/css/nice-select.css')}}">
     <!-- :: Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('assets_web/css/magnific-popup.css')}}">
     

@if(app()->getLocale() =='ar')
       <link href="https://fonts.googleapis.com/css?family=Almarai|Roboto&display=swap" rel="stylesheet">
<!-- :: Style CSS -->
    <link rel="stylesheet" href="{{asset('assets_web/css/stylear.css')}}">
    <link rel="stylesheet" href="{{asset('assets_web/css/new-stylear.css')}}">
     <!-- :: Style Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets_web/css/responsivear.css')}}">
@else
  <!-- :: Google Fonts -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Heebo:wght@400;500;600;700&display=swap">
    
<!-- :: Style CSS -->
    <link rel="stylesheet" href="{{asset('assets_web/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets_web/css/new-style.css')}}">
     <!-- :: Style Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets_web/css/responsive.css')}}">
@endif

<style>
    .t_container{
        padding: 30px;
        padding-top: 0px !important;
    }
    .container-xxl{
        max-width: 100% !important;

    }
</style>
@yield('css')
