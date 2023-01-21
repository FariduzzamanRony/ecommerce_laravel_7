@extends('layouts.app')
@section('content')


<div class="container">

   <div class="row">
      <div class="col-lg-4 m-auto">
               <div class="card">
                  <div class="card-title text-center bg-info">
                     <h3>Blog</h3>
                  </div>
   @if (session('blog_edit_success'))
      <div class="alert alert-danger">
         {{ session('blog_edit_success') }}
      </div>
   @endif

                  <div class="card-body">
                  <form method="post" action="{{ route('blog/edit/post') }}" enctype="multipart/form-data">
                  @csrf

                  <div class="from-control">

                     <label>Please Enter your name</label>
                     @error ('blog_name')
                        <div class="alert alert-danger">
                           {{ $message }}
                        </div>
                     @enderror
                     <input type="text" class="from-control" placeholder="name" name="blog_id" value="{{ $blog_information->id }}">
                     <input type="text" class="from-control" placeholder="name" name="blog_name" value="{{ $blog_information->blog_name }}">
                  </div>
                  <div class="from-control">

                     <label>Please Enter your email</label>
                     @error ('blog_email')
                        <div class="alert alert-danger">
                           {{ $message }}
                        </div>
                     @enderror
                     <input type="email" class="from-control" placeholder="email" name="blog_email" value="{{ $blog_information->blog_email }}">
                  </div>
                  <div class="from-control">
                     @error ('blog_photo')
                        <div class="alert alert-danger">
                           {{ $message }}
                        </div>
                     @enderror
                     <label>Please Enter your photo</label>
                     <br>
                       <img src="{{ asset('uplodes/blog_photoss') }}/{{ $blog_information->blog_photo }}" alt="" width="100">
                          <br>

                     <input type="file" class="from-control" name="blog_photo">
                  </div>


<br>
<button type="submit" class="btn btn-success bg-info">send</button>
                   </form>
                    </div>

               </div>
      </div>
   </div>
</div>






@endsection
