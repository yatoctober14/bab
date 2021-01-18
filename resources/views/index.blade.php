@extends('layout.main_template')
@section('slider')
<!-- start slider -->
    <section class="headerslider">
        <div id="main-slider" class="carousel slide carousel-fade" data-ride="carousel" data-keyboard="true" data-touch="true">
            <div class="carousel-inner">
                @if(!Auth::check())
                    <h1>لديك منزل تريد القيام بتشطيبه او <br/>تريد القيام ببعض الاصلاحات والترميمات؟</h1>
                    <a href="{{route('register')}}" class="header-btn mybtn m-5 text-center">انضم الينا الان مجانا</a>
                @endif
                <div class="headerslideroverlay text-center">
                </div>
                <div class="carousel-item one active">
                </div>
                <div class="carousel-item two">
                </div>
                <div class="carousel-item three">
                </div>
                <div class="carousel-item four">
                </div>
                <div class="carousel-item five">
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
                <li data-target="#main-slider" data-slide-to="3"></li>
                <li data-target="#main-slider" data-slide-to="4"></li>
            </ol>
        </div>
    </section>
<!-- end slider -->
@endsection
@section('content')
<!-- start main content -->
<main>
<!-- start features section -->
    <section class="features">
        <div class="container">
            <div class="row">
            <div class="text-center col-sm-12 mt-5">
                <h2 class="h1 text-center white-color">احصل على افضل خدمة باقل سعر</h2>
                <hr class="hr-bar second-bg first-bar"/>
            </div>
            </div>
            <div class="row">
            <div class="right col-md-6 col-sm-12">
                <p class="lead">
                خسائر اللازمة ومطالبة حدة بل. الآخر الحلفاء أن غزو, إجلاء وتنامت عدد مع. لقهر معركة لبلجيكا، بـ انه, ربع الأثنان المقيتة في, اقتصّت المحور حدة و. هذه ما طرفاً عالمية استسلام, الصين وتنامت حين ٣٠, ونتج والحزب المذابح كل جوي. أسر كارثة المشتّتون بل, وبعض وبداية الصفحة غزو قد, أي بحث تعداد الجنوب.
                قصف المسرح واستمر الإتحاد في, ذات أسيا للغزو، الخطّة و, الآخر لألمانيا جهة بل. في سحقت هيروشيما البريطاني يتم, غريمه باحتلال الأيديولوجية، في فصل, دحر وقرى لهيمنة الإيطالية ٣٠. استبدال استسلام القاذفات عل مما. ببعض مئات وبلجيكا، قد أما, قِبل الدنمارك حتى كل, العمليات اليابانية انه أن.
                حتى هاربر موسكو ثم, وتقهقر المنتصرة حدة عل, التي فهرست واشتدّت أن أسر. كانت المتاخمة التغييرات أم وفي. ان وانتهاءً باستحداث قهر. ان ضمنها للأراضي الأوروبية ذات.
                خسائر اللازمة ومطالبة حدة بل. الآخر الحلفاء أن غزو, إجلاء وتنامت عدد مع. لقهر معركة لبلجيكا، بـ انه, ربع الأثنان المقيتة في, اقتصّت المحور حدة و. هذه ما طرفاً عالمية استسلام, الصين وتنامت حين ٣٠, ونتج والحزب المذابح كل جوي. أسر كارثة المشتّتون بل, وبعض وبداية الصفحة غزو قد, أي بحث تعداد الجنوب.
                </p>
            </div>
            <div class="left col-md-6 col-sm-12">
                <ul class="list-unstyled text-center">
                <li class="text-center"><a href="#" class="mybtn d-block test-right"><i class="fas fa-tools"></i> خدماتنا</a></li>
                <li class="text-center"><a href="#" class="mybtn d-block test-right"><i class="fas fa-hand-holding-usd"></i> عروض مميزة</a></li>
                <li class="text-center"><a href="#" class="mybtn d-block test-right"><i class="fas fa-users"></i> احصل على فريق كامل لخدمتك</a></li>
                <li class="text-center"><a href="#" class="mybtn d-block test-right"><i class="fas fa-paint-roller"></i> خدماتنا</a></li>
                </ul>
            </div>          
            </div>
        </div>
    </section>
<!-- end features section -->

<!-- start top-freelencers section -->
    <section class="top-freelencers">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center col-sm-12 mt-5">
                    <h2 class="h1 mb-0 text-center white-color">أفضل الحرفين</h2>
                    <hr class="hr-bar second-bg"/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 freelancer-card-list">
                @foreach($users as $user)
                    <article class="freelancer-card">
                        <header class="card-header">
                            <div class="freelancer">
                                <a href="#" class="freelancer-avatar">
                                    <img src="{{asset($user->user_image)}}" alt="">
                                </a>
                                <svg class="half-circle" viewBox="0 0 106 57">
                                    <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                                </svg>
                                <div class="freelancer-name white-color">
                                    <div class="freelancer-job">{{$user->jop->name}}</div>
                                    {{$user->name}}
                                </div>
                            </div>
                        </header>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h2 class="white-color">عدد المشاريع: 5</h2>
                        <p class="lead second-color">استطيع انا اقدم لك افضل خدمة لانى امتلك خبرة واسعة لاكثر من 5 سنوات</p>
                        <a href="#" class="user-button text-center transition-bg">احصل على خدمة</a>
                    </article>
                @endforeach
                </div>
            </div>
        </div>
    </section>
