@php
    $mainData=getMainData();
@endphp

<!-- :: Footer -->
<footer class="footer" style="background-image: url({{asset('assets_web/img/footer.webp')}})">
    <div class="overlay overlay-3"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="logo">
                    <img class="img-fluid" src="{{asset('assets_web/img/logo-white1.png')}}" alt="Footer Logo">
                    <p>{{$mainData->description}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-title">
                    <h4>{{trans('web_site.Quick_Links')}}</h4>
                </div>
                <ul class="links">
                    <li><a href="{{route('home')}}"><i class="fas fa-long-arrow-alt-right"></i> {{trans('web_site.Home')}} </a></li>
                    <li><a href="{{route('about_us')}}"><i class="fas fa-long-arrow-alt-right"></i> {{trans('web_site.About_Us')}} </a></li>
                    <li><a href="{{route('projects')}}"><i class="fas fa-long-arrow-alt-right"></i>  {{trans('web_site.projects')}} </a>
                    </li>
                    <li><a href="{{route('blogs')}}"><i class="fas fa-long-arrow-alt-right"></i> {{trans('web_site.Blog')}} </a></li>
                    <li><a href="{{route('contact_us')}}"><i class="fas fa-long-arrow-alt-right"></i> {{trans('web_site.Contact_Us')}} </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-title">
                    <h4>{{trans('web_site.Contact_Us')}}</h4>
                </div>
                <ul class="links">
                    <li><a><i class="fas fa-map-marked-alt icon"></i> {{$mainData->address}}   </a></li>
                    <li><a href="tel:{{$mainData->phone}}"> <i
                                class="fas fa-phone-volume icon"></i> {{$mainData->phone}}  </a></li>
                    <li><a href="mailto:{{$mainData->email}}"><i class="fas fa-envelope icon"></i> {{$mainData->email}}
                        </a></li>
                </ul>

                <ul class="icon">
                    @if(isset($mainData->Facebook)&&(!empty($mainData->Facebook)))
                        <li><a href="{{$mainData->Facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if(isset($mainData->twitter)&&(!empty($mainData->twitter)))

                        <li><a href="{{$mainData->twitter}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path
                                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                                </svg>
                            </a></li>
                    @endif
                    @if(isset($mainData->Instagram)&&(!empty($mainData->Instagram)))
                        <li><a href="{{$mainData->Instagram}}"><i class="fab fa-instagram"></i></a></li>
                    @endif
                    @if(isset($mainData->YouTube)&&(!empty($mainData->YouTube)))
                        <li><a href="{{$mainData->YouTube}}"><i class="fab fa-youtube"></i></a></li>
                    @endif

                </ul>
            </div>


        </div>
    </div>
    <div class="copyright">
        <div class="container text-center">
            <p>{{trans('web_site.Right_Reserved')}}</p>

        </div>
    </div>
</footer>
