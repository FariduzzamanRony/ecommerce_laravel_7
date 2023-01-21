@extends('layouts.app')
@section('content')

<div class="container">
   <div class="row">
      <div class="col-lg-4 ml-auto">
         <div class="card text-white bg-dark mb-3">
           <div class="card-body">
             <h3 class="bg-warning text-danger text-center" style="padding:5px;">New Login</h3>
@if (session('password'))
   <div class="alert alert-danger">
      {{ session('password') }}
   </div>
@endif
@if (session('email'))
   <div class="alert alert-danger">
      {{ session('email') }}
   </div>
@endif


          <form method="post" action="{{ url('new_login/post') }}">
             @csrf
          <div class="form-group">
           <label>Please Enter your Email</label>
           <input type="text" class="form-control"   placeholder="Email" name="new_email" value="{{ old('new_email') }}">
          </div>
          <div class="form-group">
           <label>Please Enter your password</label>
           <input type="text" class="form-control"   placeholder="Password" name="password">
          </div>

          <button type="submit" class="btn btn-success">Submit</button>
          </form>

           </div>
         </div>
         </div>
   </div>
</div>
@endsection
