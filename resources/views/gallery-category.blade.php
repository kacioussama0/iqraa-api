@extends('layouts.front')

@section('content')

    <x-page-title>
        <x-slot:title>
            {{ app()->getLocale() == 'ar' ? $category->name : $category->name_fr }}
        </x-slot>
    </x-page-title>


    <style>

        .gallery-grid {
            display: flex;
            margin-left: -1rem; /* gutter size offset */
            width: auto;
        }

        .gallery-item {
            margin-bottom: 1rem;
            padding-left: 1rem; /* gutter size */
            width: 33.333%; /* three items per row by default */
        }

        .gallery-item img {
            width: 100%;
            border-radius: 10px; /* rounded corners like your screenshot */
            display: block;
        }

        @media (max-width: 992px) {
            .gallery-item {
                width: 50%; /* two items per row on medium screens */
            }
        }

        @media (max-width: 576px) {
            .gallery-item {
                width: 100%; /* one item per row on small screens */
            }
        }


    </style>

    <section class="gallery-category">

        <div class="container py-5">
            <div class="gallery-grid">
                @foreach($images as $image)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt_text }}" class="w-100 object-fit-cover rounded-4">
                    </div>
                @endforeach

                <!-- more items -->
            </div>
        </div>


    </section>

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>



    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var elem = document.querySelector('.gallery-grid');
            new Masonry(elem, {
                itemSelector: '.gallery-item',
                percentPosition: true
            });
        });
    </script>

@endsection
