<?php use Illuminate\Support\Facades\Route;

?>
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
     data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
           @if(app()->getLocale() =='ar')
            <!--begin::Logo image-->
                <a href="{{route('admin.dashboard')}}">
                    <img alt="Logo"
                         src="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/logos/logowhite-ar.webp')}}"
                         class="h-50px app-sidebar-logo-default"/>
                </a> @else
        <!--begin::Logo image-->
            <a href="{{route('admin.dashboard')}}">
                <img alt="Logo"
                     src="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/logos/logowhiteen.webp')}}"
                     class="h-50px app-sidebar-logo-default"/>
            </a>
        @endif
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-sm h-30px w-30px rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.5"
                                              d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                              fill="currentColor"/>
										<path
                                            d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                            fill="currentColor"/>
									</svg>
								</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-3"
                 id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">

            {{--user--}}
            {{--            @if(auth()->user()->hasRole('Super-Admin')||(auth()->user()->canAny(['list_user','list_roles'])))--}}

            <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                            <span
                                class="menu-heading fw-bold text-uppercase fs-7">{{trans('sidebar.site_setting')}}</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[2] == 'users') {
                        echo 'active';
                    } ?>" href="{{ route('admin.UserManagement.users.index') }}">
                        <span class="menu-icon"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/communication/com005.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"/>
<path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon--></span>
                        <span class="menu-title">{{trans('sidebar.Users')}}</span>
                    </a>
                    <!--end:Menu link-->
                </div>

            {{--            @if(auth()->user()->hasRole('Super-Admin')||(auth()->user()->canAny(['list_city','list_district'])))--}}

            {{--store management--}}
            <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span
                            class="menu-heading fw-bold text-uppercase fs-7">{{trans('sidebar.store_management')}}</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion <?php  if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('mainsetting', 'typesetting','Entity','Expenses','course'))) {
                         echo 'show';
                     } ?>">
                    <!--begin:Menu link-->
                    <span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/general/gen022.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="currentColor"/>
