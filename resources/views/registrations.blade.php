@extends('layouts.front')

@section('content')


    <x-page-title>
        <x-slot:title>{{ __('inscription.Inscription scolaire') }}</x-slot>
    </x-page-title>

    <section class="inscriptions">

        <div class="container py-5">


            <section id="registration" class="mb-4">
                <div class="row gy-3 align-items-center mb-5">

                    <div class="col-lg-6 order-1 order-lg-0">

                        <div class="card rounded-5 border-0 shadow-sm">

                            <h3 class="card-header text-success rounded-top-5 bg-primary-subtle border-primary-subtle">
                                {{ __('inscription.Annonce importante aux parents') }}
                            </h3>

                            <div class="card-body">
                                <h4 class="text-dark fw-bolder mb-3">
                                    {{ __('inscription.Ouverture des inscriptions 2025-2026') }}
                                </h4>
                                <p class="text-muted">
                                    {{ __('inscription.Sous la supervision du Département de la Culture et Enseignement, la direction de l’École Arabe de Genève a le plaisir d’informer les familles de l’ouverture des inscriptions pour la prochaine année scolaire, du 10 juin au 13 juillet 2025.') }}
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6 order-0 order-lg-1">
                        <img src="{{ asset('assets/imgs/inscriptions.png') }}" alt="inscriptions" class="img-fluid">
                    </div>

                </div>

                <div class="alert alert-warning border border-2 border-warning" role="alert">
                    <h4 class="alert-heading">
                        <i class="fa-duotone fa-exclamation-triangle me-2"></i> {{ __('inscription.Remarques importantes') }}
                    </h4>
                    <p class="mb-0">
                        {{ __('inscription.Le nombre de places étant très limité, merci de procéder à l’inscription dès que possible pour garantir une place à votre enfant.') }}
                    </p>
                </div>
            </section>

            <div class="mb-4">
                <h5 class="fw-bold mb-3">
                    <i class="fa-duotone fa-table me-2"></i> {{ __('inscription.Répartition des places par niveau') }}
                </h5>
                <table class="table table-hover table-bordered text-center rounded-4">
                    <thead class="table-light">
                    <tr>
                        <th><i class="fa-duotone fa-layer-group"></i> {{ __('inscription.Niveau') }}</th>
                        <th><i class="fa-duotone fa-user-graduate"></i> {{ __('inscription.Places disponibles') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><td>{{ __('inscription.Classe Préscolaire – 1ère année') }}</td><td><strong>88</strong></td></tr>
                    <tr><td>{{ __('inscription.Classe Préscolaire – 2ème année') }}</td><td><strong>26</strong></td></tr>
                    <tr><td>{{ __('inscription.Niveau 1') }}</td><td><strong>61</strong></td></tr>
                    <tr><td>{{ __('inscription.Réinscriptions (tous niveaux)') }}</td><td><strong>1322</strong></td></tr>
                    </tbody>
                </table>
            </div>


            <div class="alert alert-danger border border-danger" role="alert">
                <h5 class="fw-bold mb-3 text-danger">{{ __('inscription.N.B') }}</h5>
                <p>{{ __('inscription.Tout dossier reçu après la date limite ne pourra être retenu et la place sera automatiquement attribuée à un nouvel élève.') }}</p>

                <p class="fw-bold mt-3">{{ __('inscription.Concernant le créneau du samedi après-midi :') }}</p>
                <ul class="mb-2">
                    <li>{{ __('inscription.La classe de niveau 4 compte actuellement 27 élèves, alors que la capacité maximale est de 20 places.') }}</li>
                    <li>{{ __('inscription.Les places seront attribuées par ordre de réception des inscriptions.') }}</li>
                </ul>

                <p class="fw-bold mt-3">{{ __('inscription.Pour le mercredi après-midi, 7 places sont encore disponibles.') }}</p>
                <ul class="mb-2">
                    <li>{{ __('inscription.Les inscriptions seront acceptées jusqu’à ce que le quota de 20 élèves par classe maximum soit atteint.') }}</li>
                </ul>

            </div>


            <div class="mb-4">
                <h4 class="fw-bold text-danger">
                    <i class="fa-duotone fa-thumbtack me-2"></i> {{ __('inscription.Conditions d’inscription') }}
                </h4>

                <div class="row my-4">
                    <div class="col-md-4  mb-3">
                        <div class="card rounded-5 py-3 shadow border-0 h-100">
                            <div class="card-body text-center">
                                <i class="fa-duotone fa-calendar-check text-danger fa-3x mb-2"></i>
                                <p class="mb-0">{{ __('inscription.Respect impératif des délais fixés.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4  mb-3">
                        <div class="card rounded-5 py-3 shadow border-0 text-center h-100">
                            <div class="card-body text-center">
                                <i class="fa-duotone text-danger fa-credit-card fa-3x mb-2"></i>
                                <p class="mb-0">{{ __('inscription.Paiement total ou du premier versement lors de l’inscription.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4  mb-3">
                        <div class="card rounded-5 py-3 shadow border-0 text-center h-100">
                            <div class="card-body">
                                <i class="fa-duotone fa-folder-open text-danger fa-3x mb-2"></i>
                                <p class="mb-0">{{ __('inscription.Régularisation de toute dette antérieure.') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row my-4">
                <h4 class="fw-bold text-primary mb-4">
                    <i class="fa-duotone fa-calendar-days me-2"></i> {{ __('inscription.Dates de la rentrée scolaire') }}
                </h4>

                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 py-3 shadow border-0 text-center h-100">
                        <div class="card-body">
                            <i class="fa-duotone fa-calendar-day fa-3x text-primary mb-2"></i>
                            <p class="mb-0">{{ __('inscription.Samedi 6 septembre 2025') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 py-3 shadow border-0 text-center h-100">
                        <div class="card-body">
                            <i class="fa-duotone fa-calendar-day fa-3x text-primary mb-2"></i>
                            <p class="mb-0">{{ __('inscription.Dimanche 7 septembre 2025') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 py-3 shadow border-0 text-center h-100">
                        <div class="card-body">
                            <i class="fa-duotone fa-calendar-day fa-3x text-primary mb-2"></i>
                            <p class="mb-0">{{ __('inscription.Mercredi 10 septembre 2025') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <h4 class="fw-bold text-warning-emphasis mb-3">
                    <i class="fa-duotone fa-clock me-2"></i> {{ __('inscription.Horaires des cours') }}
                </h4>

                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 py-3 shadow border-0 text-center h-100">
                        <div class="card-body">
                            <i class="fa-duotone fa-sun fa-3x text-warning-emphasis mb-2"></i>
                            <p class="mb-0">{{ __('inscription.Matin : de 09h00 à 13h00') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 py-3 shadow border-0 text-center h-100">
                        <div class="card-body">
                            <i class="fa-duotone fa-cloud-sun fa-3x text-warning-emphasis mb-2"></i>
                            <p class="mb-0">{{ __('inscription.Après-midi : de 13h30 à 17h30') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 py-3 shadow border-0 text-center h-100">
                        <div class="card-body">
                            <i class="fa-duotone fa-sunrise fa-3x text-warning-emphasis mb-2"></i>
                            <p class="mb-0">{{ __('inscription.Dimanche : de 10h00 à 14h00') }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-5">
                <a href="http://inscription-eag.fcigeneve.ch" class="btn btn-lg btn-outline-danger px-5 py-3 fw-bold inscription-btn" target="_blank">
                    <i class="fa-duotone fa-globe me-2"></i> {{ __('inscription.Accéder au formulaire d’inscription') }}
                </a>
            </div>

            <div class="mt-5 text-center">
                <p>{{ __('inscription.Message de fin') }}</p>
                <p>{{ __('inscription.Salutations finales') }}</p>
                <p class="fw-bold">{{ __('inscription.Nom de l\'école') }}</p>
            </div>


        </div>

    </section>


    <style>

        .inscription-btn {
            animation: clignote 3s ease-in-out 3s infinite;
            font-size: 1.2rem;
            font-weight: bold;
        }

        @keyframes clignote {
            0% {
                background: var(--bs-danger);
                color: #ffffff;

            }
            50% {
                background: #ffffff;
                color: var(--bs-danger);
            }
            100% {
                background: var(--bs-danger);
                color: #ffffff;
            }
        }


    </style>


@endsection
