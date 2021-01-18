<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
    <meta name="author" content="Muhammad Jamal"/>
    <meta name="description" content=""/>
    <!--Title Icon-->
    <link rel="shortcut icon" href="{{asset('assets/images/logo.svg')}}" type="image/x-icon"/>
    <!--Title-->
    <title>باب رزق</title>
    <!--Bootstrap Style Sheet-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.min.css')}}"/>
    <!--Font Awosome Style Sheet-->
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}"/>
    @yield('css')
    <!--Main Style Sheet-->
    <link rel="styleSheet" href="{{asset('assets/css/style.css')}}"/>
    
</head>
<body class="black-bg">
    <!-- start header -->
    <header id="home">
    <!-- start navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}">
                    <div class="logo">
                        <img src="{{asset('assets/images/logo.svg')}}" class="logo-brand" alt="logo">
                        <div class="logo-name">
                            <h5>باب</h5>
                            <h5>رزق</h5>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav">
                    <i class="fa fa-bars first-color first-hover-second"></i>
                </button>
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="navbar-nav ml-auto">
                    @if(url()->current()==route('home'))
                        <li class="nav-item active">
                            <a class="nav-link first-color transition-bg" href="#">الرئيسية</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link first-color transition-bg" href="{{route('home')}}">الرئيسية</a>
                        </li>
                    @endif
                    @if(url()->current()==route('all_projects'))
                        <li class="nav-item active">
                            <a class="nav-link first-color transition-bg" href="#">تصفح المشاريع</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link first-color transition-bg" href="{{route('all_projects_guest')}}">تصفح المشاريع</a>
                        </li>
                    @endif
                    @if(url()->current()==route('how_it_work'))
                        <li class="nav-item active">
                            <a class="nav-link first-color transition-bg" href="#">كيف يعمل باب رزق</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link first-color transition-bg" href="{{route('how_it_work')}}">كيف يعمل باب رزق</a>
                        </li>
                    @endif
                    @if(url()->current()==route('about'))
                        <li class="nav-item active">
                            <a class="nav-link first-color transition-bg" href="#">من نحن</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link first-color transition-bg" href="{{route('about')}}">من نحن</a>
                        </li>
                    @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle first-color transition-bg" href="./templates/services.html" id="navbarDropdown" role="button" data-toggle="dropdown">
                                خدماتنا
                            </a>
                            <div class="dropdown-menu dropdown-menu-right white-bg text-center">
                            @foreach($jops as $jop)
                                <a class="dropdown-item first-color transition-bg" href="#">{{$jop->name}}</a>
                            @endforeach
                            </div>
                        </li>
                        @if(Auth::check() && Auth::user()->role >= 1)
                        <li class="nav-item">
                            <a class="nav-link first-color transition-bg" href="{{route('users')}}">مسئول الموقع</a>
                        </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav navbar-left">
                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="mybtn text-center" href="{{ route('register') }}">انضم الينا</a>
                        </li>
                        <li class="nav-item">
                            <a class="mybtn text-center" href="{{ route('login') }}">دخول</a>
                        </li>
                    @else
                    
                        <li class="nav-item name">
                            <a class="nav-link first-color transition-bg" href="#">{{Auth::user()->name}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-inline-flex justify-content-center align-items-center avatar" href="#">
                                <img src="{{asset(Auth::user()->user_image)}}" class="rounded-circle w-100" alt="صورة المستخدم"/>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-header">
                                    <h6 class="text-overflow m-0">مرحبا بك!</h6>
                                </div>
                                @if(url()->current()==route('user_profile'))
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user second-color ml-3"></i>
                                        حسابى
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{route('user_profile')}}">
                                        <i class="fas fa-user second-color ml-3"></i>
                                        حسابى
                                    </a>
                                @endif
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-hand-holding-usd second-color ml-3"></i>
                                    عروضى
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cog second-color ml-3"></i>
                                    الاعدادت
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-life-ring second-color ml-3"></i>
                                    المساعدة
                                </a>
                                <a 
                                    class="dropdown-item"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                >
                                    <i class="fas fa-sign-out-alt second-color ml-3"></i>
                                    خروج
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
    <!-- end navbar -->
    @yield('slider')
    
    
    </header>
<!-- end header -->