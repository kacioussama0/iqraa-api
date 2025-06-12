@php

    $listItem = [
        [
            'name' => __("Home"),
            'link' => '/'
        ],
        [
            'name' => __("Our School"),
            'link' => '/who-we-are'
        ],
         [
            'name' => __("Registration"),
            'link' => '/registrations'
        ],
        [
            'name' => __("Gallery"),
            'link' => '/gallery'
        ],
//        [
//            'name' => __("Activities"),
//            'link' => '/activities'
//        ],
        [
            'name' => __("FAQ"),
            'link' => '/faqs'
        ],
        [
            'name' => __("Contact"),
            'link' => '/contact'
        ]
    ];


@endphp

<!doctype html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#1c3557">
    <meta name="theme-color" content="#1c3557">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="اللغة العربية,سويسرا,تربية إسلامية,القرآن الكريم,منهاج إقرأ و ارتق,القراءة,المحادثة والتعبير .,مدرسة جنيف العربية,مدرسة إقرا">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Arabic">
    <meta name="author" content="Kaci Oussama">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Primary Meta Tags -->
    <title>مدرسة جنيف العربية</title>
    <meta name="title" content="مدرسة جنيف العربية" />
    <meta name="description" content="أن نكون مدرسة متميزة في تثقيف وحماية الهوية الإسلامية لأبنائنا. وأن نكون نموذجاً يحتذى به للمدارس العربية في أوروبا." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://earabege.ch/" />
    <meta property="og:title" content="مدرسة جنيف العربية" />
    <meta property="og:description" content="أن نكون مدرسة متميزة في تثقيف وحماية الهوية الإسلامية لأبنائنا. وأن نكون نموذجاً يحتذى به للمدارس العربية في أوروبا." />
    <meta property="og:image" content="/logo.svg" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://earabege.ch/" />
    <meta property="twitter:title" content="مدرسة جنيف العربية" />
    <meta property="twitter:description" content="أن نكون مدرسة متميزة في تثقيف وحماية الهوية الإسلامية لأبنائنا. وأن نكون نموذجاً يحتذى به للمدارس العربية في أوروبا." />
    <meta property="twitter:image" content="/logo.svg" />

    <link rel="stylesheet" href="{{asset('assets/css/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset(app()->getLocale() === 'ar' ? 'assets/css/bootstrap.rtl.min.css' : 'assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flag-icons.min.css')}}">

    @yield('styles')

</head>
<body style="overflow: hidden">

    <x-loader/>

    @if(request()->path() == '/')
        <div class="up-bar">
            <div class="alert alert-danger rounded-0 alert-dismissible fade show mb-0" role="alert">
                <div class="container text-center d-flex justify-content-center align-items-center">
                    <h6 class="mb-0">
                        {{ __('inscription.Barre annonce') }}
                        <a href="{{url('/registrations')}}" target="_blank" class="alert-link">
                            {{ __('inscription.Lien formulaire') }}
                        </a>
                    </h6>
                    <button type="button" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

        <header class="{{request()->path() == '/' ? 'bg-warning-subtle' : "shadow-sm"}} ">
        <!--        Start Navbar    -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand fw-bolder" href="/" >
                    <img src="/logo.svg" alt="" style="width: 80px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-duotone fa-bars text-primary fa-2x"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        @foreach($listItem as $item)

                            <li class="nav-item {{request()->path() == substr($item['link'],1) || request()->path() == $item['link']  ? 'active' : ""}}">
                                <a href="{{url($item['link'])}}" class="nav-link fw-bold">{{$item['name']}}</a>
                            </li>

                        @endforeach
                    </ul>

                    <!--        Start Languages    -->

                    <div class="languages d-flex">
                        @if(app()->getLocale() === 'ar')
                            <a href="{{ route('change.lang', ['lang' => 'fr']) }}" class="nav-link active fw-bold fi fi-ch me-2"></a>
                        @else
                            <a href="{{ route('change.lang', ['lang' => 'ar']) }}" class="nav-link active fw-bold fi fi-sa me-2"></a>
                        @endif
                    </div>

                    <!--        End Languages   -->

                </div>
            </div>
        </nav>
        <!--        End Navbar    -->
    </header>

    @yield('content')


    <!--    Start Footer  -->


    <footer class="pt-3 pb-1 position-relative text-bg-primary bg-gradient">
        <div class="container mb-5">
            <div class="row gy-5 g-lg-5 text-lg-start text-center">

                <div class="col-lg-3 mt-2 mt-lg-5 vstack gap-4">
                    <h3 class="mt-5 fw-bolder">{{ __('footer.school_name') }}</h3>
                    <p>{{ __('footer.about') }}</p>
                </div>

                <div class="col-lg-3 mt-2 mt-lg-5 justify-content-center align-items-center">
                    <h3 class="mt-2 mt-lg-5 fw-bolder">{{ __('footer.shortcuts') }}</h3>
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        @foreach($listItem as $item)
                            <li class="nav-item {{ request()->path() == $item['link'] ? 'link-warning' : '' }}">
                                <a href="{{ url($item['link']) }}" class="nav-link fw-bold">{{ $item['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 mt-2 mt-lg-5">
                    <h3 class="mt-2 mt-lg-5 fw-bolder">{{ __('footer.contact_us') }}</h3>
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="tel:+41797810839">
                                <i class="fa-duotone fa-phone-alt me-1"></i>
                                <span dir="ltr">+(41) 79 781 08 39</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="https://rb.gy/2ua5cv" target="_blank">
                                <i class="fa-duotone fa-location-check me-1"></i>
                                Chemin Colladon 34, 1209 Genève
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="mailto:info@fcigeneve.ch">
                                <i class="fa-duotone fa-mailbox me-1"></i>
                                Madrassa@fcigeneve.ch
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <p class="text-lg-start text-center mt-2 mt-lg-3">
                <img src="/logo-white.svg" alt="" style="width: 60px">
                {{ __('footer.rights') }} &copy; {{ date('Y') }}
            </p>
        </div>
    </footer>


    <!--    End Footer  -->

    @yield('scripts')

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <style>



    </style>


</body>
</html>
