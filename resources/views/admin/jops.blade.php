@extends('layout.admin_template')
<!-- start main content -->
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8">
                <div class="heading text-center mt-4">
                    <h2 class="white-color">اضافة وظيفة جديدة</h2>
                    <hr class="hr-bar second-bg first-bar"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-wrapper p-4 m-4">
                <form action="{{ route('add_jop') }}" method="post" id="new_jop">
                @csrf
                    <div class="form-row">
                        <div class="form-group position-relative col-sm">
                            <label for="" class="d-block">
                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                </i>
                                اسم الوظيفة
                            </label>
                            <input 
                                type="text"
                                id="jop_name"
                                class="form-control"
                                name="name"
                                placeholder="ادخل اسم الوظيفة الجديدة هنا"
                            />
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <button type="submit" class="mybtn">اضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title white-color first-bg">
                            <div class="row d-flex justify-content-between">
                                <div class="col-sm-5">
                                    <h2>ادارة <b> الوظائف </b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover" id="jops-table">
                            <thead>
                                <tr>
                                    <th>التسلسل</th>
                                    <th>الوظيفة</th>						
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($jops as $jop)
                                <tr>                       
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$jop->name}}</td>
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
@section('js')
    <!-- jop script -->
    <script src="{{asset('assets/js/jop.js')}}"></script>
@endsection

