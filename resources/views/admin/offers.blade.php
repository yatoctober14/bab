@extends('layout.admin_template')

@section('content')
<!-- start main content -->
<main id="offer-admin">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title white-color first-bg">
                            <div class="row d-flex justify-content-between">
                                <div class="col-sm-5">
                                    <h2>ادارة <b>العروض</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> التسلسل </th>
                                    <th> صاحب العرض </th>						
                                    <th> تاريخ العرض </th>
                                    <th> الوظيفة </th>
                                    <th> السعر المطلوب </th>
                                    <th> الفترة المطلوبة </th>
                                    <th>وصف العرض</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($offers as $offer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="#" class="font-weight-bold first-color">
                                            <img src="{{asset($offer->worker->user_image)}}" class="rounded-circle avatar" alt="Avatar">
                                            {{auth()->user()->name}}
                                        </a>
                                    </td>
                                    <td>{{$offer->created_at}}</td>                        
                                    <td>{{$offer->worker->jop->name}}</td>
                                    <td>{{$offer->price}}</td>
                                    <td>{{$offer->duration_in_days}}</td>
                                    <td><p class="lead">{{$offer->description}}</p></td>
                                    <td class="d-flex">
                                    @if(Auth::user()->id == $offer->worker->id)
                                        <a href="{{route('update_offer_page',$offer->id)}}" class="d-inline-block edit second-color m-2 p-2 fas fa-edit" title="تعديل" data-toggle="tooltip"></a>
                                    @endif
                                        <a href="{{route('delete_offer',$offer->id)}}" class="d-inline-block delete text-danger m-2 p-2 fas fa-times-circle" title="حذف" data-toggle="tooltip"></a>
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