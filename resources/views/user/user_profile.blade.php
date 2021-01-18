@extends('layout.admin_template')

@section('content')
<!-- start main content -->
<main>
    <div class="profile-page sidebar-collapse">
        <div class="d-flex align-items-center page-header header-filter" data-parallax="true" style="background-image:url({{asset($user->user_image)}});">
        </div>
        <div class="position-relative themain themain-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="text-center profile">
                                <div>
                                    <img 
                                        src="{{asset($user->user_image)}}" 
                                        alt="صورة المستخدم" 
                                        class="img-raised rounded-circle img-fluid"
                                    />
                                </div>
                                <div class="name">
                                    <h3 class=" white-color title">{{$user->name}}</h3>
                                    <h6 class="h4 white-color">{{$user->jop->name}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center white-color description">
                        <p>{{$user->user_bio}}</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="profile-tabs">
                                <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                    @if(Auth::user()->jop_id == 1)
                                    <li class="nav-item position-relative">
                                        <a class="nav-link text-center active white-color" href="#work" role="tab" data-toggle="tab">
                                        <i class="fas fa-briefcase d-block icon"></i> المشروعات
                                        </a>
                                    </li>
                                    @endif
                                    <li class="nav-item position-relative">
                                        <a class="nav-link text-center white-color" href="#myoffers" role="tab" data-toggle="tab">
                                        <i class="fas fa-clipboard-list d-block icon"></i> عروضى
                                        </a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link text-center white-color" href="{{route('update_user_page',$user->id)}}">
                                        <i class="fas fa-cog d-block icon"></i> الاعدادت
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-space">

                        <div class="tab-pane work active show" id="work">
                            <div class="row">
                            @if(Auth::user()->jop_id == 1)
                                <div class="col-md-7 ml-auto mr-auto ">

                                    <h4 class="white-color title">المشروعات الخاصة بى</h4>

                                    <div class="row collections">
                                    @foreach($user->projects as $project)
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="d-flex flex-column justify-content-center card-body">
                                                <h2 class="first-color card-title">{{$project->name}}</h2>
                                                <p>{{$project->description}}</p>
                                                <a href="{{route('project_offers_page',$project->id)}}" class="user-button text-center transition-bg p-2 m-2"> مشاهدة العروض </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            @endif

                                <div class="col-md-2 mr-auto ml-auto white-color stats card">
                                    <h4 class="title">المعلومات الشخصية </h4>
                                    <ul class="list-unstyled">
                                        <li> المشروعات <b>60</b> </li>
                                        <li> المشروعات المنفذة <b>4</b> </li>
                                        <li> العروض المقدمة <b>331</b> </li>
                                    </ul>
                                    <hr class="second-bg hr-bar">
                                    <h4 class="title">السكن</h4>
                                    <ul class="list-unstyled">
                                        <li> المحافظة <b>{{$user->government_id}}</b> </li>
                                        <li> المدينة <b>4</b> </li>
                                        <li> الحى <b>331</b> </li>
                                    </ul>
                                    <hr class="second-bg hr-bar">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane offers" id="myoffers">
                            
                            <div class="row">
                            @foreach($user->offers as $offer)
                                <div class="col-md-5 ml-auto mr-auto">
                                    <div class="card card-profile card-plain">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="position-relative p-0 card-header m-0 card-header-image">
                                                    <a href="#" class="d-block">
                                                        <img class="w-100 img"  src="{{asset($offer->worker->user_image)}}">
                                                    </a>
                                                    <div class="h-100 w-100 position-absolute colored-shadow" style="background-image: url({{asset($offer->worker->user_image)}});"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h4 class="white-color card-title">{{$offer->worker->name}}</h4>
                                                    <h6 class="second-color card-jop text-muted">{{$offer->worker->jop->name}}</h6>

                                                    <p class="first-color card-description">{{$offer->description}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center position-absolute control">
                                                <a href="{{route('update_offer_page',$offer->id)}}" class="d-block settings m-2 first-color fas fa-edit" title="تعديل" data-toggle="tooltip"></a>
                                                <a href="{{route('delete_offer',$offer->id)}}" class="d-block delete m-2 text-danger fas fa-times-circle" title="حذف" data-toggle="tooltip"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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