@extends('layout.admin_template')

@section('content')
<!-- start main content -->
<main id="projects-admin">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title white-color first-bg">
                            <div class="row d-flex justify-content-between">
                                <div class="col-sm-5">
                                    <h2>ادارة <b>المشروعات</b></h2>
                                </div>
                                <div class="col-sm-7 text-left">
                                    <a href="{{route('add_project_page')}}" class="d-inline-block white-bg first-color btn" ><i class="fas fa-plus-square"></i> <span>اضافة مشروع</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>التسلسل</th>
                                    <th>صاحب المشروع</th>					
                                    <th>تاريخ المشروع</th>
                                    <th>الوظيفة المطلوبة</th>
                                    <th>السعر المعروض</th>
                                    <th>الفترة المطلوبة بالايام</th>
                                    <th>العروض المقدمة</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="#" class="font-weight-bold first-color">
                                            <img src="{{asset($project->owner->user_image)}}" class="rounded-circle avatar" alt="Avatar"> 
                                            {{$project->owner->name}}
                                        </a>
                                    </td>
                                    <td>{{$project->created_at}}</td>                        
                                    <td>{{$project->jop->name}}</td>
                                    <td>
                                        {{$project->price}}
                                    </td>
                                    <td>
                                        <span class="d-inline-block status">
                                            {{$project->duration_in_days}}
                                        </span> أيام
                                    </td>

                                    <td>
                                        <span class="d-inline-block status">
                                            {{count($project->offers)}}
                                        </span> عروض
                                    </td>
                                    <td class="d-flex">
                                    @if(Auth::user()->id == $project->owner->id)
                                        <a href="{{route('update_project_page',$project->id)}}" class="d-inline-block edit second-color m-2 p-2 fas fa-edit" title="تعديل" data-toggle="tooltip"></a>
                                        <a href="{{route('delete_project',$project->id)}}" class="d-inline-block delete text-danger m-2 p-2 fas fa-times-circle" title="حذف" data-toggle="tooltip"></a>
                                    @else
                                        <a href="{{route('add_offer_page',$project->id)}}" class="d-inline-block delete text-success m-2 p-2 fas fa-plus-square" title="اضافة عرضك" data-toggle="tooltip"></a>
                                        <a href="{{route('delete_project',$project->id)}}" class="d-inline-block delete text-danger m-2 p-2 fas fa-times-circle" title="حذف" data-toggle="tooltip"></a>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
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