@extends('layouts.front')

@section('content')

    <x-page-title>
        <x-slot:title>{{ __("Gallery") }}</x-slot>
    </x-page-title>


    <section class="gallery">


            <div class="container py-5">

                <div class="row g-5">

                    @foreach($categories as $category)

                        <div class="col-md-3">


                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-body">

                                    <div class="row gx-3 align-items-start"  style="height: 223px">


                                        @php
                                            $images = $category->images->take(3);
                                        @endphp

                                        <div class="col-md-7">
                                            <img src="{{asset('storage/' . $images[0]->path)}}" alt="" class="w-100 object-fit-cover mb-3 rounded-4" height="223">
                                        </div>

                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-12  mb-3">
                                                    <img src="{{ isset($images[1]) ?   asset('storage/' . $images[1]->path) : '/logo.svg'}}" alt="" class="w-100 object-fit-cover rounded-4" height="103">
                                                </div>
                                                <div class="col-12">
                                                    <img src="{{isset($images[2]) ?  asset('storage/' . $images[2]->path) : '/logo.svg'}}" alt="" class="w-100 object-fit-cover rounded-4" height="103">
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="infos mt-3">
                                        <h4 class="fw-bolder">{{app()->getLocale() == 'ar' ? $category->name : $category->name_fr}}</h4>
                                        <span class="text-secondary">{{$category->images->count()}} {{trans_choice('gallery.images',$category->images->count())}}</span>
                                    </div>

                                </div>

                                <div class="card-footer bg-transparent border-0">
                                    <a href="{{url('/gallery/' . $category->slug)}}" class="btn btn-outline-primary  stretched-link d-block mb-3">دخول</a>


                                </div>

                            </div>




                        </div>
                    @endforeach



            </div>

        </div>

    </section>


@endsection
