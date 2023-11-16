@extends('layouts.app')

@section('content')


    <div class="container">

        <h1 class="mb-4">Messages ({{count($messages)}})</h1>

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($messages as $message)


                        <tr>
                            <td>{{$message->name}}</td>
                            <td>{{$message->subject}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->message}}</td>
                            <td>{{$message->created_at}}</td>
                            <td>{{$message->updated_at}}</td>
                        </tr>

                    @endforeach


                </tbody>

            </table>

        </div>

    </div>

@endsection
