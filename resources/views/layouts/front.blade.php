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
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#1c3557">
    <meta name="theme-color" content="#1c3557">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>École Arabe Genève</title>

    <meta name="description" content="École privée située à Genève, affiliée à la Fondation Culturelle Islamique. Fondée en 1978, elle offre un enseignement de qualité en langue arabe, éducation islamique et Coran dans un environnement bienveillant.">
    <meta name="keywords" content="école arabe Genève, enseignement islamique Genève, cours arabe Genève, culture islamique, Fondation Culturelle Islamique Genève">
    <meta name="author" content="Fondation Culturelle Islamique de Genève">
    <meta property="og:title" content="École Arabe Genève">
    <meta property="og:description" content="École privée située à Genève, affiliée à la Fondation Culturelle Islamique. Fondée en 1978, elle offre un enseignement de qualité en langue arabe, éducation islamique et Coran dans un environnement bienveillant.">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:image" content="{{asset('assets/imgs/logo.jpg')}}">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="800">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="École Arabe Genève">
    <meta name="twitter:description" content="École privée située à Genève, affiliée à la Fondation Culturelle Islamique. Fondée en 1978, elle offre un enseignement de qualité en langue arabe, éducation islamique et Coran dans un environnement bienveillant.">
    <meta property="twitter:image" content="{{asset('assets/imgs/logo.jpg')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{url('/')}}">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset(app()->getLocale() === 'ar' ? 'assets/css/bootstrap.rtl.min.css' : 'assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flag-icons.min.css')}}">

    @yield('styles')

</head>
<body style="overflow: hidden">

        <x-loader/>


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

                    <div class="languages text-muted">
                        @if(app()->getLocale() === 'ar')
                            <a href="{{ route('change.lang', ['lang' => 'fr']) }}" class="nav-link fw-bold d-flex align-items-center">
                                <i class="fi fi-ch me-2"></i>
                                <span>فرنسية</span>
                            </a>
                        @else
                            <a href="{{ route('change.lang', ['lang' => 'ar']) }}" class="nav-link fw-bold d-flex align-items-center">
                                <i class="fi fi-sa me-2"></i>
                                <span>Arabe</span>
                            </a>
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

            <p class="text-lg-start text-center mt-2 mt-lg-3 d-flex flex-wrap justify-content-center justify-content-lg-start align-items-center gap-3">
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
