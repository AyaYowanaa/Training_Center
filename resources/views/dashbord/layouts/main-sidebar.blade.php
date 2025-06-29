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
                                class="menu-heading fw-bold text-uppercase fs-7">{{trans('sidebar.User_Settings')}}</span>
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
<span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            class="menu-heading fw-bold text-uppercase fs-7">{{trans('sidebar.Main_Settings')}}</span>
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
<span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
<!-- Students Icon | Group -->
<!-- Students Icon | Single Student -->
<span class="svg-icon svg-icon-muted svg-icon-2x">
<svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <!-- Graduation Cap -->
  <path d="M12 4L4 8l8 4 8-4-8-4z" fill="currentColor"/>
  <!-- Head + Body -->
  <circle cx="12" cy="14" r="2.5" fill="currentColor"/>
  <path d="M9 20c0-2 6-2 6 0v1H9v-1z" fill="currentColor"/>
</svg>
</span>


       </span>
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
    <span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"/>
<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"/>
<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"/>
<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"/>
</svg>
</span>
           <!--end::Svg Icon--></span>
                        <span class="menu-title">{{trans('sidebar.Instructors')}}


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
 <!-- Course Grid Icon -->
<span class="svg-icon svg-icon-muted svg-icon-2x">
<svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path opacity="0.3" d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h7v7h-7z" fill="currentColor"/>
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
        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/finance/fin010.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M12.5 22C11.9 22 11.5 21.6 11.5 21V3C11.5 2.4 11.9 2 12.5 2C13.1 2 13.5 2.4 13.5 3V21C13.5 21.6 13.1 22 12.5 22Z" fill="currentColor"/>
