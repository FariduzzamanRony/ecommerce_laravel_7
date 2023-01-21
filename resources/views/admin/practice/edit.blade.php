@extends('layouts.app')

@section('content')


   <div class="col-lg-4 m-auto">
      <div class="card text-success">
        <div class="card-body">
      <a href="{{ url('practice')}}">Back</a>
           <h3 class="bg-warning text-center" style="padding:20px;">Edit Practice / <span class="text-danger">{{ $edit_Practice->name }}</span> </h3>
@if (session('edit_success'))
   <div class="alert alert-success">
      {{ session('edit_success') }}
   </div>
@endif

           <form method="post" action="{{ url('edit/practice/post') }}">
@csrf
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-primary">Please Enter your Name</label>
                  <input type="text" name="edit_id"  class="form-control" placeholder="id" value="{{ $edit_Practice->id }}">
                  <input type="text" name="name"  class="form-control" placeholder="Name" value="{{ $edit_Practice->name }}">
                     </div>
              <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label text-primary">Please Enter your Email</label>

                    <input type="text" name="email"  class="form-control" placeholder="Email" value="{{ $edit_Practice->email }}">
                       </div>



                 <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
   </div>
@endsection
