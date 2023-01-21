@extends('layouts.app')

@section('content')


   <div class="col-lg-4 m-auto">
      <div class="card text-success">
        <div class="card-body">
           <h3>Edit Category /={{ $Category_info->category_name }}</h3>

{{-- @php
print_r($errors->all());
@endphp --}}

@if ($errors->all())
   @foreach ($errors->all() as $value)
      <div class="alert alert-danger">
         <li>{{ $value }}</li>
      </div>
   @endforeach
@endif




           <form method="post" action="{{ url('edit/category/post') }}">
               @csrf
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-primary">Category Name</label>
@if (session('category_name'))
   <div class="alert alert-danger">
        <div class="tt">
           <li>{{ $message }}</li>
        </div>
   </div>
@endif
                  <input type="hidden" name="category_id" value="{{ $Category_info->id }}" class="form-control" id="exampleInputPassword1">
                  <input type="text" name="category_name" value="{{ $Category_info->category_name }}" class="form-control" id="exampleInputPassword1">
                     </div>
              <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label text-primary">Category Title</label>

                    <input type="text" name="category_title" value="{{ $Category_info->category_title }}" class="form-control" id="exampleInputPassword1">
                       </div>

             <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label text-primary">Descriptsion</label>
                  <textarea id="w3review" name="category_description" rows="4" cols="40">{{ $Category_info->category_description }} </textarea>


                     </div>

                 <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
   </div>

@endsection
