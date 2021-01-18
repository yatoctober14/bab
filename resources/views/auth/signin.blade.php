@extends('layout.main_template')
@section('content')
<!-- start main content -->
    <main id="login" class="white-color" role="main">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-sm-12 col-md-8">
                    <div class="heading text-center mt-4">
                        <h2>تسجيل الدخول</h2>
                        <hr class="hr-bar second-bg first-bar"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 d-flex justify-content-center">
                    <div class="side-logo">
                        <div class="logo">
                            <img src="{{asset('assets/images/logo.svg')}}" class="logo-brand" alt="logo">
                            <div class="logo-name">
                                <h5>باب</h5>
                                <h5>رزق</h5>
                            </div>
                        </div>
                        <h2>مرحبا بك من جديد.</h2>
                        <div class="social-media d-flex flex-column">
                            <a href="#" class="facebook social-btn d-block text-center p-3 m-3">
                                باستخدام فيسبوك
                                <img src="{{asset('assets/images/facebook-icon.png')}}" alt="facebook-icon"/>
                            </a>
                            <a href="#" class="google social-btn d-block text-center p-3 m-3">
                                باستخدام جوجل
                                <img src="{{asset('assets/images/google-icon.svg')}}" alt="google-icon"/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xm-12 col-md-6">
                    <div class="form-wrapper p-4 m-4">
                        <form action="{{ route('login') }}" method="post" class="login-form" id="loginForm" name="login-form">
                        @csrf
                            <div class="form-row">
                                <div class="form-group position-relative col-sm-12">
                                    <label for="email" class="d-block"> البريد الالكترونى </label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        class="form-control" 
                                        name="email" 
                                        placeholder="أدخل البريد الالكترونى الخاص بك"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="form-row justify-content-between">
                                <div class="form-group position-relative col-sm">
                                    <label for="password" class="d-block"> كلمة المرور </label>
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control" 
                                        name="password"
                                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                                        placeholder="ادخل هنا كلمة المرور الخاص بك"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group check-box">
                                    <input 
                                        type="checkbox" 
                                        id="terms" 
                                        class="form-control" 
                                        name="remember" 
                                    />
                                    <label for="terms">تذكرنى</label>
                                </div>
                            </div>
                            <div class="form-row justify-content-center align-items-center">
                                <button type="submit" class="mybtn">دخول</button>
                                <a href="{{ route('register') }}" class="mybtn text-center">انشاء حساب جديد</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!-- end main content -->
@endsection