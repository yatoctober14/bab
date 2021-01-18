@extends('layout.admin_template')
@section('content')
<!-- start main content -->
<main>
    <!-- start all projects -->
        <section>
            <div class="container-fluid">
                <div class="row d-flex flex-column p-5 projects-list">
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
                            <a href="{{route('add_offer_page',$project->id)}}" class="text-center font-weight-bold p-2 m-4 transition-bg second-color first-bg submit-offer">قدم عرصك</a>
                        @endif
                    </article>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="offers">     
                    <div class="row">
                    @foreach($project->offers as $offer)
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
                                    <a href="{{route('accept_offer',$offer->id)}}" class="user-button text-center transition-bg p-2 m-2"> اقبل العرض </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>
    <!-- end all projects -->
</main>
<!-- end main content -->
@endsection