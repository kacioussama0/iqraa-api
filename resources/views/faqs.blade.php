@extends('layouts.front')

@section('content')

    <x-page-title>
        <x-slot:title>{{ __("FAQ") }}</x-slot>
    </x-page-title>


    <section class="faqs">

        <div class="container py-5">


            <div class="row align-items-center">

                <div class="col-md-7">

                    <div class="accordion" id="faqs">

                        @foreach($faqs as $key => $faq)


                            <div class="accordion-item shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button @if($key != 0 ) collapsed @endif" data-bs-toggle="collapse" data-bs-target="#question_{{$key + 1}}">
                                        <h5> <i class="fa-duotone fa-question-circle fa-1x me-1"></i> {{ app()->getLocale() == 'ar' ? $faq['question'] : $faq['question_fr']  }}</h5>
                                    </button>
                                </h2>
                                <div id="question_{{$key + 1}}" class="accordion-collapse collapse @if($key == 0 ) show @endif" data-bs-parent="#faqs" >
                                    <div class="accordion-body">{{ app()->getLocale() == 'ar' ? $faq['answer'] : $faq['answer_fr']  }}</div>
                                </div>
                            </div>

                        @endforeach




                    </div>

                </div>

                <div class="col-md-5">

                    <img src="{{asset('assets/imgs/faq.png')}}" alt="faq png" class="img-fluid">

                </div>

            </div>

        </div>

    </section>


@endsection
