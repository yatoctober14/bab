@extends('layout.admin_template')

@section('content')
<!-- start main content -->
<main id="users-admin">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title white-color first-bg">
                            <div class="row d-flex justify-content-between">
                            @if(isset($users))
                                <div class="col-sm-5">
                                    <h2>ادارة <b> المستخدمين </b></h2>
                                </div>
                            @elseif(isset($admins))
                                <div class="col-sm-5">
                                    <h2>ادارة <b> مسئولين الموقع </b></h2>
                                </div>
                            @elseif(isset($workers))
                                <div class="col-sm-5">
                                    <h2>ادارة <b> العمال </b></h2>
                                </div>
                            @elseif(isset($owners))
                                <div class="col-sm-5">
                                    <h2>ادارة <b> اصحاب المشاريع </b></h2>
                                </div>
                            @endif
                                <div class="col-sm-7 text-left">
                                    <a href="{{route('add_user_page')}}" class="d-inline-block white-bg first-color btn" ><i class="fas fa-plus-square"></i> <span>اضافة مستخدم</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>التسلسل</th>
                                    <th>الاسم</th>						
                                    <th>تاريخ الانضمام</th>
                                    <th>الوظيفة</th>
                                    <th>الحالة</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="#" class="font-weight-bold first-color">
                                                <img src="{{asset($user->user_image)}}" class="rounded-circle avatar" alt="Avatar"> {{$user->name}} 
                                            </a>
                                        </td>
                                        <td>{{$user->created_at}}</td>                        
                                        <td>{{$user->jop->name}}</td>
                                        <td><span class="d-inline-block status text-success">&bull;</span> متواجد الان</td>
                                        <td class="d-flex">
                                            @if(Auth::user()->id == $user->id)
                                            <a href="{{route('update_user_page',$user->id)}}" class="d-inline-block settings text-warning" title="تعديل" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                            @endif
                                            <a href="{{route('delete_user',$user->id)}}" class="d-inline-block delete text-danger" title="حذف" data-toggle="tooltip"><i class="fas fa-times-circle"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif(isset($admins))
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="#" class="font-weight-bold first-color">
                                                <img src="{{asset($admin->user_image)}}" class="rounded-circle avatar" alt="Avatar"> {{$admin->name}} 
                                            </a>
                                        </td>
                                        <td>{{$admin->created_at}}</td>                        
                                        <td>{{$admin->jop->name}}</td>
                                        <td><span class="d-inline-block status text-success">&bull;</span> متواجد الان</td>
                                        <td class="d-flex">
                                            @if(Auth::user()->id == $admin->id)
                                            <a href="{{route('update_user_page',$admin->id)}}" class="d-inline-block settings text-warning" title="تعديل" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                            @endif
                                            <a href="#" class="d-inline-block delete text-danger" title="حذف" data-toggle="tooltip"><i class="fas fa-times-circle"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif(isset($workers))
                                @foreach($workers as $worker)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="#" class="font-weight-bold first-color">
                                                <img src="{{asset($worker->user_image)}}" class="rounded-circle avatar" alt="Avatar"> {{$worker->name}} 
                                            </a>
                                        </td>
                                        <td>{{$worker->created_at}}</td>                        
                                        <td>{{$worker->jop->name}}</td>
                                        <td><span class="d-inline-block status text-success">&bull;</span> متواجد الان</td>
                                        <td class="d-flex">
                                            @if(Auth::user()->id == $worker->id)
                                            <a href="{{route('update_user_page',$worker->id)}}" class="d-inline-block settings text-warning" title="تعديل" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                            @endif
                                            <a href="{{route('delete_user',$worker->id)}}" class="d-inline-block delete text-danger" title="حذف" data-toggle="tooltip"><i class="fas fa-times-circle"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif(isset($owners))
                                @foreach($owners as $owner)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="#" class="font-weight-bold first-color">
                                                <img src="{{asset($owner->user_image)}}" class="rounded-circle avatar" alt="Avatar"> {{$owner->name}} 
                                            </a>
                                        </td>
                                        <td>{{$owner->created_at}}</td>                        
                                        <td>{{$owner->jop->name}}</td>
                                        <td><span class="d-inline-block status text-success">&bull;</span> متواجد الان</td>
                                        <td class="d-flex">
                                            @if(Auth::user()->id == $owner->id)
                                            <a href="{{route('update_user_page',$owner->id)}}" class="d-inline-block settings text-warning" title="تعديل" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                            @endif
                                            <a href="{{route('delete_user',$owner->id)}}" class="d-inline-block delete text-danger" title="حذف" data-toggle="tooltip"><i class="fas fa-times-circle"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <ul class="pagination">
                                <li class="page-item disabled"><a href="#" class="first-color">الصفحة السابقة</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link">الصفحة التالية</a></li>
                            </ul>
                            <p class="text-left">المعروض <b>5</b> من <b>25</b> مستخدم</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- end main content -->
@endsection