<path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="currentColor"/>
<path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="currentColor"/>
<path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->
											</span>
											<span class="menu-title">{{trans('sidebar.Settings')}}</span>
											<span class="menu-arrow"></span>
										</span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div
                        class="menu-sub menu-sub-accordion  <?php  if (in_array(optional(explode('.', Route::currentRouteName()))[1], array('mainsetting', 'typesetting','Entity','Expenses','course'))) {
                            echo 'show';
                        } ?>">


                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[2] == 'mainsetting') {
            echo 'active';
        } ?>" href="{{ route('admin.Settings.mainsetting.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{trans('sidebar.Mainsetting')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[2] == 'typesetting') {
                  echo 'active';
               } ?>" href="{{ route('admin.Settings.typesetting.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{trans('sidebar.TypeSettings')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[2] == 'Entity') {
            echo 'active';
        } ?>" href="{{ route('admin.Settings.Entity.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{trans('sidebar.Entities')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[2] == 'Expenses') {
        echo 'active';
    } ?>" href="{{ route('admin.Settings.Expenses.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                <span class="menu-title">{{trans('sidebar.Expenses')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[2] == 'course') {
        echo 'active';
    } ?>" href="{{ route('admin.Settings.course.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                <span class="menu-title">{{trans('sidebar.Courses_Settings')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->


                </div>
                <!--end:Menu item-->


            {{--            @endif--}}

                {{--site management--}}
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span
                            class="menu-heading fw-bold text-uppercase fs-7">{{trans('sidebar.Training_Center')}}</span>
                    </div>
                    <!--end:Menu content-->
                </div>

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link  @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Student'))) {{'active'}} @endif"
                       href="{{ route('admin.TrainingCenter.Student.index') }}">
       <span class="menu-icon"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/communication/com014.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"/>
<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"/>
<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"/>
<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon--></span>
                        <span class="menu-title">{{trans('sidebar.Students')}}


                        </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Instructor'))) {{'active'}} @endif"
                       href="{{ route('admin.Settings.Instructor.index') }}">
       <span class="menu-icon"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/general/gen067.svg-->
    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"/>
<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"/>
<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"/>
<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"/>
</svg>
</span>
           <!--end::Svg Icon--></span>
                        <span class="menu-title">{{trans('sidebar.Instructor')}}


                        </span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--end:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('training_courses'))) {{'active'}} @endif"
                       href="{{ route('admin.Settings.training_courses.index') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                    fill="currentColor"/>
                <path
                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                    fill="currentColor"/>
                <path opacity="0.3"
                      d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
           <!--end::Svg Icon-->
    </span>
                        <span class="menu-title">{{trans('sidebar.Training_Courses')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('CourseCosts'))) {{'active'}} @endif"
       href="{{ route('admin.Settings.CourseCosts.index') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                    fill="currentColor"/>
                <path
                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                    fill="currentColor"/>
                <path opacity="0.3"
                      d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.CourseCosts')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Instructors_Courses'))) {{'active'}} @endif"
       href="{{ route('admin.Settings.Instructors_Courses.index') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                        fill="currentColor"/>
                <path
                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                        fill="currentColor"/>
                <path opacity="0.3"
                      d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.Instructors_Courses')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('CourseRegistration'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.CourseRegistration.create') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                    fill="currentColor"/>
                <path
                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                    fill="currentColor"/>
                <path opacity="0.3"
                      d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.CourseRegistration')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('AttendanceStudents'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.AttendanceStudents.create') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                    fill="currentColor"/>
                <path
                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                    fill="currentColor"/>
                <path opacity="0.3"
                      d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.AttendanceStudents')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Invoice'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.Invoice.index') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                    fill="currentColor"/>
                <path
                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                    fill="currentColor"/>
                <path opacity="0.3"
                      d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </span>

        <span class="menu-title">{{trans('sidebar.Invoice')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Invoice_Entity'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.Invoice_Entity.index') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                    fill="currentColor"/>
                <path
                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                    fill="currentColor"/>
                <path opacity="0.3"
                      d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.Entity_Invoices')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Exams'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.Exams.index') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                    fill="currentColor"/>
                <path
                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                    fill="currentColor"/>
                <path opacity="0.3"
                       d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.Exams')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Evaluation'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.Evaluation.index') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                    fill="currentColor"/>
                <path
                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                    fill="currentColor"/>
                <path opacity="0.3"
                       d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                      fill="currentColor"/>
                <path opacity="0.3"
                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                      fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.Evaluation')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
            <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">{{trans('sidebar.web_site')}}</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion     @if (in_array(optional(explode('.', Route::currentRouteName()))[1], array('mdata', 'about','blog','projects','contact','feedback','partner','statistics','advantages','banner'))) {{'show'}} @endif ">
                    <!--begin:Menu link-->
                    <span class="menu-link">
											<span class="menu-icon">
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path
                                                            d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                                            fill="currentColor"/>
														<path opacity="0.3"
                                                              d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                                              fill="currentColor"/>
													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title">{{trans('sidebar.web_site_pages')}}</span>
											<span class="menu-arrow"></span>
                     </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->


                    <div
                        class="menu-sub menu-sub-accordion <?php  if (in_array(optional(explode('.', Route::currentRouteName()))[1], array('mdata', 'about', 'contact', 'projects', 'blog'))) {
                            echo 'show';
                        } ?>">

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'mdata') {
                                echo 'active';
                            } ?>" href="{{ route('admin.mdata.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.mdata')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        {{--<!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'about') {
                                echo 'active';
                            } ?>" href="{{ route('admin.about.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.about')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'banner') {
                                echo 'active';
                            } ?>" href="{{ route('admin.banner.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.banner')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'contact') {
                                echo 'active';
                            } ?>" href="{{ route('admin.contact.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.contact')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'blog') {
                                echo 'active';
                            } ?>" href="{{ route('admin.blog.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.blog')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'videos') {
                                echo 'active';
                            } ?>" href="{{ route('admin.videos.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.videos')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'gallery') {
                                echo 'active';
                            } ?>" href="{{ route('admin.gallery.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.gallery')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'projects') {
                                echo 'active';
                            } ?>" href="{{ route('admin.projects.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.projects')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'feedback') {
                                echo 'active';
                            } ?>" href="{{ route('admin.feedback.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.feedback')}}</span>
                            </a>

                        </div>
                        <!--end:Menu link-->


                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'partner') {
                                echo 'active';
                            } ?>" href="{{ route('admin.partner.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.partner')}}</span>
                            </a>

                        </div>
                        <!--end:Menu link-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'statistics') {
                                echo 'active';
                            } ?>" href="{{ route('admin.statistics.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">{{trans('sidebar.statistics')}}</span>
                            </a>

                        </div>
                        <!--end:Menu link-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php  if (optional(explode('.', Route::currentRouteName()))[1] == 'advantages') {
                                echo 'active';
                            } ?>" href="{{ route('admin.advantages.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{trans('sidebar.advantages')}}</span>
                            </a>

                        </div>
                        <!--end:Menu link-->
--}}

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                {{--site management--}}


            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->

</div>
