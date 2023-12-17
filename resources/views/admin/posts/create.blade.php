@extends('layouts.app')

@section('content')
    <div class="container">




        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Title Fr</label>
                <input type="text" class="form-control" name="title_fr" id="title_fr" value="{{old('title_fr')}}">
                @error('title_fr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{old('slug')}}">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug" class="form-label">Slug Fr</label>
                <input type="text" class="form-control" name="slug_fr" id="slug_fr" value="{{old('slug_fr')}}">
                @error('slug_fr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="category_id" class="form-label">Categories</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name . " ($category[name_fr]) "}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file"  class="form-control" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}">
                @error('thumbnail')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content">{!! old('content') !!}</textarea>
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content_fr" class="form-label">Content Fr</label>
                <textarea name="content_fr" id="content_fr">{!! old('content_fr') !!}</textarea>
                @error('content_fr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-check form-switch mt-3">
                <input type="checkbox"  class="form-check-input"  name="is_published" id="is_published" value="1">
                <label for="is_published" class="form-check-label">Is Published</label>
            </div>

            @error('is_published')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <button class="btn btn-primary mt-3 w-100">Create</button>

        </form>
    </div>

    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>

    <script>ClassicEditor
            .create( document.querySelector( '#content' ), {

                licenseKey: '',

                ckfinder: {
                    uploadUrl: "{{route('posts.uploadImage') . '?_token=' . csrf_token()}}",

                }

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>

    <script>ClassicEditor
            .create( document.querySelector( '#content_fr' ), {
                licenseKey: '',
                ckfinder: {
                    uploadUrl: "{{route('posts.uploadImage') . '?_token=' . csrf_token()}}",
                }

            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>
@endsection
