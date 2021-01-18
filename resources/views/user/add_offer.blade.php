@extends('layout.main_template')
@section('content')
<!-- start main content -->
@if(isset($offer))
<main id="update_offer" class="white-color" role="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8">
                <div class="heading text-center mt-4">
                    <h2>تعديل العرض</h2>
                    <hr class="hr-bar second-bg first-bar"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-wrapper p-4 m-4">

                <form action="{{route('update_offer',$offer->id)}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group position-relative col-sm">
                            <label for="offer_description" class="d-block">
                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                </i>
                                وصف العرض
                            </label>
                            <textarea 
                                name="description" 
                                id="offer_description" 
                                class="form-control" 
                                cols="100" rows="3" 
                                placeholder=""
                            >
                            {{$offer->description}}
                            </textarea>
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group position-relative col-sm-5">
                            <label class="d-block" for="offer-duration"><i class="fas fa-question-circle"></i> الفترة اللازمة </label>
                            <input
                                type="number" 
                                id="offer-duration" 
                                class="form-control" 
                                name="duration_in_days"
                                value= "{{$offer->duration_in_days}}"
                                pattern="/^[0-9]*$/" 
                                placeholder="...ادخل الفترة بالايام التى تريد انجاز المشروع بها"
                            >
                            </input>
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                        <div class="form-group position-relative col-sm-5">
                            <label class="d-block" for="offer-price"><i class="fas fa-question-circle"></i> السعر </label>
                            <input
                                type="number"
                                id="offer-price"
                                class="form-control"
                                name="price"
                                value= "{{$offer->price}}"
                                pattern="/^[0-9]*$/"
                                placeholder="...ادخل السعر الذى تريده بالجنية المصرى"
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
<main id="create_offer" class="white-color" role="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8">
                <div class="heading text-center mt-4">
                    <h2>اضافة عرض جديد</h2>
                    <hr class="hr-bar second-bg first-bar"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-wrapper p-4 m-4">

                <form action="{{route('add_offer',$project_id)}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group position-relative col-sm">
                            <label for="offer_description" class="d-block">
                                <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Tooltip on right">    
                                </i>
                                وصف العرض
                            </label>
                            <textarea 
                                name="description" 
                                id="offer_description" 
                                class="form-control" 
                                cols="100" rows="3" 
                                placeholder=""
                            >
                            </textarea>
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group position-relative col-sm-5">
                            <label class="d-block" for="offer-duration"><i class="fas fa-question-circle"></i> الفترة اللازمة </label>
                            <input
                                type="number" 
                                id="offer-duration" 
                                class="form-control" 
                                name="duration_in_days"
                                pattern="/^[0-9]*$/" 
                                placeholder="...ادخل الفترة بالايام التى تريد انجاز المشروع بها"
                            >
                            </input>
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                        <div class="form-group position-relative col-sm-5">
                            <label class="d-block" for="offer-price"><i class="fas fa-question-circle"></i> السعر </label>
                            <input
                                type="number"
                                id="offer-price"
                                class="form-control"
                                name="price" 
                                pattern="/^[0-9]*$/"
                                placeholder="...ادخل السعر الذى تريده بالجنية المصرى"
                            >
                            </input>
                            <span class="position-absolute rounded-circle indicator"></span>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <button type="submit" class="mybtn">اضافة العرض</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</main>
@endif
<!-- end main content -->
@endsection