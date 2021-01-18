@extends('layout.admin_template')

@section('content')
<!-- start main content -->
    <main id="#user-update">
        <div class="container p-0">

            <h1 class="white-color h3 mb-3">الاعدادت</h1>
        
            <div class="row">
                <div class="col-md-5 col-xl-4">
                    <div class="position-relative d-flex flex-column mb-4 update-card third-bg">
                        <div class="mb-0 white-bg update-card-header">
                            <h5 class="update-card-title mb-0">اعدادت الملف الشخصى</h5>
                        </div>
                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                            الحساب
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                            كلمة المرور
                            </a>
                            <a class="list-group-item list-group-item-action" href="{{route('delete_user',$user->id)}}">
                            حذف الحساب
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xl-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account" role="tabpanel">
                            <div class="m-2 update-card third-bg">
                                <div class="d-flex justify-content-between mb-0 white-bg update-card-header">
                                    <h5 class="update-card-title mb-0">المعلومات العامة</h5>
                                    <div class="update-card-actions">
                                        <div class="show">
                                            <a href="#" data-display="static">
                                                <svg 
                                                    xmlns="http://www.w3.org/2000/svg" 
                                                    width="24" height="24" viewBox="0 0 24 24" 
                                                    fill="none" stroke="currentColor" 
                                                    stroke-width="2" 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round" 
                                                    class="feather feather-more-horizontal align-middle"
                                                >
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="update-card-body">

                                    <form action="{{ route('update_user',$user->id) }}" enctype="multipart/form-data" method="post" class="update-user" id="update-user">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group position-relative col-sm-12 col-md">
                                                    <label for="userName" class="d-block">الاسم</label>
                                                    <input 
                                                        type="text"
                                                        id="userName"
                                                        class="form-control"
                                                        name="name" 
                                                        value="{{$user->name}}"
                                                    />
                                                    <span class="position-absolute rounded-circle indicator"></span>
                                                </div>
                                                <div class="form-group position-relative col-sm">
                                                    <label for="project-description" class="d-block">
                                                        <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                                        </i>
                                                         النبذة الذاتية  
                                                    </label>
                                                    <textarea 
                                                        id="project-description" 
                                                        class="form-control"
                                                        name="user_bio" 
                                                        rows="2" 
                                                        placeholder="اكتب نبذة مختصرة عنك لتخبر العملاء من انت ولماذا يجب ان يتعملوا معك..."
                                                    >
                                                    </textarea>
                                                    <span class="position-absolute rounded-circle indicator"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <div class="wrapper rounded-circle position-relative">
                                                        <div class="form-row justify-content-center m-4">
                                                            <div class="d-inline-block position-relative rounded-circle image-upload" id="upload-bg">
                                                                <a href="javascript:;" class="fas fa-times position-absolute text-center" onclick="resetImage()"></a>
                                                                <div id="imageUpload" class="fileupload-image position-relative text-right">
                                                                    <input 
                                                                        type="file" 
                                                                        onchange="previewFile()" 
                                                                        title="Envie sua foto" 
                                                                        class="position-absolute" 
                                                                        name="user_image" 
                                                                    />
                                                                    <i class="fas fa-camera position-absolute text-center m-auto"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <small class="mb-2">لافضل النتائج استخدم صورة على الاقل لها ابعاد 128 طول و 128 عرض</small>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="mybtn">حفظ التغيرات</button>
                                    </form>

                                </div>
                            </div>
                            <div class="m-2 p-2 update-card third-bg">
                                <div class="d-flex justify-content-between mb-0 white-bg update-card-header">
                                    <h5 class="update-card-title mb-0">معلومات شخصية</h5>
                                    <div class="update-card-actions">
                                        <div class="show">
                                            <a href="#" data-display="static">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="update-card-body">
                                    <form action="{{ route('update_user',$user->id) }}" enctype="multipart/form-data" method="post" class="update-user">
                                    @csrf  
                                        <div class="form-group position-relative col-sm-12 col-md">
                                            <label for="E-mail" class="d-block">
                                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> البريد الالكترونى 
                                            </label>
                                            <input 
                                                type="email" 
                                                id="E-mail"
                                                class="form-control" 
                                                name="email"
                                                value="{{$user->email}}"
                                            />
                                            <span class="position-absolute rounded-circle indicator"></span>
                                        </div>
                                        <div class="form-group position-relative col-sm">
                                            <label for="address" class="d-block">
                                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> العنوان </label>
                                            <input 
                                                type="text"
                                                id="address"
                                                class="form-control"
                                                name="address"
                                                value="{{$user->address}}"
                                            />
                                            <span class="position-absolute rounded-circle indicator"></span>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group dropdown position-relative col-sm-6">
                                                <label for="jop-select" class="d-block"><i class="fas fa-question-circle"></i> الوظيفة </label>
                                                <select name="jop_id" id="jop-select" class="form-control">
                                                    @foreach($jops as $jop)
                                                        <option value="{{$jop->id}}">{{$jop->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group dropdown position-relative col-sm-6">
                                                <label for="government-select" class="d-block"><i class="fas fa-question-circle"></i> المحافظة </label>
                                                <select name="government_id" id="government-select" class="form-control">
                                                    <option value="1">القاهرة</option>
                                                    <option value="2">الجيزة</option>
                                                    <option value="3">القليوبية</option>
                                                    <option value="4">الاسكندرية</option>
                                                    <option value="5">القاهرة</option>
                                                </select>
                                            </div>
                                            <div class="form-group dropdown position-relative col-sm-6">
                                                <label for="city-select" class="d-block"><i class="fas fa-question-circle"></i> المدينة </label>
                                                <select name="city_id" id="city-select" class="form-control">
                                                    <option value="1">القاهرة</option>
                                                    <option value="2">الجيزة</option>
                                                    <option value="3">القليوبية</option>
                                                    <option value="4">الاسكندرية</option>
                                                    <option value="5">القاهرة</option>
                                                </select>
                                            </div>
                                            <div class="form-group dropdown position-relative col-sm-6">
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
                                        <button type="submit" class="mybtn">حفظ التغيرات</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="password" role="tabpanel">
                            <div class="m-2 p-2 update-card third-bg">
                                <div class="update-card-body">
                                    <h5 class="update-card-title">كلمة المرور</h5>

                                    <form action="{{ route('update_user',$user->id) }}" enctype="multipart/form-data" method="post" class="update-user">
                                        <div class="form-group position-relative col-sm">
                                            <label for="user-password" class="d-block">
                                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                                                </i>
                                                    كلمة المرور الحالية
                                            </label>
                                            <input
                                                type="password"
                                                id="user-password"
                                                class="form-control" 
                                                name="old-password"
                                            />
                                            <span class="position-absolute rounded-circle indicator"></span>
                                        </div>
                                        <div class="form-group position-relative col-sm">
                                            <label for="user-password" class="d-block">
                                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                                                </i>
                                                    كلمة المرور الجديدة
                                            </label>
                                            <input
                                                type="password"
                                                id="user-password"
                                                class="form-control" 
                                                name="new-password"
                                                placeholder="ادخل هنا كلمة المرور الجديدة"
                                            />
                                            <span class="position-absolute rounded-circle indicator"></span>
                                        </div>
                                        <div class="form-group position-relative col-sm">
                                            <label for="password" class="d-block">
                                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                                                </i>
                                                تاكيد كلمة المرور الجديدة
                                            </label>
                                            <input
                                                type="password"
                                                id="password"
                                                class="form-control" 
                                                name="new-password_confirmation"
                                                placeholder="ادخل هنا تاكيد كلمة المرور الجديدة"
                                            />
                                            <span class="position-absolute rounded-circle indicator"></span>
                                        </div>
                                        <button type="submit" class="mybtn">حفظ التغيرات</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!-- end main content -->
@endsection