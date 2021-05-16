<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title>CITY TOURS - City tours and travel site template by Ansonika</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="{{ asset('image/x-icon') }}">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="{{ asset('img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Montserrat:300,400,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">


    <!-- COMMON CSS -->
    <link href="{{ asset('css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors.css') }}" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body class="rtl">

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->


    <!-- Header================================================== -->
    <header>
        <div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-6"><i class="icon-phone"></i><strong>0045 043204434</strong></div>
                    <div class="col-6">
                        <ul id="top_links">

                            @guest
                                <li><a href="{{ url('login') }}"><i class="fas fa-sign-in-alt"></i><span
                                            style="font-family: 'Cairo', sans-serif; font-size:15px;margin:10px">login
                                        </span></a></li>

                            @endguest

                            @auth


                                <li><a href="{{ url('user') }}"><i
                                            class="ti-user"></i><span>{{ Auth::user()->name }}</span></a></li>


                                <li> <a href="{{ url('/') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block text-blue-500 px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:text-blue-600"
                                        style="font-family: 'Cairo', sans-serif; font-size:14px">
                                        <i class="icon-logout"></i>
                                        logout</a>
                                    <!-- Logout Form -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </li>

                            @endauth
                            <li><a
                                    href="http://themeforest.net/item/citytours-city-tours-tour-tickets-and-guides/10715647?ref=ansonika">Purchase
                                    this template</a></li>
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->

        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div id="logo_home">
                        <h1><a href="/" title="City tours travel template">Ciurs travel template</a></h1>
                    </div>
                </div>
                <nav class="col-9 text-right">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu
                            mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="img/logo_sticky.png" width="160" height="34" alt="City tours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul style="text-align: right">








                            <li class="submenu">
                                <a href="/" class="show-submenu" style="font-family: 'Cairo', sans-serif;">الصفحة
                                    الرئيسية </a>

                            </li>








                            <li class="submenu">
                                <a href="{{url("allticket")}}" class="show-submenu"style="font-family: 'Cairo', sans-serif;"> التذاكر   </a>
                            </li>










                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu"
                                    style="font-family: 'Cairo', sans-serif;"> المدن<i class="icon-down-open-mini"></i>
                                </a>
                                <ul>
                                    @foreach ($City as $Cit)

                                        <div class=" d-flex">
                                            <div class="image mt-3"><a href="{{ url("City/{$Cit->id}") }}"><img width="40px"
                                                        class=" img-fluid mt-2 mx-1"
                                                        src="{{ asset("uploads/{$Cit->image}") }}" alt="image"></a>
                                            </div>
                                            <strong><a href="{{ url("City/{$Cit->id}") }}">
                                                    <h5 class=" mt-2"> {{ $Cit->name }}</h5>
                                                </a> </strong>

                                        </div>

                                    @endforeach

                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu"
                                    style="font-family: 'Cairo', sans-serif;"> تصنيف الحفلات <i
                                        class="icon-down-open-mini"></i> </a>
                                <ul>
                                    @foreach ($Category as $Categor)

                                        <div class=" d-flex">
                                            <div class="image mt-3"><a href="{{ url("Category/{$Categor->id}") }}"><img
                                                        width="40px" class=" img-fluid mt-2 mx-1"
                                                        src="{{ asset("uploads/{$Categor->image}") }}" alt="image"></a>
                                            </div>
                                            <strong><a href="{{ url("Category/{$Categor->id}") }}">
                                                    <h5 class=" mt-2"> {{ $Categor->name }}</h5>
                                                </a> </strong>

                                        </div>

                                    @endforeach

                                </ul>
                            </li>


















                            @guest
                                <li><a href="{{ url('login') }}"></i><span
                                            style="font-family: 'Cairo', sans-serif; font-size:15px;margin:10px">تسجيل
                                            الدخول </span></a></li>

                            @endguest



                            <li class="megamenu submenu text-left " style="text-align: left !important">
                                <a href="javascript:void(0);" class="show-submenu-mega"><i class="icon_search"></i><i
                                        class="icon-down-open-mini"></i></a>
                                <div class="menu-wrapper">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h3>المدن</h3>
                                            <ul>
                                                @foreach ($City as $Cit)

                                                    <li class=" row d-flex">
                                                        <div class="image"><img width="60px" class=" img-fluid mt-2"
                                                                src="{{ asset("uploads/{$Cit->image}") }}" alt="image">
                                                        </div>
                                                        <strong><a href="{{ url("City/{$Cit->id}") }}">
                                                                <h5> {{ $Cit->name }}</h5>
                                                            </a> </strong>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <h3>التصنيفات</h3>
                                            <ul>
                                                @foreach ($Category as $Categor)

                                                    <li class=" row d-flex">
                                                        <div class="image"><img width="60px" class=" img-fluid mt-2"
                                                                src="{{ asset("uploads/{$Categor->image}") }}"
                                                                alt="image"></div>
                                                        <strong><a href="{{ url("City/{$Categor->id}") }}">
                                                                <h5> {{ $Categor->name }}</h5>
                                                            </a> </strong>
                                                    </li>
                                                @endforeach





                                            </ul>
                                        </div>

                                    </div><!-- End row -->
                                </div><!-- End menu-wrapper -->
                            </li>

                                    {{-- </div><!-- End main-menu -->
                {{-- <ul id="top_tools">
                    <li>
                        <a href="javascript:void(0);" class="search-overlay-menu-btn"><i class="icon_search"></i></a>
                    </li>
                    <li>

                        <div class="dropdown dropdown-cart" >
                            <a href="#" data-toggle="dropdown" class="cart_bt"><i class="icon_search"></i></a>

                            <ul class="dropdown-menu row" id="cart_items" >
                                <div class="row">
                                    <div>
                                        <h2>sadsd</h2>
                                    </div>
                                    <div>
                                        <h2>sdsad</h2>
                                    </div>
                              </div>
                                <li>

                                    <h3 class=" text-center  text-danger">City</h3>
                                    @foreach ($City as $Cit)

                                        <li>
                                            <div class="image"><img class=" mt-2" src="{{asset("uploads/{$Cit->image}")}}" alt="image"></div>
                                            <strong ><a href="{{url("City/{$Cit->id}")}}"><h5> {{$Cit->name}}</h5></a> </strong>
                                        </li>
                                    @endforeach
                                </li>

                                <li>

                                    <h3 class=" text-center  text-danger"> Category</h3>
                                    @foreach ($Category as $Categor)

                                        <li>
                                            <div class="image"><img class=" mt-2" src="{{asset("uploads/{$Categor->image}")}}" alt="image"></div>
                                            <strong><a href="{{url("City/{$Categor->id}")}}"><h5> {{$Categor->name}}</h5></a> </strong>

                                        </li>
                                    @endforeach

                                </li>
                            </ul>

                        </div><!-- End dropdown-cart-->
                    </li>
                </ul> --}}
                </nav>
            </div>
        </div><!-- container -->
    </header><!-- End Header -->







    @yield('main')








    <footer class="revealed">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                    <a href="mailto:help@citytours.com" id="email_footer">help@citytours.com</a>
                </div>
                <div class="col-md-3">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Terms and condition</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Discover</h3>
                    <ul>
                        <li><a href="#">Community blog</a></li>
                        <li><a href="#">Tour guide</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h3>Settings</h3>
                    <div class="styled-select">
                        <select name="lang" id="lang">
                            <option value="English" selected>English</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Russian">Russian</option>
                        </select>
                    </div>
                    <div class="styled-select">
                        <select name="currency" id="currency">
                            <option value="USD" selected>USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="RUB">RUB</option>
                        </select>
                    </div>
                </div>
            </div><!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-vimeo"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                        </ul>
                        <p>© Citytours 2018</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
        <form role="search" action="{{ url('search') }}" id="searchform" method="POST">
            @csrf
            <input value="" name="q" type="search" placeholder="Search..." />
            <button type="submit"><i class="icon_set_1_icon-78"></i>
            </button>
        </form>
    </div><!-- End Search Menu -->

    <!-- Sign In Popup -->
    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="small-dialog-header">
            <h3>Sign In</h3>
        </div>
        <form>
            <div class="sign-in-wrapper">
                <a href="#0" class="social_bt facebook">Login with Facebook</a>
                <a href="#0" class="social_bt google">Login with Google</a>
                <div class="divider"><span>Or</span></div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                </div>
                <div class="clearfix add_bottom_15">
                    <div class="checkboxes float-left">
                        <input id="remember-me" type="checkbox" name="check">
                        <label for="remember-me">Remember Me</label>
                    </div>
                    <div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
                </div>
                <div class="text-center"><input type="submit" value="Log In" class="btn_login"></div>
                <div class="text-center">
                    Don’t have an account? <a href="javascript:void(0);">Sign up</a>
                </div>
                <div id="forgot_pw">
                    <div class="form-group">
                        <label>Please confirm login email below</label>
                        <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <p>You will receive an email containing a link allowing you to reset your password to a new
                        preferred one.</p>
                    <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                </div>
            </div>
        </form>
        <!--form -->
    </div>
    <!-- /Sign In Popup -->

    <!-- Common scripts -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/common_scripts_min_rtl.js') }}"></script>
    <script src="{{ asset('js/functions_rtl.js') }}"></script>

    <!-- Video header scripts -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/video_header.js') }}"></script>
    <script>
        $(document).ready(function() {

            HeaderVideo.init({
                container: $('.header-video'),
                header: $('.header-video--media'),
                videoTrigger: $("#video-trigger"),
                autoPlayVideo: false
            });

        });

    </script>

<script src="{{ asset('js/main.js') }}"></script>


</body>

</html>
