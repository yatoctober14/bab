@extends('layout.admin_template')
@section('content')
<!-- start main content -->
@if(isset($project))
    <main id="update_project" class="white-color" role="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8">
                    <div class="heading text-center mt-4">
                        <h2>تعديل مشروع</h2>
                        <hr class="hr-bar second-bg first-bar"/>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-wrapper p-4 m-4">
                    <form action="{{ route('update_project',$project->id) }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group position-relative col-sm">
                                <label for="project-name" class="d-block">
                                    <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                    </i>
                                    اسم المشروع
                                </label>
                                <input 
                                    type="text"
                                    id="project-name"
                                    class="form-control"
                                    name="name"
                                    value = "{{$project->name}}"
                                    placeholder="ادخل اسم مناسب للمشروعك يجذب العمال لتقديم العروض ..."
                                />
                                <span class="position-absolute rounded-circle indicator"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group position-relative col-sm">
                                <label for="project-description" class="d-block">
                                    <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                    </i>
                                    وصف المشروع
                                </label>
                                <textarea 
                                    id="project-description" 
                                    class="form-control"
                                    name="description" 
                                    cols="100" rows="3" 
                                    placeholder="اكتب بالتفصيل وصف المشروع الذى ترغب فى انجازه لمساعدة العمال فى فهم ماترغب فيه وبالتالى الحصول على افضل خدمة..."
                                >
                                {{$project->description}}
                                </textarea>
                                <span class="position-absolute rounded-circle indicator"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group position-relative col-sm-12">
                                <label for="addr" class="d-block">
                                    <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                    </i>
                                    العنوان
                                </label>
                                <input 
                                    type="text" 
                                    id="addr" 
                                    class="form-control" 
                                    name="address"
                                    value = "{{$project->address}}" 
                                    placeholder="ادخل عنوان المشروع بالتفاصيل" 
                                >
                                <span class="position-absolute rounded-circle indicator fifth-bg"></span>
                            </div>
                        </div>

                        <div class="form-row">
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
                                <label for="district-select" class="d-block"><i class="fas fa-question-circle"></i> الحى </label>
                                <select name="district_id" id="district-select" class="form-control">
                                    <option value="1">القاهرة</option>
                                    <option value="2">الجيزة</option>
                                    <option value="3">القليوبية</option>
                                    <option value="4">الاسكندرية</option>
                                    <option value="5">القاهرة</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group dropdown position-relative col-sm">
                                <label for="jop-select" class="d-block"><i class="fas fa-question-circle"></i> الوظيفة المطلوبة</label>
                                <select name="jop_id" id="jop-select" class="form-control">
                                @foreach($jops as $jop)
                                    <option value="{{$jop->id}}">{{$jop->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group position-relative col-sm">
                                <label class="d-block" for="dur-in-days"><i class="fas fa-question-circle"></i> الفترة اللازمة </label>
                                <input
                                    type="number" 
                                    id="dur-in-days" 
                                    class="form-control"
                                    name="duration_in_days"
                                    value="{{$project->duration_in_days}}"
                                    pattern="/^[0-9]*$/"
                                    placeholder="...ادخل الفترة بالايام التى تريد انجاز المشروع بها"
                                >
                                </input>
                                <span class="position-absolute rounded-circle indicator"></span>
                            </div>
                            <div class="form-group position-relative col-sm">
                                <label class="d-block" for="project-price"><i class="fas fa-question-circle"></i> السعر </label>
                                <input
                                    type="number"
                                    id="project-price"
                                    class="form-control"
                                    name="price" 
                                    value="{{$project->price}}"
                                    placeholder="...ادخل السعر الذى تراه مناسبا بالجنية المصرى"
                                >
                                </input>
                                <span class="position-absolute rounded-circle indicator"></span>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <button type="submit" class="mybtn">تعديل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@else
    <main id="create_project" class="white-color" role="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8">
                    <div class="heading text-center mt-4">
                        <h2>اضافة مشروع جديد</h2>
                        <hr class="hr-bar second-bg first-bar"/>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-wrapper p-4 m-4">
                    <form action="{{ route('add_project') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group position-relative col-sm">
                                <label for="project-name" class="d-block">
                                    <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                    </i>
                                    اسم المشروع
                                </label>
                                <input 
                                    type="text"
                                    id="project-name"
                                    class="form-control"
                                    name="name"
                                    placeholder="ادخل اسم مناسب للمشروعك يجذب العمال لتقديم العروض ..."
                                />
                                <span class="position-absolute rounded-circle indicator"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group position-relative col-sm">
                                <label for="project-description" class="d-block">
                                    <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                    </i>
                                    وصف المشروع
                                </label>
                                <textarea 
                                    id="project-description" 
                                    class="form-control"
                                    name="description" 
                                    cols="100" rows="3" 
                                    placeholder="اكتب بالتفصيل وصف المشروع الذى ترغب فى انجازه لمساعدة العمال فى فهم ماترغب فيه وبالتالى الحصول على افضل خدمة..."
                                >
                                </textarea>
                                <span class="position-absolute rounded-circle indicator"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group position-relative col-sm-12">
                                <label for="addr" class="d-block">
                                    <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                    </i>
                                    العنوان
                                </label>
                                <input 
                                    type="text" 
                                    id="addr" 
                                    class="form-control" 
                                    name="address"
                                    placeholder="ادخل عنوان المشروع بالتفاصيل" 
                                >
                                <span class="position-absolute rounded-circle indicator fifth-bg"></span>
                            </div>
                        </div>

                        <div class="form-row">
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
                                <label for="district-select" class="d-block"><i class="fas fa-question-circle"></i> الحى </label>
                                <select name="district_id" id="district-select" class="form-control">
                                    <option value="1">القاهرة</option>
                                    <option value="2">الجيزة</option>
                                    <option value="3">القليوبية</option>
                                    <option value="4">الاسكندرية</option>
                                    <option value="5">القاهرة</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group dropdown position-relative col-sm">
                                <label for="jop-select" class="d-block"><i class="fas fa-question-circle"></i> الوظيفة المطلوبة</label>
                                <select name="jop_id" id="jop-select" class="form-control">
                                @foreach($jops as $jop)
                                    <option value="{{$jop->id}}">{{$jop->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group position-relative col-sm">
                                <label class="d-block" for="dur-in-days"><i class="fas fa-question-circle"></i> الفترة اللازمة </label>
                                <input
                                    type="number" 
                                    id="dur-in-days" 
                                    class="form-control"
                                    name="duration_in_days"
                                    pattern="/^[0-9]*$/"
                                    placeholder="...ادخل الفترة بالايام التى تريد انجاز المشروع بها"
                                >
                                </input>
                                <span class="position-absolute rounded-circle indicator"></span>
                            </div>
                            <div class="form-group position-relative col-sm">
                                <label class="d-block" for="project-price"><i class="fas fa-question-circle"></i> السعر </label>
                                <input
                                    type="number"
                                    id="project-price"
                                    class="form-control"
                                    name="price"
                                    placeholder="...ادخل السعر الذى تراه مناسبا بالجنية المصرى"
                                >
                                </input>
                                <span class="position-absolute rounded-circle indicator"></span>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <button type="submit" class="mybtn">اضافة المشروع</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endif
<!-- end main content -->
@endsection