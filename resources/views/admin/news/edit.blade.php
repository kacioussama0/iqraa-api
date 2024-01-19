@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Add News</h1>

        <form action="{{route('latest-news.update',$latestNews)}}" method="POST">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <input type="text" class="form-control" name="content" id="content" value="{{$latestNews->content}}">
                @error('content')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="content_fr" class="form-label">Content French</label>
                <input type="text" class="form-control" name="content_fr" id="content_fr" value="{{$latestNews->content_fr}}">
                @error('content_fr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-check form-switch mt-3">
                <input type="checkbox" class="form-check-input"  name="is_published" id="is_published" value="1" @checked($latestNews->is_published)>
                <label for="is_published" class="form-check-label">Is Published</label>
            </div>

            @error('is_published')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <button class="btn btn-primary mt-3 w-100">Update</button>

        </form>
    </div>
@endsection
