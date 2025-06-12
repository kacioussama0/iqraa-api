@extends('layouts.front')

@section('content')


    <div class="news-bar bg-gradient bg-dark shadow-sm py-2" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="container d-flex align-items-center gap-3">
        <span class="badge bg-warning text-dark py-2 px-3 fw-bold">
            <i class="fas fa-bullhorn me-1"></i> {{ __('Dernières nouvelles') }}
        </span>
            <div style="height: 2.5rem;" class="flex-grow-1 overflow-hidden">
                <marquee behavior="scroll" direction="up" scrolldelay="50" scrollamount="1" class="text-white h-100">
                    @foreach($news as $item)
                        <div class="mb-3">
                            <i class="fas fa-circle text-warning me-2"></i>
                            {!! app()->getLocale() == 'ar' ? $item->content : $item->content_fr !!}
                        </div>
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>


    <!--    Start Landing Page  -->


    <section class="landing-page pt-5  position-relative text-bg-warning bg-warning-subtle">

{{--        <div class="position-absolute start-50 w-100 h-100 translate-middle top-50 d-flex justify-content-center align-items-center" style="opacity: .1">--}}
{{--            <img src="/logo.svg" alt="logo" height="400">--}}
{{--        </div>--}}



        <div class="container">

            <div class="row align-items-end">

                <div class="col-lg-5 align-items-center rounded-3 my-5 vstack gap-3 justify-content-center align-items-lg-start align-items-center order-last order-lg-first">
                    <h2 class="fw-light"><i class="fa-duotone fa-hand-wave fa-1x"></i> {{__("home.welcome")}}</h2>
                    <h1 class="display-3 fw-bold text-primary text-lg-start text-center">{{__("home.school")}}</h1>
                    <p class="lh-lg text-muted text-lg-start text-center">{{__("home.landing_description")}}</p>

                    <a href="{{url('/registrations')}}" class="btn btn-lg btn-danger rounded-pill px-5 py-2 me-2 fw-bold">{{__("home.register_btn")}} {{date('Y') . '-' . (int) date('Y') + 1}}</a>



                </div>

                <div class="col-12 col-lg-7 order-last order-lg-first d-none d-md-block z-3">
                    <img src="{{asset('assets/imgs/landing.png')}}"  alt="landing page" class="w-100">
                </div>

            </div>

        </div>



    </section>

    <!--    End Landing Page  -->


    <!-- Start Wish The Best -->

    <div class="ad mb-5 py-5 bg-gradient bg-primary">

        <div class="container">
            <h3 class="text-center display-5 fw-bold text-light">{{__("home.quote")}}</h3>
        </div>

    </div>

    <!-- End Wish The Best -->



    <!--    Start Our Modules -->

    <section class="our-modules">

        <div class="container">

            <h4 class="lh-lg fw-normal text-center mb-5"><span class="heading-shape fw-bolder">{{__("home.module_title")}}</span></h4>

            <!-- Start Cards  -->

            <div class="row my-5 justify-content-center  gy-5 align-items-center">

                @foreach($modules as $module)

                    <div class="col-sm-6 col-md-4">

                        <div class="card  rounded-5 text-center shadow-sm border-{{$module['color']}} border-1 border-opacity-10">
                            <div class="card-body px-5 py-4">
                                    <i class="fa-duotone {{$module['icon']}} fa-4x text-{{$module['color']}} mb-4"></i>
                                    <h4 class="fw-bolder">{{__("home." . $module['name'])}}</h4>
                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

            <!-- End Cards  -->

        </div>

    </section>

    <!--    End Our Modules -->


    <!--    Start Our Features -->

    <section class="our-features z-n1 position-relative pt-5">


        <div class="container">

            <h4 class="lh-lg fw-normal text-center mb-5"><span class="heading-shape fw-bolder">{{__("home.school_goals_title")}}</span></h4>

            <div class="row align-items-center">

                <div class="col-12 col-lg-6">
                        <ul class="list-unstyled vstack gap-3">
                            @foreach(__("home.school_goals") as $goal)
                                <li><i class="fa-duotone fa-circle-check text-primary me-2"></i>{{$goal}}</li>
                            @endforeach
                        </ul>
                </div>

                <div class="col-lg-6 align-self-end  mt-5">
                    <img src="{{asset('assets/imgs/goal.png')}}" alt="" class="img-fluid">
                </div>

            </div>

        </div>

    </section>

    <!--    End Our Features -->


    <!--    Start Statistics -->

    <section class="statistics  py-5 mb-5 w-100">

        <div class="container">

            <div class="row gy-5">

                @foreach($statistics as $item)
                    <div class="col-sm-6 col-md-2 vstack gap-3 justify-content-center align-items-center text-center text-light">
                        <i class="fa-duotone {{$item['icon']}} fa-4x"></i>
                        <h4 class="fw-bold"> + <span class="number">{{ $item['goal'] }} </span> {{__("home." . $item['name'])}}</h4>
                    </div>
                @endforeach

            </div>

        </div>

    </section>

    <!--    End Statistics -->


    <section class="ages pt-5">

        <div class="container">

                <div class="row align-items-center">

                    <div class="col-md-6">
                        <h4 class="lh-lg fw-normal mb-4">
                            <span class="heading-shape fw-bolder">{{ __('home.students_ages_title') }}</span>
                        </h4>
                        <p class="fs-2">{{ __('home.students_ages_text') }}</p>
                    </div>

                    <div class="col-md-6">
                        <img src="{{asset('assets/imgs/ages.png')}}" alt="" class="object-fit-contain w-100" height="500">
                    </div>

                </div>

            </div>

    </section>

    <section class="levels bg-warning-subtle py-5">

        <div class="container">

            <h4 class="lh-lg fw-normal mb-4"><span class="heading-shape fw-bolder">{{__('home.levels_title')}}</span></h4>

            <div class="table-responsive">
                <table class="table shadow-sm table-primary table-borderless table-striped  rounded-4 overflow-hidden">

                    <thead>
                    <tr>
                        <th>{{ app()->getLocale() === 'ar' ? 'المستوى' : 'Niveau' }}</th>
                        <th>{{ app()->getLocale() === 'ar' ? 'عدد الفصول' : 'Nombre de classes' }}</th>
                        <th>{{ app()->getLocale() === 'ar' ? 'عدد التلاميذ' : 'Nombre d\'élèves' }}</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach(__('home.levels_stats') as $level)
                        <tr>
                            <td>{{ $level['level'] }}</td>
                            <td>{{ $level['classes'] }}</td>
                            <td>{{ $level['students'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>

        </div>

    </section>

    <section class="nationalites py-5">

        <div class="container">

            <h4 class="lh-lg fw-normal">
                <span class="heading-shape fw-bolder">{{ __('home.students_nationalities_title') }}</span>
            </h4>

            <p>{{ __('home.students_nationalities_text') }}</p>


            <!-- Swiper -->
            <div class="swiper countries py-3 my-5" data-aos="fade-up">
                <div class="swiper-wrapper">

                    @foreach($countries as $country)
                        <div class="swiper-slide d-flex justify-content-center justify-content-lg-start  align-items-center">
                            <div class="fi fi-{{$country}} rounded-4" style="font-size: 80px"></div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>

    </section>


    <section class="calandar py-5">

        <div class="container">



            <h4 class="lh-lg fw-normal text-center mb-4">
                <span class="heading-shape fw-bolder">{{ __('home.calandar_title') }} {{ __('home.school_year') }}</span>
            </h4>


            <div class="container my-4">
                <div class="alert alert-success text-center">

                    {{ __('home.back_to_school_label') }}: {{ __('home.school_year') }}
                    ({{ __('home.back_to_school_dates') }})
                </div>

                <div class="alert alert-info text-center">
                    {{ __('home.end_year_event') }}: {{ __('home.end_year_date') }}
                </div>

            </div>


            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-warning">
                    <tr>
                        <th>{{__('home.vacations')}}</th>
                        <th>{{__('home.from')}}</th>
                        <th>{{__("home.to")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(__('home.holidays') as $holiday)
                        <tr>
                            <td>{{ $holiday['name'] }}</td>
                            <td>{{ $holiday['from'] }}</td>
                            <td>{{ $holiday['to'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div id="calendar"></div>

            <div class="legend d-flex flex-wrap gap-3 mt-4" dir="rtl">
                <div class="legend-item d-flex align-items-center gap-2">
                    <div class="legend-color rounded-circle" style="width: 16px; height: 16px; background:#f4a460;"></div>
                    {{ __('calendar.entrée scolaire') }}
                </div>
                <div class="legend-item d-flex align-items-center gap-2">
                    <div class="legend-color rounded-circle" style="width: 16px; height: 16px; background:#f5cba7;"></div>
                    {{ __('calendar.vacances scolaires') }}
                </div>
                <div class="legend-item d-flex align-items-center gap-2">
                    <div class="legend-color rounded-circle" style="width: 16px; height: 16px; background:#ff6666;"></div>
                    {{ __('calendar.eid al fitr') }}
                </div>
                <div class="legend-item d-flex align-items-center gap-2">
                    <div class="legend-color rounded-circle" style="width: 16px; height: 16px; background:#ff99cc;"></div>
                    {{ __('calendar.eid al adha') }}
                </div>
                <div class="legend-item d-flex align-items-center gap-2">
                    <div class="legend-color rounded-circle" style="width: 16px; height: 16px; background:#9966cc;"></div>
                    {{ __('calendar.fête fin année') }}
                </div>
            </div>



            <a href="{{asset('assets/pdf/calandrier2024-2025.pdf')}}" class="btn btn-primary d-block btn-lg mt-5">
                <i class="fa-duotone fa-file-pdf me-2"></i>
                {{__("home.Download_pdf")}}
            </a>



        </div>

    </section>

@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".countries", {


            loop: true,

            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            },


            breakpoints: {
                1200: {
                    slidesPerView: 5,
                },
                530: {
                    slidesPerView: 2,
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/js-year-calendar@latest/dist/js-year-calendar.min.js"></script>
    <script>
        new Calendar('#calendar', {
            language: 'ar',
            displayDisabledDataSource: true,
            startYear: 2024,
            minDate: new Date(2024, 8, 1),
            maxDate: new Date(2025, 8, 31),
            enableRangeSelection: false,
            dataSource: [
                {
                    name: 'الدخول المدرسي',
                    startDate: new Date(2024, 8, 7),
                    endDate: new Date(2024, 8, 8),
                    color: '#f4a460'
                },

                {
                    name: 'الدخول المدرسي',
                    startDate: new Date(2024, 8, 11),
                    endDate: new Date(2024, 8, 11),
                    color: '#f4a460'
                },

                {
                    name: '📚 عطلة الخريف',
                    startDate: new Date(2024, 9, 21),
                    endDate: new Date(2024, 9, 27),
                    color: '#f5cba7'
                },
                {
                    name: 'عطلة',
                    startDate: new Date(2024, 11, 23),
                    endDate: new Date(2024, 11, 31),
                    color: '#f5cba7'
                },
                {
                    name: 'عطلة',
                    startDate: new Date(2025, 0, 1),
                    endDate: new Date(2025, 0, 5),
                    color: '#f5cba7'
                },

                {
                    name: 'عطلة',
                    startDate: new Date(2025, 2, 1),
                    endDate: new Date(2025, 2, 2),
                    color: '#f5cba7'
                },

                {
                    name: 'عيد الفطر',
                    startDate: new Date(2025, 2, 31),
                    endDate: new Date(2025, 2, 31),
                    color: '#ff6666'
                },

                {
                    name: 'عطلة',
                    startDate: new Date(2025, 3, 19),
                    endDate: new Date(2025, 4, 4),
                    color: '#f5cba7'
                },


                {
                    name: 'عيد الأضحى',
                    startDate: new Date(2025, 5, 6),
                    endDate: new Date(2025, 5, 6),
                    color: '#ff99cc'
                },
                {
                    name: '🎉 حفل نهاية السنة',
                    startDate: new Date(2025, 5, 15),
                    endDate: new Date(2025, 5, 15),
                    color: '#9966cc'
                },
                {
                    name: 'عطلة',
                    startDate: new Date(2025, 5, 16),
                    endDate: new Date(2025, 7, 31),
                    color: '#f5cba7'
                },

                {
                    name: 'الدخول المدرسي',
                    startDate: new Date(2025, 8, 6),
                    endDate: new Date(2025, 8, 7),
                    color: '#f4a460'
                },

                {
                    name: 'الدخول المدرسي',
                    startDate: new Date(2025, 8, 10),
                    endDate: new Date(2025, 8, 10),
                    color: '#f4a460'
                },


            ]
        });
    </script>

@endsection

@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/js-year-calendar@latest/dist/js-year-calendar.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>

        .swiper-image {
            height: 250px;
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        #calendar {
            max-width: 1300px;
            margin: auto;
        }
        .legend {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 30px;
            font-size: 16px;
        }
        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 3px;
        }

        .calendar-month-header {
            color: #006837;
            font-weight: bold;
        }

        .day-content {
            color: #444;
        }



        .calendar-day:hover {
            background-color: #2e7d32 !important;
            color: white !important;
        }

        .spikes {
            position: relative;
            background: var(--bs-warning-bg-subtle);
        }

        .spikes::after {
            content: '';
            position: absolute;
            right: 0;
            left: -0%;
            top: 100%;
            z-index: 10;
            display: block;
            height: 50px;
            background-size: 50px 100%;
            background-image: linear-gradient(135deg, var(--bs-warning-bg-subtle) 25%, transparent 25%), linear-gradient(225deg, var(--bs-warning-bg-subtle) 25%, transparent 25%);
            background-position: 0 0;
        }

    </style>
@endsection
