@extends('layouts.app')

@section('content')

    <div class="container">


        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
            </div>
        @endif

        <a href="{{route('faq.create')}}" class="btn btn-lg btn-primary mb-4">Add Question</a>


        <div class="table-responsive rounded">

            <table class="table table-striped table-primary border rounded">

                <thead>

                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>

                </thead>

                <tbody>

                @foreach($questions as $question)

                    <tr>

                        <td>{{$question->question}}</td>
                        <td>{{$question->answer}}</td>
                        <td>{{$question->created_at}}</td>
                        <td>{{$question->updated_at}}</td>
                        <td>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{route('faq.edit',$question)}}"  class="dropdown-item">Edit</a></li>
                                    <li>
                                        <form action="{{route('faq.destroy',$question)}}" method="POST" onsubmit="return confirm('Are You Sure !!!')" class="d-inline-block w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item">Delete</button>

                                        </form>
                                    </li>


                                </ul>
                            </div>
                        </td>

                    </tr>


                @endforeach

                </tbody>

            </table>



        </div>

    </div>

@endsection
