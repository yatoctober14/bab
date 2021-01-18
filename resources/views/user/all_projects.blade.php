@extends('layout.main_template')
    @if($authorized)
        @section('content')
        <!-- start main content -->
            <main id="user-projects">
                <!-- start jops column -->
                <section class="services-column white-color">
                    <div id="jopFilters">
                        <h2 class="h1 text-center my-5">الخدمات المختارة</h2>
                    </div>
                    <h2 class="h1 text-center my-5">اختار الخدمة</h2>
                    @foreach($jops as $jop)
                        @if($jop->id > 1)
                        <div class="form-row">
                            <div class="form-group check-box">
                                <input 
                                    type="checkbox" 
                                    id="{{$jop->id}}" 
                                    class="form-control" 
                                    name="service" 
                                    required
                                />
                                <label class="second-color" for="terms">{{$jop->name}}</label>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </section>
                <!-- end jops column -->

                <!-- start all projects -->
                <section>
                    <div class="container-fluid">
                        <h1 class="text-center my-5 white-color">المشاريع المتاحة</h1>
                        <div class="row d-flex flex-column p-5 projects-list">
                        @foreach($projects as $project)
                            <article class="d-flex flex-column position-relative w-100 p-4 second-bg project-card">
                                <header class="project-header">
                                    <p>
                                        {{$project->created_at}}
                                    </p>
                                    <div class="position-relative align-items-center project-owner">
                                        <a href="#" class="owner-avatar">
                                            <img src="{{asset($project->owner->user_image)}}" class="d-block rounded-circle" alt="">
                                        </a>
                                        <svg class="position-absolute half-circle" viewBox="0 0 106 57">
                                            <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                                        </svg>
                                        <div class="font-weight-bold first-color owner-name">
                                            <div class="owner-role">{{$project->owner->jop->name}}</div>
                                            {{$project->owner->name}}
                                        </div>
                                    </div>
                                    @if(Auth::user()->id == $project->owner->id)
                                        <div class="d-flex align-items-center justify-content-center position-absolute control">
                                            <a href="{{route('update_project_page',$project->id)}}" class="d-block settings m-2 first-color fas fa-edit" title="تعديل" data-toggle="tooltip"></a>
                                            <a href="{{route('delete_project',$project->id)}}" class="d-block delete m-2 text-danger fas fa-times-circle" title="حذف" data-toggle="tooltip"></a>
                                        </div>
                                    @endif
                                </header>
                                <h2>{{$project->name}}</h2>
                                <p>{{$project->description}}
                                    <h2>الوظيفة المطلوبة : {{$project->jop->name}}</h2>
                                </p>
                                @if(!(Auth::user()->id == $project->owner->id))
                                    <a href="{{route('add_offer_page',$project->id)}}" class="text-center font-weight-bold p-2 m-4 transition-bg second-color first-bg submit-offer"> قدم عرصك </a>
                                @else
                                    <div class="d-flex">
                                        <a href="#" class="text-center font-weight-bold p-2 m-4 transition-bg second-color first-bg submit-offer"> المشروع اكتمل </a>    
                                        <a href="{{route('project_offers_page',$project->id)}}" class="text-center font-weight-bold p-2 m-4 transition-bg second-color first-bg submit-offer"> مشاهدة العروض </a>
                                    </div>
                                @endif
                            </article>
                        @endforeach
                        </div>
                    </div>
                </section>
                <!-- end all projects -->

            </main>
        <!-- end main content -->
        @endsection
    @else
        @section('content')
        <!-- start main content -->
            <main id="user-projects">
                <!-- start jops column -->
                <section class="services-column white-color">
                    <div id="jopFilters">
                        <h2 class="h1 text-center my-5">الخدمات المختارة</h2>
                    </div>
                    <h2 class="h1 text-center my-5">اختار الخدمة</h2>
                    @foreach($jops as $jop)
                        @if($jop->id > 1)
                        <div class="form-row">
                            <div class="form-group check-box">
                                <input 
                                    type="checkbox" 
                                    id="{{$jop->id}}" 
                                    class="form-control" 
                                    name="service" 
                                    required
                                />
                                <label class="second-color" for="terms">{{$jop->name}}</label>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </section>
                <!-- end jops column -->

                <!-- start all projects -->
                <section>
                    <div class="container-fluid">
                        <h1 class="text-center my-5 white-color">المشاريع المتاحة</h1>
                        <div class="row d-flex flex-column p-5 projects-list">
                        @foreach($projects as $project)
                            <article class="d-flex flex-column position-relative w-100 p-4 second-bg project-card">
                                <header class="project-header">
                                    <p>
                                        {{$project->created_at}}
                                    </p>
                                    <div class="position-relative align-items-center project-owner">
                                        <a href="#" class="owner-avatar">
                                            <img src="{{asset($project->owner->user_image)}}" class="d-block rounded-circle" alt="">
                                        </a>
                                        <svg class="position-absolute half-circle" viewBox="0 0 106 57">
                                            <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                                        </svg>
                                        <div class="font-weight-bold first-color owner-name">
                                            <div class="owner-role">{{$project->owner->jop->name}}</div>
                                            {{$project->owner->name}}
                                        </div>
                                    </div>
                                </header>
                                <h2>{{$project->name}}</h2>
                                <p>{{$project->description}}
                                    <h2>الوظيفة المطلوبة : {{$project->jop->name}}</h2>
                                </p>
                                <a href="{{route('add_offer_page',$project->id)}}" class="text-center font-weight-bold p-2 m-4 transition-bg second-color first-bg submit-offer"> قدم عرصك </a>
                            </article>
                        @endforeach
                        </div>
                    </div>
                </section>
                <!-- end all projects -->
            </main>
        <!-- end main content -->
        @endsection
    @endif