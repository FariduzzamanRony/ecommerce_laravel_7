@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-lg-12">




         <div class="card ">
            <div class="card-header bg-success text-warning text-center">
            <h2>Contact view</h2>
          </div>
          @if (session('contact_delete'))
             <div class="alert alert-success">
               <h3>{{ session('contact_delete') }}</h3>
             </div>
          @endif
          @if (session('restore_contact'))
             <div class="alert alert-success">
               <h3>{{ session('restore_contact') }}</h3>
             </div>
          @endif
            <table class="table">
  <thead>
     <tr>
         <td>ID<td>
         <td>Name<td>
         <td>Email<td>
         <td>Phone<td>
         <td>Title<td>
         <td>Messages<td>
         <td>SoftDeletes<td>
         <td>Created_At<td>
         <td>Updated_At<td>
         <td>Action<td>

     </tr>
  </thead>
  <tbody>

   {{-- ucfirst() - converts the first character of a string to uppercase
   lcfirst() - converts the first character of a string to lowercase
   strtoupper() - converts a string to uppercase
   strtolower() - converts a string to lowercase --}}
   {{--timezone('Asia/Dhaka')-> format('h:i:s:A')
   format('d/m/Y')
   diffForHumans() --}}
     @forelse ($contacts as  $value)
          <tr>
                <td>{{ $value->id }}<td>
                <td>{{ucfirst(strtolower($value->contact_name))  }}<td>
                <td>
                   {{ substr($value->contact_email,0,10) }}
                     @if (strlen($value->contact_email>=10))
                          {{ '...' }}
                     @endif
                   <td>
                <td>0{{ $value->contact_number }}<td>
                <td>{{ $value->contact_title }}<td>
                <td>{{ $value->contact_messages }}<td>
                <td>{{ $value->deleted_at }}<td>
                   <td>
                     <li> {{ $value->created_at->timezone('Asia/Dhaka')->format('h:i:s:A') }}</li>
                     <li> {{ $value->created_at->format('d/m/Y') }} </li>
                     <li> {{ $value->created_at->diffForHumans() }}</li>
                  <td>
                <td>{{ $value->updated_at }}<td>
                <td>
                 <a href="{{ url('contact/edit') }}/{{ $value->id }}" type="button" class="btn btn-primary" name="button">Edit</a>
  <a href="{{ url('contact/delete') }}/{{ $value->id }}" type="button" class="btn btn-warning" name="button">Delete</a>
                <td>

          </tr>
      @empty
         <tr>
            <td colspan="80" class="text-center text-danger"> <h4>Nothing to Show</h4> </td>
         </tr>
      @endforelse
</tbody>
</table>
         </div>
      </div>





<div class="col-lg-4 m-auto py-5">
      <div class="card-header bg-success text-warning text-center">
      <h2>Contact Insert</h2>
    </div>
      @if (session('success'))
         <div class="alert alert-success">
           <h3>{{ session('success') }}</h3>
         </div>
      @endif
      {{-- {{ print_r($errors->all()) }} --}}
<form method="post" action="{{ url('contact/post') }}">
    @csrf
  <div class="form-group">
    <label>Please Enter your Name</label>
    @error ('contact_name')
      <div class="alert alert-danger">
         {{ $message }}
</div>
   @enderror
    <input type="text" class="form-control"   placeholder="Name" name="contact_name" value="{{ old('contact_name')}}">
  </div>
  <div class="form-group">
    <label>Please Enter your Email</label>
    @error ('contact_email')
      <div class="alert alert-danger">
         {{ $message }}
</div>
   @enderror
    <input type="text" class="form-control"   placeholder="Email" name="contact_email" value="{{ old('contact_email')}}">
  </div>
  <div class="form-group">
    <label>Please Enter your Number</label>
    @error ('contact_number')
      <div class="alert alert-danger">
         {{ $message }}
</div>
   @enderror
    <input type="tel" class="form-control"   placeholder="Number" name="contact_number" value="{{ old('contact_number')}}">
  </div>

  <div class="form-group">
<label>Please Enter your Title</label>
    @error ('contact_title')
      <div class="alert alert-danger">
         {{ $message }}
</div>
   @enderror
    <input type="text" class="form-control"   placeholder="Title" name="contact_title" value="{{ old('contact_title') }}">
  </div>
  <div class="form-group">
    <label>Please Enter your Messages</label>
    @error ('contact_messages')
      <div class="alert alert-danger">
         {{ $message }}
      </div>
   @enderror
    <textarea  class="form-control" rows="4" cols="20" placeholder="Messages" name="contact_messages">{{ old('contact_messages') }}</textarea>
  </div>
  <button type="submit" class="btn bg-success text-warning text-center">Submit</button>
</form>
      </div>
   </div>
</div>
</div>
<div class="container">
   <div class="row">
     <div class="col-lg-12"><div class="card ">
        <div class="card-header bg-success text-warning text-center">
        <h2>Contact SoftDeletes view</h2>
      </div>
      @if (session('Hard_delete_contact'))
         <div class="alert alert-success">
           <h3>{{ session('Hard_delete_contact') }}</h3>
         </div>
      @endif
        <table class="table table-dark">
          <thead>
             <tr>
                 <td>ID<td>
                 <td>Name<td>
                 <td>Email<td>
                 <td>Phone<td>
                 <td>Title<td>
                 <td>Messages<td>
                 <td>SoftDeletes<td>
                 <td>Created_At<td>
                 <td>Updated_At<td>
                 <td>Action<td>

             </tr>
          </thead>
          <tbody>
             @forelse ($contact_softdelete as $key => $value)
                <tr>
                  <td>{{ $value->id }}<td>
                  <td>{{ucfirst(strtolower($value->contact_name))  }}<td>
                  <td>
                     {{ substr($value->contact_email,0,10) }}
                       @if (strlen($value->contact_email>=10))
                            {{ '...' }}
                       @endif
                     <td>
                  <td>0{{ $value->contact_number }}<td>
                  <td>{{ $value->contact_title }}<td>
                  <td>{{ $value->contact_messages }}<td>
                  <td>
                     <li> {{ $value->deleted_at->timezone('Asia/Dhaka')->format('h:i:s:A') }}</li>
                     <li> {{ $value->deleted_at->format('d/m/Y') }} </li>
                     <li> {{ $value->deleted_at->diffForHumans() }}</li>
                     <td>
                  <td>
                     <li> {{ $value->created_at->timezone('Asia/Dhaka')->format('h:i:s:A') }}</li>
                     <li> {{ $value->created_at->format('d/m/Y') }} </li>
                     <li> {{ $value->created_at->diffForHumans() }}</li>
                  <td>
                  <td>
                     <li> {{ $value->updated_at->timezone('Asia/Dhaka')->format('h:i:s:A') }}</li>
                     <li> {{ $value->updated_at->format('d/m/Y') }} </li>
                     <li> {{ $value->updated_at->diffForHumans() }}</li>
                  <td>
                     <td>
                      <a href="{{ url('contact/restore_contact') }}/{{ $value->id }}" type="button" class="btn btn-success" name="button">Restore</a>
                     <td>
                     <td>
                      <a href="{{ url('contact/hard_delete') }}/{{ $value->id }}" type="button" class="btn btn-danger" name="button">Delete</a>
                     <td>
               </tr>
             @empty
                <tr>
                 <td colspan="80" class="text-center text-danger"> <h3>Nothing to Show</h3> </td>
               </tr>
             @endforelse



          </tbody>
        </table>
     </div>
   </div>
   </div>
</div>
@endsection