<path d="M17.8 14.7C17.8 15.5 17.6 16.3 17.2 16.9C16.8 17.6 16.2 18.1 15.3 18.4C14.5 18.8 13.5 19 12.4 19C11.1 19 10 18.7 9.10001 18.2C8.50001 17.8 8.00001 17.4 7.60001 16.7C7.20001 16.1 7 15.5 7 14.9C7 14.6 7.09999 14.3 7.29999 14C7.49999 13.8 7.80001 13.6 8.20001 13.6C8.50001 13.6 8.69999 13.7 8.89999 13.9C9.09999 14.1 9.29999 14.4 9.39999 14.7C9.59999 15.1 9.8 15.5 10 15.8C10.2 16.1 10.5 16.3 10.8 16.5C11.2 16.7 11.6 16.8 12.2 16.8C13 16.8 13.7 16.6 14.2 16.2C14.7 15.8 15 15.3 15 14.8C15 14.4 14.9 14 14.6 13.7C14.3 13.4 14 13.2 13.5 13.1C13.1 13 12.5 12.8 11.8 12.6C10.8 12.4 9.99999 12.1 9.39999 11.8C8.69999 11.5 8.19999 11.1 7.79999 10.6C7.39999 10.1 7.20001 9.39998 7.20001 8.59998C7.20001 7.89998 7.39999 7.19998 7.79999 6.59998C8.19999 5.99998 8.80001 5.60005 9.60001 5.30005C10.4 5.00005 11.3 4.80005 12.3 4.80005C13.1 4.80005 13.8 4.89998 14.5 5.09998C15.1 5.29998 15.6 5.60002 16 5.90002C16.4 6.20002 16.7 6.6 16.9 7C17.1 7.4 17.2 7.69998 17.2 8.09998C17.2 8.39998 17.1 8.7 16.9 9C16.7 9.3 16.4 9.40002 16 9.40002C15.7 9.40002 15.4 9.29995 15.3 9.19995C15.2 9.09995 15 8.80002 14.8 8.40002C14.6 7.90002 14.3 7.49995 13.9 7.19995C13.5 6.89995 13 6.80005 12.2 6.80005C11.5 6.80005 10.9 7.00005 10.5 7.30005C10.1 7.60005 9.79999 8.00002 9.79999 8.40002C9.79999 8.70002 9.9 8.89998 10 9.09998C10.1 9.29998 10.4 9.49998 10.6 9.59998C10.8 9.69998 11.1 9.90002 11.4 9.90002C11.7 10 12.1 10.1 12.7 10.3C13.5 10.5 14.2 10.7 14.8 10.9C15.4 11.1 15.9 11.4 16.4 11.7C16.8 12 17.2 12.4 17.4 12.9C17.6 13.4 17.8 14 17.8 14.7Z" fill="currentColor"/>
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
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('CourseRegistration'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.CourseRegistration.create') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
     <!-- Course Registration Icon | Document + Check -->
<!-- Course Registration Icon | Calendar -->
<span class="svg-icon svg-icon-muted svg-icon-2x">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none">
  <rect x="3" y="5" width="18" height="16" rx="2" fill="currentColor" opacity="0.3"/>
  <path d="M7 3v4M17 3v4M8 10h8v1H8zM8 13h6v1H8z" stroke="currentColor" stroke-width="1.5"/>
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
<!-- Attendance Icon | Clock + Person -->
<span class="svg-icon svg-icon-muted svg-icon-2x">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none">
  <!-- Clock -->
  <circle cx="16" cy="8" r="4" fill="currentColor" opacity="0.3"/>
  <path d="M16 6v3l2 1" stroke="currentColor" stroke-width="1.5"/>
  <!-- Person -->
  <circle cx="8" cy="15" r="2.5" fill="currentColor"/>
  <path d="M5 20c.5-2 5.5-2 6 0" stroke="currentColor" stroke-width="1.5"/>
</svg>
</span>


        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.Student_Attendance')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Invoice'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.Invoice.index') }}">
       <span class="menu-icon">
    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/coding/cod002.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M18 22C19.7 22 21 20.7 21 19C21 18.5 20.9 18.1 20.7 17.7L15.3 6.30005C15.1 5.90005 15 5.5 15 5C15 3.3 16.3 2 18 2H6C4.3 2 3 3.3 3 5C3 5.5 3.1 5.90005 3.3 6.30005L8.7 17.7C8.9 18.1 9 18.5 9 19C9 20.7 7.7 22 6 22H18Z" fill="currentColor"/>
<path d="M18 2C19.7 2 21 3.3 21 5H9C9 3.3 7.7 2 6 2H18Z" fill="currentColor"/>
<path d="M9 19C9 20.7 7.7 22 6 22C4.3 22 3 20.7 3 19H9Z" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->


    </span>

        <span class="menu-title">{{trans('sidebar.Invoices')}}


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
<!-- Entity Invoice Icon | Briefcase + Paper -->
<!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/finance/fin007.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M3 3V17H7V21H15V9H20V3H3Z" fill="currentColor"/>
<path d="M20 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V21C21 21.6 20.6 22 20 22ZM19 4H4V8H19V4ZM6 18H4V20H6V18ZM6 14H4V16H6V14ZM6 10H4V12H6V10ZM10 18H8V20H10V18ZM10 14H8V16H10V14ZM10 10H8V12H10V10ZM14 18H12V20H14V18ZM14 14H12V16H14V14ZM14 10H12V12H14V10ZM19 14H17V20H19V14ZM19 10H17V12H19V10Z" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->

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
<!-- Online Exam Icon | MCQ Format -->
{{-- <span class="svg-icon svg-icon-muted svg-icon-2x">
<svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect x="4" y="4" width="16" height="16" rx="2" fill="currentColor" opacity="0.3"/>
  <circle cx="8" cy="8" r="1.5" fill="currentColor"/>
  <rect x="11" y="7" width="7" height="1.5" fill="currentColor"/>
  <circle cx="8" cy="12" r="1.5" fill="currentColor"/>
  <rect x="11" y="11" width="5" height="1.5" fill="currentColor"/>
</svg>
</span> --}}
<!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/general/gen065.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M22.9558 10.2848L21.3341 8.6398C21.221 8.52901 21.1317 8.39637 21.0715 8.24996C21.0114 8.10354 20.9816 7.94641 20.9841 7.78814V5.4548C20.9826 5.13514 20.9179 4.81893 20.7938 4.52433C20.6697 4.22973 20.4887 3.96255 20.261 3.73814C20.0333 3.51374 19.7636 3.33652 19.4672 3.21668C19.1709 3.09684 18.8538 3.03673 18.5341 3.0398H16.2008C16.0425 3.04229 15.8854 3.01255 15.739 2.95238C15.5925 2.89221 15.4599 2.80287 15.3491 2.6898L13.7158 1.0448C13.2608 0.590273 12.6439 0.334961 12.0008 0.334961C11.3576 0.334961 10.7408 0.590273 10.2858 1.0448L8.64078 2.66647C8.52999 2.77954 8.39735 2.86887 8.25094 2.92904C8.10452 2.98922 7.94739 3.01896 7.78911 3.01647H5.45578C5.13612 3.01799 4.8199 3.08266 4.5253 3.20675C4.23071 3.33085 3.96353 3.51193 3.73912 3.73959C3.51471 3.96724 3.3375 4.237 3.21766 4.53335C3.09781 4.82971 3.0377 5.14682 3.04078 5.46647V7.7998C3.04327 7.95808 3.01353 8.11521 2.95335 8.26163C2.89318 8.40804 2.80385 8.54068 2.69078 8.65147L1.04578 10.2848C0.591249 10.7398 0.335938 11.3567 0.335938 11.9998C0.335938 12.6429 0.591249 13.2598 1.04578 13.7148L2.66745 15.3598C2.78051 15.4706 2.86985 15.6032 2.93002 15.7496C2.99019 15.8961 3.01994 16.0532 3.01745 16.2115V18.5448C3.01897 18.8645 3.08363 19.1807 3.20773 19.4753C3.33182 19.7699 3.5129 20.0371 3.74056 20.2615C3.96822 20.4859 4.23798 20.6631 4.53433 20.7829C4.83068 20.9028 5.14779 20.9629 5.46745 20.9598H7.80078C7.95906 20.9573 8.11619 20.9871 8.2626 21.0472C8.40902 21.1074 8.54166 21.1967 8.65245 21.3098L10.2974 22.9548C10.7525 23.4093 11.3693 23.6646 12.0124 23.6646C12.6556 23.6646 13.2724 23.4093 13.7274 22.9548L15.3608 21.3331C15.4716 21.2201 15.6042 21.1307 15.7506 21.0706C15.897 21.0104 16.0542 20.9806 16.2124 20.9831H18.5458C19.1894 20.9831 19.8066 20.7275 20.2617 20.2724C20.7168 19.8173 20.9724 19.2001 20.9724 18.5565V16.2231C20.97 16.0649 20.9997 15.9077 21.0599 15.7613C21.12 15.6149 21.2094 15.4823 21.3224 15.3715L22.9674 13.7265C23.1935 13.5002 23.3726 13.2314 23.4944 12.9357C23.6162 12.64 23.6784 12.3231 23.6773 12.0032C23.6762 11.6834 23.6119 11.3669 23.4881 11.072C23.3643 10.7771 23.1834 10.5095 22.9558 10.2848Z" fill="currentColor"/>
<path d="M12.0039 15.4998C11.7012 15.4998 11.4109 15.38 11.1969 15.1668C10.9829 14.9535 10.8626 14.6643 10.8626 14.3627V13.9382C10.8467 13.2884 10.9994 12.6456 11.306 12.0718C11.6126 11.4981 12.0627 11.013 12.6126 10.6634C12.7969 10.561 12.9505 10.4114 13.0575 10.2302C13.1645 10.049 13.221 9.84266 13.2213 9.63242C13.2213 9.31073 13.0931 9.00223 12.8648 8.77476C12.6365 8.5473 12.3268 8.41951 12.0039 8.41951C11.6811 8.41951 11.3714 8.5473 11.1431 8.77476C10.9148 9.00223 10.7865 9.31073 10.7865 9.63242C10.7865 9.93399 10.6663 10.2232 10.4523 10.4365C10.2382 10.6497 9.94792 10.7695 9.64522 10.7695C9.34253 10.7695 9.05223 10.6497 8.83819 10.4365C8.62415 10.2232 8.50391 9.93399 8.50391 9.63242C8.50763 9.02196 8.67214 8.42317 8.98099 7.89592C9.28984 7.36868 9.7322 6.93145 10.2639 6.62796C10.7955 6.32447 11.3978 6.16535 12.0105 6.16651C12.6233 6.16767 13.225 6.32908 13.7554 6.63458C14.2859 6.94009 14.7266 7.37899 15.0335 7.9074C15.3403 8.43582 15.5025 9.03522 15.5039 9.64569C15.5053 10.2562 15.3458 10.8563 15.0414 11.3861C14.7369 11.9159 14.2983 12.3568 13.7692 12.6647C13.5645 12.8132 13.4003 13.0101 13.2913 13.2378C13.1824 13.4655 13.1322 13.7167 13.1453 13.9685V14.3931C13.1373 14.6894 13.0136 14.9708 12.8004 15.1776C12.5872 15.3843 12.3014 15.4999 12.0039 15.4998Z" fill="currentColor"/>
<path d="M12.0026 18.9998C12.6469 18.9998 13.1693 18.4775 13.1693 17.8332C13.1693 17.1888 12.6469 16.6665 12.0026 16.6665C11.3583 16.6665 10.8359 17.1888 10.8359 17.8332C10.8359 18.4775 11.3583 18.9998 12.0026 18.9998Z" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->



        <!--end::Svg Icon-->
    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.Exams')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>

<!--------------------------------------------------------------------------------------------->
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Diploma'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.Diploma.index') }}">
       <span class="menu-icon">
