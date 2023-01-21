@extends('layouts.app')
@section('content')


<div class="container">
      <div class="row">
         <table class="table table-bordered">
           <thead>
             <tr>
               <th>Id</th>
               <th>Name</th>
               <th>Email</th>
               <th>photo</th>
               <th>Created</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             @foreach ($bloge as  $value)
                <tr>
                 <td>{{ $value->id }}</td>
                 <td>{{ $value->blog_name }}</td>
                 <td>{{ $value->blog_email }}</td>
                 <td> <img src="{{ asset('uplodes/blog_photoss') }}/{{ $value->blog_photo }}" alt="" width="50"></td>
                 <td>
                    <li>{{ $value->created_at }}</li>
                 </td>
                 <td>
                <a href="{{ url('blog/edit') }}/{{ $value->id }}" class="btn btn-primary">Edit</a>
                 </td>
              </tr>
             @endforeach

           </tbody>
         </table>
      </div>

   <div class="row">
      <div class="col-lg-4 m-auto">
               <div class="card">
                  <div class="card-title text-center bg-info">
                     <h3>Blog</h3>
                  </div>



@if (session('blog_success'))
   <div class="alert alert-info">
      {{ session('blog_success') }}
   </div>
@endif


                  <div class="card-body">
                  <form method="post" action="{{ route('blog/post') }}" enctype="multipart/form-data">
                     @csrf

                  <div class="from-control">
                     @error ('blog_name')
                        <div class="alert alert-danger">
                           {{ $message }}
                        </div>
                     @enderror
                     <label>Please Enter your name</label>
                     <input type="text" class="from-control" placeholder="name" name="blog_name">
                  </div>
                  <div class="from-control">
                     @error ('blog_email')
                        <br>
                        <div class="alert alert-danger">
                           {{ $message }}
                        </div>
                     @enderror
                     <label>Please Enter your name</label>
                     <input type="email" class="from-control" placeholder="email" name="blog_email">
                  </div>
                  <div class="from-control">
                     <label>Please Enter your name</label>
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
