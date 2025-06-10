@extends('layouts.front')


@php


    if(session('locale') === 'ar') {

        \Illuminate\Support\Facades\App::setLocale('ar');
    } else {
        \Illuminate\Support\Facades\App::setLocale('fr');
    }

@endphp

@section('content')

    <div class="not-found">
        <div class="my-5 w-100 h-100 d-flex justify-content-center align-items-center flex-column text-center">
            <div class="container">

                {{-- Image 404 --}}
                <img src="{{ asset('assets/imgs/404.png') }}" alt="404" class="img-fluid mb-4" style="max-width: 800px;">

                {{-- Titre --}}
                <h1 class="mb-4 fw-bold text-danger">
                    {{ __('404 - Page non trouvée') }}
                </h1>

                {{-- Description --}}
                <p class="mb-4 text-muted">
                    {{ __("Désolé, la page que vous recherchez n'existe pas ou a été déplacée.") }}
                </p>

                {{-- Bouton de retour --}}
                <a href="{{ url('/') }}" class="btn btn-lg btn-outline-primary px-4">
                    <i class="fas fa-home me-2"></i> {{ __('Retour à la page d\'accueil') }}
                </a>

            </div>
        </div>
    </div>

@endsection
