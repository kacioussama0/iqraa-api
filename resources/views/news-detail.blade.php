@extends('layouts.front')

@section('title',app()->getLocale() == 'ar' ? $post->title : $post->title_fr)

@section('meta')



    <meta name="description" content="{{ Str::limit(strip_tags($post->content), 160) }}">

    {{-- Open Graph for Facebook/WhatsApp --}}
    <meta property="og:title" content="{{ app()->getLocale() == 'ar' ? $post->title : $post->title_fr}}">
    <meta property="og:description" content="{{ app()->getLocale() == 'ar' ? Str::limit(strip_tags($post->content), 160) : Str::limit(strip_tags($post->content_fr), 160) }}">
    <meta property="og:image" content="{{ asset('storage/' . $post->thumbnail) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ app()->getLocale() == 'ar' ? $post->title : $post->title_fr}}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $post->thumbnail) }}">

    {{-- Language (hreflang for French & Arabic) --}}
    <link rel="alternate" hreflang="fr" href="{{ url('fr/news/' . $post->slug_fr) }}">
    <link rel="alternate" hreflang="ar" href="{{ url('ar/news/' . $post->slug) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('fr/news/' . $post->slug_fr) }}">


@endsection



@section('styles')

    <style>


        p  {
            margin-bottom: 0;
        }

        :root {
            --color-yellow: hsl(47, 88%, 63%);
            --color-white: hsl(0, 0%, 100%);
            --color-gray-500: hsl(0, 0%, 42%);
            --color-gray-950: hsl(0, 0%, 7%);
            --spacing-50:4px;
            --spacing-100:8px;
            --spacing-150:12px;
            --spacing-300:24px;
        }

        .text-preset-1 {
            font-size: 24px;
            font-weight: 800;
        }

        .text-preset-2 {
            font-size: 16px;
            font-weight: 500;
        }

        .text-preset-3 {
            font-size: 14px;
            font-weight: 500;
        }

        .text-preset-3-bold {
            font-size: 14px;
            font-weight: 700;
        }


        div.card {

            background-color: var(--bs-white);
            border-radius: 20px;
            border: 1px solid var(--bs-dark);
            filter: drop-shadow(8px 8px 0 var(--bs-dark));
            transition: 0.3s ease-in-out;
        }

        div.card:hover {
            filter: drop-shadow(16px 16px 0 var(--bs-dark));
        }

        img.card-image {
            border-radius: 10px;
            margin-bottom: var(--spacing-300);
        }

        div.card {


            background-color: var(--color-white);
            border-radius: 20px;
            border: 1px solid var(--color-gray-950);
            filter: drop-shadow(8px 8px 0 var(--color-gray-950));
            padding: var(--spacing-300);
            transition: 0.3s ease-in-out;
        }

        div.card:hover {
            filter: drop-shadow(16px 16px 0 var(--color-gray-950));
            transform: none;
        }

        img.card-image {
            border-radius: 10px;
            margin-bottom: var(--spacing-300);
        }


        div.card-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: var(--spacing-150);
            margin-bottom: var(--spacing-300);
        }


        div.card-content .category {
            height: 28px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 4px;
            background-color: var(--color-yellow);
            padding: var(--spacing-150)
        }

        div.card-content p {
            color: var(--color-gray-500);

        }

        div.card-content h1 {
            transition: .3s ease-in-out;
            cursor: pointer;
        }

        div.card-content h1:hover {
            color: var(--color-yellow);
        }



    </style>


@endsection



@section('content')




    <article class="post my-5">


        <div class="container">

            <div class="card">



                <img src="{{asset('storage/' . $post->thumbnail)}}" alt="" class="card-image">

                <div class="card-content">
                    <h3 class="text-preset-3">{{ $post->created_at->locale(app()->getLocale())->translatedFormat('d M Y') }}</h3>
                    <h1 class="text-preset-1 ">{{app()->getLocale() == 'ar' ? $post->title : $post->title_fr}}</h1>
                    <div class="text-preset-2 ">{!!  app()->getLocale() == 'ar' ? nl2br($post->content) : nl2br($post->content_fr)!!}</div>
                </div>



            </div>


        </div>

    </article>


@endsection
