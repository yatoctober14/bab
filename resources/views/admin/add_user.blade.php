@extends('layout.admin_template')

@section('content')
<!-- start main content -->
<main id="create_user" class="white-color black-bg" role="main">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8">
            <div class="heading text-center mt-4">
                <h2>أضافة مستخدم جديد</h2>
                <hr class="hr-bar second-bg first-bar"/>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-8">

            <div class="form-wrapper p-4 m-4">
                <form action="{{route('add_user')}}" method="post" enctype="multipart/form-data" class="create-user" id="create-user">
                    @csrf
                    <div class="form-row justify-content-center m-4">
                        <div class="d-inline-block position-relative rounded-circle image-upload" id="upload-bg">
                            <a href="javascript:;" class="fas fa-times position-absolute text-center" onclick="resetImage()"></a>
                            <div id="imageUpload" class="fileupload-image position-relative text-right">
                                <input 
                                    type="file" 
                                    onchange="previewFile()" 
                                    class="position-absolute" 
                                    name="user_image"
                                    required
                                />
                                <i class="fas fa-camera position-absolute text-center m-auto"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row justify-content-between">

                        <div class="form-group position-relative col-sm-12 col-md">
                            <label for="userName" class="d-block">الاسم</label>
                            <input 
                                type="text"
                                id="userName"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name" 
                                value="{{ old('name') }}"
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
                            <label for="password" class="d-block">
                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                                </i>
                                    كلمة المرور
                            </label>
                            <input
                                type="password"
                                id="password"
                                class="form-control" 
                                name="password"
                                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                                placeholder="ادخل هنا كلمة المرور الخاص بك"
                                required
                            />
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                        <div class="form-group position-relative col-sm">
                            <label for="password-check" class="d-block"><i class="fas fa-question-circle"></i>  كلمة المرور</label>
                            <input
                                type="password"
                                id="password-check"
                                class="form-control" 
                                name=""
                                placeholder="تاكيد كلمة المرور"
                                required
                            />
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group dropdown position-relative col-sm-6">
                            <label for="jop-select" class="d-block"><i class="fas fa-question-circle"></i> الوظيفة </label>
                            <select name="jop" id="jop-select" class="form-control">
                                @foreach($jops as $jop)
                                    <option value="{{$jop->id}}">{{$jop->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group dropdown position-relative col-sm-6">
                            <label for="country_select" class="d-block"><i class="fas fa-question-circle"></i> البلد </label>
                            <select name="country_id" id="country_select" class="form-control">
                                <option value="1">القاهرة</option>
                                <option value="2">الجيزة</option>
                                <option value="3">القليوبية</option>
                                <option value="4">الاسكندرية</option>
                                <option value="5">القاهرة</option>
                            </select>
                        </div>
                        <div class="form-group dropdown position-relative col-sm">
                            <label for="government-select" class="d-block"><i class="fas fa-question-circle"></i> المحافظة </label>
                            <select name="government_id" id="government-select" class="form-control">
                                <option value="1">القاهرة</option>
                                <option value="2">الجيزة</option>
                                <option value="3">القليوبية</option>
                                <option value="4">الاسكندرية</option>
                                <option value="5">القاهرة</option>
                            </select>
                        </div>
                        <div class="form-group dropdown position-relative col-sm">
                            <label for="city-select" class="d-block"><i class="fas fa-question-circle"></i> المدينة </label>
                            <select name="city_id" id="city-select" class="form-control">
                                <option value="1">القاهرة</option>
                                <option value="2">الجيزة</option>
                                <option value="3">القليوبية</option>
                                <option value="4">الاسكندرية</option>
                                <option value="5">القاهرة</option>
                            </select>
                        </div>
                        <div class="form-group dropdown position-relative col-sm">
                            <label for="state-select" class="d-block"><i class="fas fa-question-circle"></i> الحى </label>
                            <select name="state_id" id="state-select" class="form-control">
                                <option value="1">القاهرة</option>
                                <option value="2">الجيزة</option>
                                <option value="3">القليوبية</option>
                                <option value="4">الاسكندرية</option>
                                <option value="5">القاهرة</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group position-relative col-sm">
                            <label for="address" class="d-block">
                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> العنوان </label>
                            <input 
                                type="text"
                                id="address"
                                class="form-control"
                                name="address"
                                placeholder="ادخل هنا العنوان الخاص بك"
                                required
                            />
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                        <div class="form-group position-relative col-sm">
                            <label for="national-id" class="d-block">
                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> الرقم القومى </label>
                            <input 
                                type="number" 
                                id="national-id" 
                                class="form-control" 
                                name="national_id" 
                                placeholder="ادخل الرقم القومى "
                                required
                            />
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group position-relative col-sm">
                            <label for="birth-date" class="d-block">
                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> تاريخ الميلاد </label>
                            <input 
                                type="date" 
                                id="birth-date" 
                                class="form-control" 
                                name="birthdate"
                                required
                            />
                            <span class="position-absolute rounded-circle indicator"></span>
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
                    <div class="form-row justify-content-center align-items-center">
                        <button type="submit" class="mybtn">أضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- end main content -->
@endsection