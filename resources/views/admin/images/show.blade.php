@extends('layouts.app')

@section('content')



    <div class="container">


        <h1 class="mb-4">Photos</h1>


        @if(session()->exists('success'))

            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>

        @endif



        <div class="row">
            @foreach($categoryImages as $image)
                <div class="col-md-6 mb-3">
                    <div class="card text-center rounded-5  border-1 shadow">
                        <div class="card-body">
                            <img src="{{asset('storage/'.$image->path)}}" alt="" class="img-fluid rounded-3">

                        </div>

                        <div class="card-footer">
                            <form action="{{route('images.destroy',$image)}}" method="POST" onsubmit="return confirm('are you sure !!!')">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
