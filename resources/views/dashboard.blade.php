<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
          content="موقع اطفالنا ">
    <meta name="keywords"
          content="موقع اطفالنا">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard </title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/logo/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/logo/logo.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/charts/chart-apex.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css-rtl/plugins/extensions/ext-component-toastr.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="#">
                        <i class="ficon" data-feather="menu"></i></a>
                </li>
            </ul>

        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">


            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style">
                    <i class="ficon" data-feather="moon"></i></a>
            </li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search">
                    <i class="ficon" data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
                           data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                   data-bs-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name fw-bolder">{{\Illuminate\Support\Facades\Auth::user()->name}}</span><span
                            class="user-status">Admin</span></div>
                    <span class="avatar">
                        <img class="round" src="{{asset('app-assets/images/logo/logo.png')}}" alt="avatar"
                             height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{route('profile.edit')}}">
                        <i class="me-50" data-feather="user"></i> Profile</a>


                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="me-50" data-feather="power"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{route('home')}}"><span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" height="24"><defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                                    y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                                    x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>

                                                                <img src="{{asset('app-assets/images/logo/logo.png')}}"
                                                                     width="35px" height="50px">
                            </svg></span>
                    <h2 class="brand-text">اطفالنا</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
{{--                <idata-feather="more-horizontal"></i></li>--}}
            <li class=" @if($menu =="categoryofgame") active @endif nav-item"><a class="d-flex align-items-center"
                                                                                 href="{{route('categoryofgames.index')}}">
                    <i data-feather="life-buoy"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">تصنيفات  الالعاب</span></a>
            </li>
            <li class="@if($menu =="games") active @endif nav-item"><a class="d-flex align-items-center"
                                                                       href="{{route('games.index')}}"><i
                        data-feather="life-buoy"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">العب واستمتع</span></a>
            </li>
            <li class=" @if($menu =="voiccategory") active @endif nav-item"><a class="d-flex align-items-center"
                                                                               href="{{route('voice-category.index')}}">
                    <i data-feather="mic"></i>
                    <span class="menu-title text-truncate" data-i18n="Todo"> تصنيفات تلاوة القارئ الصغير</span></a>
            </li>
            <li class="@if($menu =="voice") active @endif nav-item"><a class="d-flex align-items-center"
                                                                       href="{{route('voice.index')}}">
                    <i data-feather="mic"></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">  تلاوة القارئ الصغير </span></a>
            </li>
            <li class=" @if($menu =="translationcategory") active @endif nav-item"><a class="d-flex align-items-center"
                                                                                      href="{{route('translation-category.index')}}">
                    <i data-feather="type"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">تصنيفات التفاسير</span></a>
            </li>
            <li class=" @if($menu =="translation") active @endif nav-item"><a class="d-flex align-items-center"
                                                                              href="{{route('translation.index')}}">
                    <i data-feather="type"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">التفاسير</span></a>
            </li>
            <li class="@if($menu =="questioncqteory") active @endif nav-item"><a class="d-flex align-items-center"
                                                                                 href="{{route('question-category.index')}}">
                    <i data-feather="type"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">تصنيفات اختبر معلوماتك </span></a>
            </li>
            <li class="@if($menu =="question") active @endif nav-item"><a class="d-flex align-items-center"
                                                                          href="{{route('question.index')}}">
                    <i data-feather="type"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">اختبر معلوماتك </span></a>
            </li>
            <li class="@if($menu =="contact") active @endif nav-item"><a class="d-flex align-items-center"
                                                                         href="{{route('contact.index')}}">
                    <i data-feather="mail"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">تواصل معنا</span></a>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <div class="alert-body">
                        {{$error}}
                    </div>
                </div>
            @endforeach
            @yield('body')


        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy;

<script>
    var today = new Date();
    document.write(today.getFullYear());
</script>
            <span
                class="d-none d-sm-inline-block">, All rights Reserved</span></span><span
            class="float-md-end d-none d-md-block">Hand-crafted & Made with love<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
{{--<script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>--}}
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

</html>
