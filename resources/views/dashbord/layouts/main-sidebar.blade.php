<?php use Illuminate\Support\Facades\Route;
?>
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
     data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{route('admin.dashboard')}}">
            <img alt="Logo"
                 src="{{asset((!empty($mainData->image)) ? $mainData->image : 'assets/media/logos/default-dark.svg')}}"
                 class="h-30px app-sidebar-logo-default"/>
        </a>
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
                        <span class="menu-icon"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/keen/docs/core/html/src/media/icons/duotune/general/gen067.svg-->
<span class="svg-icon svg-icon-2"><svg width="26" height="28" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.8254 27.3337H4.17203C3.1536 27.3337 2.17688 26.9291 1.45674 26.2089C0.736602 25.4888 0.332031 24.5121 0.332031 23.4937V4.50699C0.332031 3.48856 0.736602 2.51184 1.45674 1.7917C2.17688 1.07156 3.1536 0.666992 4.17203 0.666992H17.8254C18.8438 0.666992 19.8205 1.07156 20.5407 1.7917C21.2608 2.51184 21.6654 3.48856 21.6654 4.50699V23.4937C21.6654 24.5121 21.2608 25.4888 20.5407 26.2089C19.8205 26.9291 18.8438 27.3337 17.8254 27.3337ZM10.9987 7.33366C10.4713 7.33366 9.95571 7.49006 9.51718 7.78307C9.07865 8.07609 8.73685 8.49257 8.53502 8.97984C8.33319 9.46711 8.28038 10.0033 8.38327 10.5206C8.48616 11.0378 8.74014 11.513 9.11308 11.8859C9.48602 12.2589 9.96117 12.5129 10.4785 12.6158C10.9957 12.7186 11.5319 12.6658 12.0192 12.464C12.5065 12.2622 12.9229 11.9204 13.216 11.4818C13.509 11.0433 13.6654 10.5277 13.6654 10.0003C13.6654 9.29308 13.3844 8.6148 12.8843 8.11471C12.3842 7.61461 11.7059 7.33366 10.9987 7.33366ZM15.3587 19.3337C15.5794 19.347 15.8 19.3052 16.0005 19.2121C16.2011 19.1189 16.3753 18.9774 16.5076 18.8002C16.6398 18.623 16.7259 18.4157 16.7581 18.1969C16.7903 17.9781 16.7676 17.7548 16.692 17.547C16.2027 16.4571 15.3998 15.5378 14.3858 14.9061C13.3718 14.2744 12.1926 13.9591 10.9987 14.0003C9.81328 13.9677 8.64459 14.2856 7.63898 14.9141C6.63337 15.5426 5.83553 16.4538 5.34537 17.5337C4.9987 18.4003 5.70536 19.3337 7.38536 19.3337H15.3587ZM24.332 12.667H22.9987V18.0003H24.332C24.6857 18.0003 25.0248 17.8598 25.2748 17.6098C25.5249 17.3598 25.6654 17.0206 25.6654 16.667V14.0003C25.6654 13.6467 25.5249 13.3076 25.2748 13.0575C25.0248 12.8075 24.6857 12.667 24.332 12.667ZM24.332 4.66699H22.9987V10.0003H24.332C24.6857 10.0003 25.0248 9.85985 25.2748 9.6098C25.5249 9.35975 25.6654 9.02061 25.6654 8.66699V6.00033C25.6654 5.6467 25.5249 5.30756 25.2748 5.05752C25.0248 4.80747 24.6857 4.66699 24.332 4.66699Z" fill="currentColor"/>
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
                     class="menu-item menu-accordion <?php  if (in_array(optional(explode('.', Route::currentRouteName()))[2], array())) {
                         echo 'show';
                     } ?>">
                    <!--begin:Menu link-->
                    <span class="menu-link">
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
											<span class="menu-title">{{trans('sidebar.Settings')}}</span>
											<span class="menu-arrow"></span>
										</span>
                    <!--end:Menu link-->
                           <!--begin:Menu sub-->
                    <div
                        class="menu-sub menu-sub-accordion  <?php  if (in_array(optional(explode('.', Route::currentRouteName()))[1], array('mainsetting', 'typesetting','Entity','Expenses'))) {
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
                        <!--begin:Menu item-->
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
