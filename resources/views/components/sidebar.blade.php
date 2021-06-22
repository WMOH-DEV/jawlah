<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header my-3 bg-white d-flex justify-content-center align-items-center" >
            <!-- Logo -->
            <a class="font-w600 text-white tracking-wide" href="">
                {{--                {{ __('global.site') }}--}}
                <img src="{{asset('admin/assets/media/imgs/logo.png')}}" style="height:130px" alt="">

            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler"
                   data-class="fa-toggle-off fa-toggle-on"
                   onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');"
                   href="javascript:void(0)">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </a>
                <!-- END Toggle Sidebar Style -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-dark ml-2" data-toggle="layout" data-action="sidebar_close"
                   href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::currentRouteName() === 'admincp.index' ? 'active' : ''}}" href="{{route('admincp.index')}}">
                        <i class="nav-main-link-icon fa fa-home"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.main_page') }}</span>
                    </a>
                </li>

            {{--                <li class="nav-main-heading">{{ __('layouts/sidebar.main_sections') }}</li>--}}

            <!-- users -->
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::currentRouteName() == 'clients.index' ? 'active' : ''}}" href="{{route('clients.index')}}">
                        <i class="nav-main-link-icon fas fa-users"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.users') }}</span>
                    </a>
                </li>

                <!-- merchants -->
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::currentRouteName() === 'merchants.index' ? 'active' : ''}}" href="{{route('merchants.index')}}">
                        <i class="nav-main-link-icon fas fa-users"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.Merchants') }}</span>
                    </a>
                </li>

                <!-- activities -->
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu " data-toggle="submenu" aria-haspopup="true"
                       aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-plane"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.activities') }}</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('cities.index')}}">
                                <i class="nav-main-link-icon fas fa-city"></i>
                                <span class="nav-main-link-name">{{ __('sidebar.cities') }}</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('categories.index')}}">
                                <i class="nav-main-link-icon fas fa-check-double"></i>
                                <span class="nav-main-link-name">{{ __('sidebar.categories') }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('tickets.index')}}">
                                <i class="nav-main-link-icon fas fa-ticket-alt"></i>
                                <span class="nav-main-link-name">{{ __('sidebar.tickets') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Orders -->
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::currentRouteName() === 'orders.index' ? 'active' : ''}}" href="{{route('orders.index')}}">
                        <i class="nav-main-link-icon fas fa-calendar-week"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.orders') }}</span>
                    </a>
                </li>


                <li class="nav-main-heading">{{ __('sidebar.admin_sections') }}</li>

{{--                                @can('إدارة المشرفين')--}}
                                    <!-- Users -->
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                            aria-expanded="false" href="#">
                                            <i class="nav-main-link-icon fas fa-users-cog"></i>
                                            <span class="nav-main-link-name">إدارة مشرفين</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{ route('mods.index') }}">
                                                        <span class="nav-main-link-name">قائمة المشرفين</span>
                                                    </a>
                                                </li>

                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{ route('mods.create') }}">
                                                        <span class="nav-main-link-name">إضافة مشرف جديد</span>
                                                    </a>
                                                </li>

                                        </ul>
                                    </li>
{{--                                @endcan--}}



                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::currentRouteName() === 'reports.index' ? 'active' : ''}}" href="{{route('reports.index')}}">
                        <i class="nav-main-link-icon far fa-copy"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.reports') }}</span>
                    </a>
                </li>



                <!-- System -->
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                       aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-tools"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.system_settings') }}</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <!-- Home -->
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('settings.index')}}">
                                <i class="nav-main-link-icon fas fa-cogs"></i>
                                <span class="nav-main-link-name">إعدادات</span>
                            </a>
                        </li>

                        <!-- Pages -->
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('pages.index')}}">
                                <i class="nav-main-link-icon far fa-flag"></i>
                                <span class="nav-main-link-name">{{ __('sidebar.pages') }}</span>
                            </a>
                        </li>

                        <!-- comments -->
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('comments.index')}}">
                                <i class="nav-main-link-icon far fa-comment"></i>
                                <span class="nav-main-link-name">{{ __('sidebar.comments') }}</span>
                            </a>
                        </li>

                    </ul>
                </li>

                {{--                <!-- Support -->--}}
                {{--                <li class="nav-main-item">--}}
                {{--                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"--}}
                {{--                        aria-expanded="false" href="#">--}}
                {{--                        <i class="nav-main-link-icon fas fa-headset"></i>--}}
                {{--                        <span class="nav-main-link-name">{{ __('layouts/sidebar.help_support') }}</span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="nav-main-submenu">--}}
                {{--                        <li class="nav-main-item">--}}
                {{--                            <a class="nav-main-link" href="javascript:void(0)">--}}
                {{--                                <span class="nav-main-link-name">{{ __('layouts/sidebar.text_explanation') }}</span>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}

                {{--                        <li class="nav-main-item">--}}
                {{--                            <a class="nav-main-link" href="javascript:void(0)">--}}
                {{--                                <span--}}
                {{--                                    class="nav-main-link-name">{{ __('layouts/sidebar.visual_explanation') }}</span>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-main-item">--}}
                {{--                            <a class="nav-main-link" href="javascript:void(0)">--}}
                {{--                                <span class="nav-main-link-name">{{ __('layouts/sidebar.contact_us') }}</span>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}

                {{--                    </ul>--}}
                {{--                </li>--}}


            </ul>


            <div class="nav-main-item go_to_site">
                <a  href="{{url('/')}}" target="_blank">
                    <i class="nav-main-link-icon fas fa-globe"></i>
                    <span class="nav-main-link-name" style="color: #0A63A5">{{ __('sidebar.go_to_site') }}</span>
                </a>
            </div>

            <div class="nav-main-item log_out">
                <a class="nav-main-link" onclick="event.preventDefault(); document.getElementById('logout-sidebar').submit();" href="#route('logout')">
                    <i class="nav-main-link-icon fas fa-sign-out-alt"></i>
                    <span class="nav-main-link-name">{{ __('sidebar.log_out') }}</span>
                </a>
            </div>

            <form id="logout-sidebar" action="{{route('logout')}}" method="POST">
                @csrf
            </form>

        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->
