@extends('layout.main_template')
@section('content')
<!-- start main content -->
    <main id="register" class="white-color" role="main">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-sm-12 col-md-8">
                    <div class="heading text-center mt-4">
                        <h2>انشاء حساب جديد</h2>
                        <hr class="hr-bar second-bg first-bar"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex justify-content-center">
                    <div class="side-logo">
                        <div class="logo">
                            <img src="{{asset('assets/images/logo.svg')}}" class="logo-brand" alt="logo">
                            <div class="logo-name">
                                <h5>باب</h5>
                                <h5>رزق</h5>
                            </div>
                        </div>
                        <h2>باب رزق يساعدك فى الحصول على افضل خدمة من افضل الحرفين.</h2>
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
                <div class="col-sm-12 col-md-6">
                    <div class="form-wrapper p-4 m-4">
                        <form action="{{ route('register') }}" class="register-form" id="registerForm" name="register-form" method="post">
                        @csrf
                            <div class="form-row justify-content-between">

                                <div class="form-group position-relative col-sm-12 col-md">
                                    <label for="userName" class="d-block">الاسم</label>
                                    <input 
                                        type="text"
                                        id="userName"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name" 
                                        value="{{ old('name') }}"
                                        autocomplete="name"
                                        placeholder="اكتب اسمك باللغة العربية"
                                        required
                                    />
                                    <span class="position-absolute rounded-circle indicator"></span>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group position-relative col-sm-12 col-md">
                                    <label for="E-mail" class="d-block">
                                        <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> البريد الالكترونى 
                                    </label>
                                    <input 
                                        type="email" 
                                        id="E-mail"
                                        class="form-control" 
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="أدخل البريد الالكترونى الخاص بك"
                                        required
                                    />
                                    <span class="position-absolute rounded-circle indicator"></span>
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-row justify-content-between">

                                <div class="form-group position-relative col-sm">
                                    <label for="pass-word" class="d-block">
                                        <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i>
                                        كلمة المرور
                                    </label>
                                    <input
                                        type="password"
                                        id="pass-word"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        placeholder="ادخل هنا كلمة المرور الخاص بك"
                                        autocomplete="new-password"
                                        required
                                    />
                                    <span class="position-absolute rounded-circle indicator"></span>
                                </div>

                                <div class="form-group position-relative col-sm">
                                    <label for="password-check" class="d-block">
                                        <i class="fas fa-question-circle"></i> تاكيد كلمة المرور 
                                    </label>
                                    <input
                                        type="password"
                                        id="password-confirmation"
                                        class="form-control"  
                                        name="password_confirmation"
                                        placeholder="ادخل هنا كلمة المرور الخاص بك"
                                        autocomplete="new-password"
                                        required
                                    />
                                    <span class="position-absolute rounded-circle indicator"></span>
                                    @error('password_confirmation')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group dropdown position-relative col-sm-6">

                                    <label for="job-select" class="d-block">
                                        <i class="fas fa-question-circle"></i> الوظيفة 
                                    </label>

                                    <select name="jop" id="jop-select" class="form-control">

                                        @foreach($jops as $jop)
                                            <option value="{{$jop->id}}" @error('jop')selected="" @enderror>{{$jop->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group dropdown position-relative col-sm-6">
                                    <label for="country_select" class="d-block"><i class="fas fa-question-circle"></i> البلد </label>
                                    <select name="country_id" id="country_select" class="form-control">
                                        <option value="1">مصر</option>
                                    </select>
                                </div>

                                <div class="form-group dropdown position-relative col-sm">
                                    <label for="government-select" class="d-block"><i class="fas fa-question-circle"></i> المحافظة </label>
                                    <select name="government_id" id="government-select" class="form-control">
                                        <option value="1"  @error('government_id')selected="" @enderror>القاهرة</option>
                                        <option value="2" @error('government_id')selected="" @enderror>الجيزة</option>
                                        <option value="3" @error('government_id')selected="" @enderror>القليوبية</option>
                                        <option value="4" @error('government_id')selected="" @enderror>الاسكندرية</option>
                                        <option value="5" @error('government_id')selected="" @enderror>القاهرة</option>
                                    </select>
                                </div>

                                <div class="form-group dropdown position-relative col-sm">
                                    <label for="city-select" class="d-block"><i class="fas fa-question-circle"></i> المدينة </label>
                                    <select name="city_id" id="city-select" class="form-control">
                                        <option value="1" @error('city_id')selected="" @enderror>القاهرة</option>
                                        <option value="2" @error('city_id')selected="" @enderror>الجيزة</option>
                                        <option value="3" @error('city_id')selected="" @enderror>القليوبية</option>
                                        <option value="4" @error('city_id')selected="" @enderror>الاسكندرية</option>
                                        <option value="5" @error('city_id')selected="" @enderror>القاهرة</option>
                                    </select>
                                </div>

                                <div class="form-group dropdown position-relative col-sm">
                                    <label for="state-select" class="d-block"><i class="fas fa-question-circle"></i> الحى </label>
                                    <select name="state_id" id="state-select" class="form-control">
                                        <option value="1" @error('state_id')selected="" @enderror>القاهرة</option>
                                        <option value="2" @error('state_id')selected="" @enderror>الجيزة</option>
                                        <option value="3" @error('state_id')selected="" @enderror>القليوبية</option>
                                        <option value="4" @error('state_id')selected="" @enderror>الاسكندرية</option>
                                        <option value="5" @error('state_id')selected="" @enderror>القاهرة</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group position-relative col-sm">
                                    <label for="address-text" class="d-block">
                                        <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> العنوان 
                                    </label>
                                    <input 
                                        type="text"
                                        id="address-text"
                                        class="form-control"
                                        name="address"
                                        value="{{ old('address') }}"
                                        placeholder="ادخل العنوان الخاص بك هنا"
                                        required
                                    />
                                    <span class="position-absolute rounded-circle indicator"></span>
                                    @error('address')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group position-relative col-sm">
                                    <label for="nat-id" class="d-block">
                                        <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> الرقم القومى
                                    </label>
                                    <input 
                                        type="number" 
                                        id="nat-id" 
                                        class="form-control" 
                                        name="national_id"
                                        value="{{ old('national_id') }}"
                                        placeholder="ادخل الرقم القومى "
                                        required
                                    />
                                    <span class="position-absolute rounded-circle indicator"></span>
                                    @error('national_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group position-relative col-sm">
                                    <label for="birth-date" class="d-block">
                                        <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> تاريخ الميلاد 
                                    </label>
                                    <input 
                                        type="date" 
                                        id="birth-date" 
                                        class="form-control" 
                                        name="birthdate"
                                        value="{{ old('birthdate') }}"
                                        required
                                    />        
                                </div>
                                <div class="form-group position-relative col-sm">
                                    <label for="phone-num" class="d-block">
                                        <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> رقم الهاتف 
                                    </label>
                                    <input 
                                        type="text" 
                                        id="phone-num" 
                                        class="form-control" 
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        required
                                    />
                                    <span class="position-absolute rounded-circle indicator"></span>
                                    @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group gender position-relative d-flex">
                                    <input 
                                        type="radio" 
                                        id="gender-male" 
                                        class="form-control" 
                                        name="gender" 
                                        value="male"
                                    />
                                    <label class="d-flex align-items-center" for="gender-male">ذكر</label>
                                    <input 
                                        type="radio" 
                                        id="gender-female" 
                                        class="form-control" 
                                        name="gender" 
                                        value="female"
                                    />
                                    <label class="d-flex align-items-center" for="gender-female">أنثى</label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group check-box">
                                    <input 
                                        type="checkbox" 
                                        id="terms" 
                                        class="form-control" 
                                        name="terms-agree" 
                                        required
                                    />
                                    <label class="" for="terms">قرات <a class="" href="#">شروط استخدام باب رزق.</a></label>
                                </div>
                            </div>
                            
                            <div class="form-row justify-content-center align-items-center">
                                <button type="submit" class="mybtn">تسجيل</button>
                                <a href="{{ route('login') }}" class="mybtn text-center">لديك حساب بالفعل</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!-- end main content -->
@endsection