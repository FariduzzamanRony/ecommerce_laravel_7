@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">

      <div class="col-lg-4 m-auto">

         <div class="card text-white bg-dark mb-3">
           <div class="card-body">
             <h3 class="bg-warning text-danger text-center" style="padding:5px;">Profile Edit</h3>
@if (session('name_succ'))
   <div class="alert alert-success">
     <h6>{{ session('name_succ') }}</h6>
  </div>
@endif
@if (session('name_error'))
   <div class="alert alert-danger">
     <h6>{{ session('name_error') }}</h6>
  </div>
@endif

          <form method="post" action="{{ url('user/profile/edit/post') }}">
           @csrf
          <div class="form-group">
             @error ('name')
                <div class="alert alert-danger">
                    <div class="tt">
                       <li>{{ $message }}</li>
                    </div>
                </div>
             @enderror
           <label>Please Enter your Name</label>
           <input type="text" class="form-control"   placeholder="Name" name="name" value="{{ Auth::user()->name }}">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          </form>

           </div>
         </div>
         </div>



      <div class="col-lg-4 m-auto">

         <div class="card text-white bg-dark mb-3">
           <div class="card-body">
             <h3 class="bg-warning text-danger text-center" style="padding:5px;">Profile photo uplode</h3>


          <form method="post" action="{{ url('profile_photo/uplode') }}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
           <label>Please Enter your photo</label>
           <input type="file" class="form-control"   placeholder="Name" name="profile_photo" value="">
           </div>
             <button type="submit" class="btn btn-success">Submit</button>
          </form>
           </div>
         </div>
         </div>
   </div>
</div>

@endsection
