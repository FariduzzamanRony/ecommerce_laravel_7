@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">

      <div class="col-lg-4 m-auto">

         <div class="card text-white bg-dark mb-3">
           <a href="{{ url('contact') }}" class="card-header text-warning">Back</a>
           <div class="card-body">

             <h3 class="card-title text-success">Contact Edit / {{ $contact_edit->contact_name }}</h3>
             @if (session('success'))
                <div class="alert alert-success">
                  <h3>{{ session('success') }}</h3>
                </div>
             @endif
             {{-- {{ print_r($errors->all()) }} --}}
             @if (session('contact_success_edit'))
              <div class="alert alert-success">
                 <h3 class="text-warning">{{ session('contact_success_edit') }}</h3>
              </div>
           @endif
          <form method="post" action="{{ url('contact/edit/post') }}">
           @csrf
          <div class="form-group">
           <label>Please Enter your Name</label>
            @error ('contact_name')
             <div class="alert alert-danger">
                {{ $message }}
          </div>
          @enderror
           <input type="text" class="form-control"   placeholder="Name" name="id" value="{{ $contact_edit->id }}">
           <br>
           <input type="text" class="form-control"   placeholder="Name" name="contact_name" value="{{ $contact_edit->contact_name }}">
          </div>
          <div class="form-group">
           <label>Please Enter your Email</label>
           @error ('contact_email')
             <div class="alert alert-danger">
                {{ $message }}
          </div>
          @enderror
           <input type="text" class="form-control"   placeholder="Email" name="contact_email" value="{{ $contact_edit->contact_email }}">
          </div>
          <div class="form-group">
           <label>Please Enter your Number</label>
            @error ('contact_number')
             <div class="alert alert-danger">
                {{ $message }}
          </div>
          @enderror
           <input type="text" class="form-control"   placeholder="Number" name="contact_number" value="0{{ $contact_edit->contact_number }}">
          </div>

          <div class="form-group">
          <label>Please Enter your Title</label>
            @error ('contact_title')
             <div class="alert alert-danger">
                {{ $message }}
          </div>
          @enderror
           <input type="text" class="form-control"   placeholder="Title" name="contact_title" value="{{ $contact_edit->contact_title }}">
          </div>
          <div class="form-group">
           <label>Please Enter your Messages</label>
            @error ('contact_messages')
             <div class="alert alert-danger">
                {{ $message }}
             </div>
          @enderror
           <textarea  class="form-control" rows="4" cols="20" placeholder="Messages" name="contact_messages">{{ $contact_edit->contact_messages }}</textarea>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          </form>

           </div>
         </div>
         </div>
   </div>
</div>

@endsection
