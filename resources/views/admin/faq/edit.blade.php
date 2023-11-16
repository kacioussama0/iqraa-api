@extends('layouts.app')

@section('content')

  <div class="container">

      @if($errors->any())

          <div class="alert alert-danger">

              <ul>
                  @foreach($errors->all() as $error)

                      <li>{{$error}}</li>

                  @endforeach

              </ul>

          </div>

      @endif
      <form action="{{route('faq.update',$question)}}" method="POST">


          @csrf
          @method('PATCH')

          <div class="form-group mb-3">
              <label for="question" class="form-label">Question</label>
              <input type="text" name="question" id="question" class="form-control" placeholder="Enter Question" value="{{$question->question}}">
          </div>


          <div class="form-group mb-3">
              <label for="question_fr" class="form-label">Question Fr</label>
              <input type="text" name="question_fr" id="question_fr" class="form-control" placeholder="Enter Question" value="{{$question->question_fr}}">
          </div>



          <div class="form-group mb-3">
              <label for="answer" class="form-label">Answer</label>
              <textarea name="answer" id="answer"  class="form-control">{{$question->answer}}</textarea>
          </div>

          <div class="form-group mb-3">
              <label for="answer_fr" class="form-label">Answer Fr</label>
              <textarea name="answer_fr" id="answer_fr"  class="form-control">{{$question->answer_fr}}</textarea>
          </div>

          <button class="btn btn-primary w-100">تعديل السؤال</button>

      </form>



  </div>

@endsection
