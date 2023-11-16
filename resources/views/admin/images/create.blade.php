@extends('layouts.app')

@section('content')

   <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
   <script  src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

   <div class="container">

       <h1 class="mb-4">إضافة صور</h1>

       <div class="card">
           <div class="card-body">
               <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
                   @csrf




                   <div class="mb-3">
                       <label for="category_id" class="form-label">التصنيف</label>
                       <select name="category_id" id="category_id" class="form-select">
                           <option value="" selected disabled>إختر التصنيف المناسب</option>
                           @foreach($categories as $category)
                               <option value="{{$category -> id}}">{{$category->name}}</option>
                           @endforeach
                       </select>
                       @error('category_id')
                       <div class="text-danger">{{$message}}</div>
                       @enderror
                   </div>


                   <div class="mb-3">
                       <label for="thumbnail" class="form-label">الصور</label>
                       <input type="file" multiple name="images[]">

                   </div>


                   <button type="submit" class="btn btn-success mt-3 w-100">إضافة</button>

               </form>
           </div>
       </div>

   </div>


   <script>
       // Get a reference to the file input element
       const inputElement = document.querySelector('input[type="file"]');

       // Create a FilePond instance
       const pond = FilePond.create(inputElement);
       FilePond.setOptions({
           allowMultiple: true,
           server: {
               process: '{{url('upload-photo')}}',
               revert: '{{url('revert')}}',
               headers: {
                   'X-CSRF-TOKEN': '{{csrf_token()}}'
               },
               instantUpload: false
           },

           labelIdle: ' حمل الصور <span class="filepond--label-action"> قم بالرفع </span>'

       });
   </script>
@endsection
