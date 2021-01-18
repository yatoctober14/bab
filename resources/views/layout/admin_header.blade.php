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
    <header id="admin-header">
        <!-- start navbar  -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                @if(Auth::user()->role >= 1)    
                    <a class="nav-link fa fa-bars first-color first-hover-second" id="sidebarCollapse" href="#"></a>
                @endif
                    <a class="navbar-brand" href="{{route('home')}}">
                        <div class="logo">
                            <img src="{{asset('assets/images/logo.svg')}}" class="logo-brand" alt="logo">
                            <div class="logo-name">
                                <h2>باب</h2>
                                <h2>رزق</h2>
                            </div>
                        </div>
                    </a>
                    <button class="navbar-toggler fa fa-bars first-color first-hover-second" type="button" data-toggle="collapse" data-target="#main-nav">
                    </button>
                    <div class="collapse navbar-collapse" id="main-nav">
                        <ul class="navbar-nav ml-auto">
                        @if(url()->current()==route('add_project_page'))
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-plus second-color"></i>
                                    اضافة مشروع
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('add_project_page')}}">
                                    <i class="fas fa-plus second-color"></i>
                                    اضافة مشروع
                                </a>
                            </li>
                        @endif
                        @if(url()->current()==route('all_projects'))
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-briefcase second-color"></i>
                                    المشاريع الحديثة
                                </a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('all_projects')}}">
                                    <i class="fas fa-briefcase second-color"></i>
                                    المشاريع الحديثة
                                </a>
                            </li>
                        @endif

                            <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-clipboard-list second-color"></i>
                                    عروضى
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-auto navbar-left align-items-center">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-inline-flex justify-content-center align-items-center avatar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
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
                        </ul>
                    </div>
                </div>
            </nav>
        <!-- end navbar -->
        @if(Auth::user()->role >= 1)
        <!-- start sidebar -->
            <div class="wraper d-flex">
                <nav id="sidebar-menu" class="fifth-bg d-flex justify-content-center position-fixed">

                    <ul class="sidebar-menu-items list-unstyled w-100">

                        <div class="fifth-bg w-100 d-flex justify-content-center align-items-center sidebar-header">
                            <a href="#" id="close-sidebar">
                                <i class="fas fa-times pl-3 second-color"></i>
                            </a>
                            <div class="mr-4 d-flex logo">
                                <img src="{{asset('assets/images/logo.svg')}}" class="logo-brand" alt="logo">
                                <div class="logo-name">
                                    <h2 class="first-color font-weight-bold">باب</h2>
                                    <h2 class="second-color font-weight-bold">رزق</h2>
                                </div>
                            </div>
                        </div>

                        <hr class="second-bg m-3"/>
                        
                        <div class="sidebar-section d-flex flex-column justify-content-center">
                            <li class="sidebar-link d-flex justify-content-start p-3"><a href="{{route('add_user_page')}}" class="mr-3 white-color"><i class="fas fa-calculator pl-3 second-color"></i> اضافة مستخدم </a></li>
                            <li class="sidebar-link d-flex justify-content-start p-3"><a href="{{route('admins')}}" class="mr-3 white-color"><i class="fas fa-calculator pl-3 second-color"></i> مسئولين الموقع </a></li>
                            <li class="sidebar-link d-flex justify-content-start p-3"><a href="{{route('workers')}}" class="mr-3 white-color"><i class="fas fa-fire pl-3 second-color"></i> العمال </a></li>
                            <li class="sidebar-link d-flex justify-content-start p-3"><a href="{{route('owners')}}" class="mr-3 white-color"><i class="fas fa-fire pl-3 second-color"></i> اصحاب المشاريع </a></li>
                            <li class="sidebar-link d-flex justify-content-start p-3"><a href="{{route('users')}}" class="mr-3 white-color"><i class="fas fa-fire pl-3 second-color"></i> كل المستخدمين </a></li>
                        </div>
                        
                        <hr class="second-bg"/>

                        <div class="sidebar-section d-flex flex-column justify-content-center">
                            <li class="sidebar-link d-flex justify-content-start p-3"><a href="{{route('jops')}}#" class="mr-3 white-color"><i class="fas fa-fire pl-3 second-color"></i> الوظائف </a></li>
                            <li class="sidebar-link d-flex justify-content-start p-3"><a href="{{route('projects')}}" class="mr-3 white-color"><i class="fas fa-fire pl-3 second-color"></i> المشاريع </a></li>
                            <li class="sidebar-link d-flex justify-content-start p-3"><a href="{{route('offers')}}" class="mr-3 white-color"><i class="fas fa-fire pl-3 second-color"></i> العروض </a></li>
                        </div>
                    </ul>                
                </nav>
            </div>
        <!-- end sidebar -->
        @endif
    </header>
        

