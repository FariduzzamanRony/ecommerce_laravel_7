@extends('layouts.app')
@section('content')

<div class="container">
   <div class="row">
      <div class="col-lg-4 ml-auto">


         <div class="card text-white bg-dark mb-3">
           <div class="card-body">
             <h3 class="bg-warning text-danger text-center" style="padding:5px;">New Register</h3>
 @if (session('register_success'))
    <div class="alert alert-success">
       {{ session('register_success') }}
    </div>
 @endif
          <form method="post" action="{{ url('new/register/post') }}">
             @csrf

          <div class="form-group">
           <label>Please Enter your Name</label>
           @error ('new_name')
             <div class="alert alert-danger">
                 {{ $message }}
             </div>
          @enderror
           <input type="text" class="form-control"   placeholder="Name" name="new_name" value="{{ old('new_name') }}">
          </div>
          <div class="form-group">
           <label>Please Enter your Email</label>
           @error ('new_email')
             <div class="alert alert-danger">
                 {{ $message }}
             </div>
          @enderror
           <input type="text" class="form-control"   placeholder="Email" name="new_email" value="{{ old('new_email') }}">
          </div>
          <div class="form-group">
           <label>Please Enter your Password</label>
           @error ('password')
             <div class="alert alert-danger">
                 {{ $message }}
             </div>
          @enderror
           <input type="text" class="form-control"   placeholder="New password" name="password" value="{{ old('password') }}">
          </div>

          <div class="form-group">
           <label>Please Enter your Confirm Password</label>
           @error ('password_confirmation')
             <div class="alert alert-danger">
                 {{ $message }}
             </div>
          @enderror
           <input type="text" class="form-control" placeholder="Confirm Password" name="password_confirmation">
          </div>
          <div class="form-group">
           <label>Please Enter your Confirm Password</label>
           @error ('date_of_brith')
             <div class="alert alert-danger">
                 {{ $message }}
             </div>
          @enderror
           <input type="date" class="form-control" placeholder="Confirm Password" name="date_of_brith">
          </div>
          <div class="form-group">
           <label>select Gander</label>
           <br>
                         <input type="radio" id="female" name="gender" value="female">
                                      <label for="html">Female</label>
                                      <br>
                                      <input type="radio" id="male" name="gender" value="Male">
                                      <label for="css">Male</label>
                                       <br>
                                       <input type="radio" id="custom" name="gender" value="Custom">
                                          <label for="css">Custom</label>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          </form>

           </div>
         </div>
         </div>
   </div>
</div>
@endsection
