@extends('layouts.front')

@section('content')

    <x-page-title>
        <x-slot:title>{{ __("Contact") }}</x-slot>
    </x-page-title>


    <section class="contact">

        <div class="container py-5">

            <div class="row g-3">
                @foreach($contacts as $info)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 rounded-5 text-center shadow-sm  border-1 border-primary-subtle">
                            <div class="card-body">
                                <div class="vstack gap-3 text-center justify-content-center align-items-center">
                                    <i class="{{ $info['icon'] }} fa-3x"></i>
                                    <a
                                        href="{{ $info['link'] }}"
                                        target="_blank"
                                        class="fw-bolder text-decoration-none text-dark fs-5"

                                    >
                                        {{ $info['text'] }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            @if(session('success'))
                <div class="alert alert-success mt-4">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger mt-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="form-contact my-5">

                <div class="row gy-5">


                    <div class="col-md-6 order-lg-0 order-1">

                        <form action="" method="POST">

                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" placeholder="Votre Nom">
                                <label for="name">{{__("contact.name")}}</label>
                                @if($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">{{__("contact.subject")}}</label>
                                @if($errors->has('subject'))
                                    <div class="text-danger">
                                        {{ $errors->first('subject') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <label for="email">{{__("contact.email")}}</label>
                                @if($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Message" id="message" style="height: 100px"></textarea>
                                <label for="message">{{__("contact.message")}}</label>
                                @if($errors->has('message'))
                                    <div class="text-danger">
                                        {{ $errors->first('message') }}
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-lg mt-4 btn-primary w-100">{{__("contact.send_message")}}</button>

                        </form>

                    </div>

                    <div class="col-md-6 order-lg-1 order-0">
                        <img src="{{asset('assets/imgs/contact.png')}}" alt="contact us" class="img-fluid">
                    </div>

                </div>

            </div>

        </div>

    </section>


@endsection
