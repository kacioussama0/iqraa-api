@extends('layouts.front')

@section('content')


    <x-page-title>
        <x-slot:title>Qui sommes-nous</x-slot>
    </x-page-title>

    <section class="about-us">

        <div class="container py-5">
{{--            <h1 class="fw-bold mb-5">{{ __('who.title') }}</h1>--}}



            <div class="accordion" id="accordionExample">
                @php
                    $sections = __('who.sections');
                @endphp

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                            <h5>{{ $sections['definition_title'] }}</h5>
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">{!! $sections['definition_text']  !!} </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2">
                            <h5>{{ $sections['vision_title'] }}</h5>
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">{{ $sections['vision_text'] }}</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3">
                            <h5>{{ $sections['mission_title'] }}</h5>
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">{{ $sections['mission_text'] }}</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse4">
                            <h5>{{ $sections['goals_title'] }}</h5>
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body row">
                            @foreach(array_chunk($sections['goals_list'], ceil(count($sections['goals_list']) / 2)) as $chunk)
                                <div class="col-md-6">
                                    <ul class="list-unstyled vstack gap-3">
                                        @foreach($chunk as $goal)
                                            <li><i class="fa-duotone fa-circle-check text-primary me-2"></i>{{ $goal }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>


@endsection
