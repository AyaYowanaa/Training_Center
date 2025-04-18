{{--begin::Head--}}
<title>@yield('title')</title>
<link rel="canonical" href="https://preview.keenthemes.com/keen"/>
{{--<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>--}}
<link rel="shortcut icon" href="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/logos/favicon.ico')}}"/>
{{--begin::Fonts(mandatory for all pages)--}}
<link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css"/>

@if(app()->getLocale() =='ar')
    {{--    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />--}}
    <link href="https://fonts.googleapis.com/css?family=Almarai|Roboto&display=swap" rel="stylesheet">
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
@else
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

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


