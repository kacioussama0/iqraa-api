@extends('layouts.front')


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

        .truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        .truncate-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2;     /* show max 2 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;       /* allow wrapping */
            max-width: 100%;
        }

    </style>


@endsection

@section('content')

    <x-page-title>
        <x-slot:title>{{ __("News") }}</x-slot>
    </x-page-title>


    <section class="news">

        <div class="container py-5">


            <div class="row">

                @foreach($posts as $post)


                    <div class="col-md-4">
                        <div class="card">

                            <img src="{{asset('storage/' . $post->thumbnail)}}" alt="" class="card-image">

                            <div class="card-content">
                                <span class="category text-preset-3-bold">{{app()->getLocale() == 'ar' ? $post->category->name : $post->category->name_fr}}</span>
                                <h3 class="text-preset-3">{{ $post->created_at->locale(app()->getLocale())->translatedFormat('d M Y') }}</h3>
                                <h1 class="text-preset-1 truncate-2 ">{{app()->getLocale() == 'ar' ? $post->title : $post->title_fr}}</h1>
                                <div class="text-preset-2 truncate-2-lines">{!!  app()->getLocale() == 'ar' ? Str::limit($post->content,200) : Str::limit($post->content_fr,200)!!}</div>
                            </div>
                            <a href="{{url(app()->getLocale() . '/news/' . $post->slug)}}" class="btn btn-primary d-block w-100 stretched-link"> {{__("Read More")}}</a>
                        </div>
                    </div>

                @endforeach

            </div>

        </div>

    </section>


@endsection