<!-- Diploma Icon | Graduation Hat -->
<span class="svg-icon svg-icon-muted svg-icon-2x">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M12 3L2 8l10 5 10-5-10-5z" fill="currentColor"/>
  <path d="M4 10v4c0 2 4 4 8 4s8-2 8-4v-4" stroke="currentColor" stroke-width="1.5"/>
</svg>
</span>



    </span>
                                    <!--end::Svg Icon--></span>
        <span class="menu-title">{{trans('sidebar.Diploma')}}


                        </span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
<!------------------------------------------------------------------->
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link   @if (in_array(optional(explode('.', Route::currentRouteName()))[2], array('Evaluation'))) {{'active'}} @endif"
       href="{{ route('admin.TrainingCenter.Evaluation.index') }}">
       <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
 
<!-- Evaluation Icon | Smiley Face -->
<span class="svg-icon svg-icon-muted svg-icon-2x">
<svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="12" cy="12" r="9" fill="currentColor" opacity="0.3"/>
  <circle cx="9" cy="10" r="1" fill="currentColor"/>
  <circle cx="15" cy="10" r="1" fill="currentColor"/>
  <path d="M9 15c.5 1 1.5 1.5 3 1.5s2.5-.5 3-1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
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
<!------------------------------------------------------------------------------>
            <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">{{trans('sidebar.Main_Data')}}</span>
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
<!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/general/gen055.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
<path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
<path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->
<!--end::Svg Icon-->
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title">{{trans('sidebar.Data')}}</span>
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