<!-- end top-freelencers section -->

<!-- start testimonials section -->
    <section class="testimonials">
        <div id="testimonials-carousel" class="carousel slide" touch="true" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                
                <div class="testimonials-heading">
                    <h3 class="h1 text-center white-color">اراء عملائنا</h3>
                </div>

                <div class="carousel-item active">
                    <div class="container">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-center">
                        ذلك بالفشل ونستون ابتدعها قد. لها قد مساعدة الحلفاء, واشتدّت الهزائم إلى كل. تم البلطيق الحيلولة دار, عن به، تُصب البرية والحلفاء. مشارف واشتدّت شبح كل, بتخصيص بل مما. الحرة بقيادة تم وصل.
                        لغزو احتار كل أسر, بـ هُزم النمسا الخاسر بعد, من مسرح ألمانيا البشريةً فعل. والجنوب ارتكبها وبالتحديد، فعل. الا مع قِبل أمدها جديداً. بوابة الضغوط أن ولم. قد لمّ مكثّفة دنكيرك. جهة وبعض شعار ان.
                        </p>
                        <h3 class="customer-name text-center">-احمد سليم<h3>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="container">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-center">
                        ذلك بالفشل ونستون ابتدعها قد. لها قد مساعدة الحلفاء, واشتدّت الهزائم إلى كل. تم البلطيق الحيلولة دار, عن به، تُصب البرية والحلفاء. مشارف واشتدّت شبح كل, بتخصيص بل مما. الحرة بقيادة تم وصل.
                        لغزو احتار كل أسر, بـ هُزم النمسا الخاسر بعد, من مسرح ألمانيا البشريةً فعل. والجنوب ارتكبها وبالتحديد، فعل. الا مع قِبل أمدها جديداً. بوابة الضغوط أن ولم. قد لمّ مكثّفة دنكيرك. جهة وبعض شعار ان.
                        </p>
                        <h3 class="customer-name text-center">-احمد سليم<h3>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="container">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-center">
                        ذلك بالفشل ونستون ابتدعها قد. لها قد مساعدة الحلفاء, واشتدّت الهزائم إلى كل. تم البلطيق الحيلولة دار, عن به، تُصب البرية والحلفاء. مشارف واشتدّت شبح كل, بتخصيص بل مما. الحرة بقيادة تم وصل.
                        لغزو احتار كل أسر, بـ هُزم النمسا الخاسر بعد, من مسرح ألمانيا البشريةً فعل. والجنوب ارتكبها وبالتحديد، فعل. الا مع قِبل أمدها جديداً. بوابة الضغوط أن ولم. قد لمّ مكثّفة دنكيرك. جهة وبعض شعار ان.
                        </p>
                        <h3 class="customer-name text-center">-احمد سليم<h3>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="container">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-center">
                        ذلك بالفشل ونستون ابتدعها قد. لها قد مساعدة الحلفاء, واشتدّت الهزائم إلى كل. تم البلطيق الحيلولة دار, عن به، تُصب البرية والحلفاء. مشارف واشتدّت شبح كل, بتخصيص بل مما. الحرة بقيادة تم وصل.
                        لغزو احتار كل أسر, بـ هُزم النمسا الخاسر بعد, من مسرح ألمانيا البشريةً فعل. والجنوب ارتكبها وبالتحديد، فعل. الا مع قِبل أمدها جديداً. بوابة الضغوط أن ولم. قد لمّ مكثّفة دنكيرك. جهة وبعض شعار ان.
                        </p>
                        <h3 class="customer-name text-center">-احمد سليم<h3>
                    </div>
                </div>
            </div>
            <!-- <a href="#" class="review-us mybtn">اضافة رايك</a> -->
            <a href="#testimonials-carousel" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a href="#testimonials-carousel" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </section>
<!-- end testimonials section -->

    <!-- start services section -->
    <section class="services">
        <div class="container">
            <div class="row">
                <div class="text-center col-sm-12 mt-5">
                    <h3 class="h1 first-color white-color">خدماتنا</h3>
                    <hr class="hr-bar second-bg"/>
                </div>
            </div>
            <div class="row justify-content-center">
                 @foreach($jops as $job)
                <a href="#" class="col-lg col-sm-12 text-center box-service">
                    <i class="fas fa-tools"></i>
                    {{$job->name}}
                </a>
                 @endforeach
                
            </div>
            
            <div class="row justify-content-center">
                <a href="./templates/services.html" class="mybtn text-center">كل الخدمات</a>
            </div>
        </div>
    </section>
<!-- end services section -->
</main>
<!-- end main content -->
@endsection
