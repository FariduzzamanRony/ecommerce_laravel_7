@extends('layouts.app')

@section('content')


   <div class="col-lg-4 m-auto">
      <div class="card text-success">
        <div class="card-body">
           <h3>Password Change</h3>
           @if (session('change_success'))
              <div class="alert alert-success">
                  {{ session('change_success') }}
              </div>
           @endif
           @if (session('on_math_pass'))
              <div class="alert alert-danger">
                  {{ session('on_math_pass') }}
              </div>
           @endif
           @if (session('old_pass_math'))
              <div class="alert alert-danger">
                  {{ session('old_pass_math') }}
              </div>
           @endif
           <form method="post" action="{{ url('password/change/post') }}">
             @csrf
              <div class="mb-3">
                <label  class="form-label text-primary">Please Enter Old Password</label>
                @error ('old_password')
                  <div class="alert alert-danger">
                     {{ $message }}
                  </div>
               @enderror
                  <input type="password" name="old_password"  class="form-control"  placeholder="Old Password" value="{{ old('old_password')}}">
                     </div>
              <div class="mb-3">
                <label  class="form-label text-primary">Please Enter confirm Password</label>
                @error ('password')
                   <div class="alert alert-danger">
                      {{ $message }}
                  </div>
                @enderror

                  <input type="password" name="password"  class="form-control"  placeholder="New Password" value="{{ old('password')}}">
                     </div>
              <div class="mb-3">
                <label  class="form-label text-primary">Please Enter Old Password</label>
                @error ('password_confirmation')
                   <div class="alert alert-danger">
                      {{ $message }}
                 </div>
                @enderror
                  <input type="password" name="password_confirmation"  class="form-control"  placeholder="confirm Password">
                     </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
   </div>
@endsection
