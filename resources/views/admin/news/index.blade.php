@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Latest News</h1>

        <a href="{{route('latest-news.create')}}" class="btn btn-primary">Add News</a>

        @if(Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif

        <div class="table-responsive my-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Content</th>
                        <th>Content French</th>
                        <th>Published</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $new)
                        <tr>
                            <td>{{$new->content}}</td>
                            <td>{{$new->content_fr ?? "?"}}</td>
                            <td>{{$new->is_published ? "Yes" : "No" }}</td>
                            <td>{{$new->created_at}}</td>
                            <td>{{$new->updated_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('latest-news.edit',$new)}}">Edit</a></li>
                                        <li>
                                                <form action="{{route('latest-news.destroy',$new)}}" method="POST" onsubmit="return confirm('are you sure ?')">
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
