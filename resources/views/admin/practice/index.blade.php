@extends('layouts.app')
@section('content')
   <style>
   table, th, td {
  border: 1px solid;
}
   </style>
<div class="container">
   <div class="row">
      <div class="col-lg-12">
         @if (session('delete_success'))
            <div class="alert alert-danger">
               {{ session('delete_success') }}
            </div>
         @endif
         @if (session('active_status_success'))
            <div class="alert alert-primary">
               {{ session('active_status_success') }}
            </div>
         @endif
           <div class="card bg-info">
              <h2 class="text-center"  style="padding:20px;">All Pretices Inser View </h2>
           </div>
           <form action="{{ url('mark_delete/Pretices') }}" method="post">
           @csrf

        <table class="table table-table-bordered ">
          <thead>
            <tr class="text-center">
              <th>Mark</th>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Photo</th>
              <th>Read_Status</th>
              <th>Active_Status</th>
                <th>created_at</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
             @forelse ($Practicees as $key => $value)
                <tr class="<?php
if ($value->status=='1') {
   echo "bg-primary";
}
                ?>

                ">
                <td> <input type="checkbox"  name="mark_id[]" value="{{ $value->id }}"> </td>
                 <td>{{ $value->id }}</td>
                 <td>{{ $value->name }}</td>
                 <td>{{ $value->email }}</td>
                 <td>Not found</td>
                 <td>{{ $value->status }}</td>
                 <td>{{ $value->active_status }}</td>
                 <td>{{ $value->created_at }}</td>
                 <td>
                    @if ($value->status=='1')
                       <a href="{{ url('read/practice') }}/{{ $value->id }}" class="btn btn-info text-danger">Read</a>
                    @endif
                    @if ($value->status=='2')
                    <a href="{{ url('edit/practice') }}/{{ $value->id }}" type="button" class="btn btn-info">Edit</a>
                      @endif
@if ($value->status=='2')
   @if ($value->active_status=='1')
      <a href="{{ url('active_and_dective/practice/') }}/{{ $value->id }}" class="btn btn-success">Active</a>
   @endif
  @endif
@if ($value->status=='2')
@if ($value->active_status=='2')
<a href="{{ url('active_and_dective/practice') }}/{{ $value->id }}"  class="btn btn-danger">Dective</a>
@endif
@endif
@if ($value->status=='2')
<a href="{{ url('Soft_Delete/practice') }}/{{ $value->id }}" class="btn btn-warning">Soft_Delete</a>
  @endif




                 </td>

               </tr>
             @empty
                <tr>
                 <td colspan="80" class="text-danger text-center"> <h3>Nothing to Show</h3> </td>
               </tr>
             @endforelse

          </tbody>
        </table>

        <button type="submit" class="btn btn-danger">All Delete</button>
         </form>
      </div>
   </div>
   <div class="row">

      <div class="col-lg-4 ml-auto">

         <div class="card text-white bg-dark mb-3">
           <div class="card-body">
             <h3 class="bg-warning text-danger text-center" style="padding:5px;">Practice</h3>

@if (session('practice_status'))
   <div class="alert alert-danger">
     <h6>{{ session('practice_status') }}</h6>
  </div>
@endif

          <form method="post" action="{{ url('practice/post') }}">
           @csrf
          <div class="form-group">
             @error ('name')
                <div class="alert alert-danger">
                   {{ $message }}
                </div>
             @enderror
           <label>Please Enter your Name</label>
           <input type="text" class="form-control"   placeholder="Name" name="name" value="{{ old('name') }}">
          </div>
          @error ('email')
             <div class="alert alert-danger">
                {{ $message }}
             </div>
          @enderror
          <div class="form-group">
           <label>Please Enter your Email</label>
           <input type="text" class="form-control"   placeholder="Email" name="email">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          </form>

           </div>
         </div>
         </div>
   </div>

   <div class="row">
      <div class="col-lg-12">
         @if (session('Restore_success'))
            <div class="alert alert-success">
               {{ session('Restore_success') }}
            </div>
         @endif
         @if (session('hard_delete_danger'))
            <div class="alert alert-success">
               {{ session('hard_delete_success') }}
            </div>
         @endif
           <div class="card bg-warning">
              <h2 class="text-center"  style="padding:20px;">Just Soft Deleted View </h2>
           </div>
        <table class="table table-table-bordered ">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Photo</th>
              <th>Read_Status</th>
              <th>Active_Status</th>
               <th>created_at</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
             @forelse ($Soft_delete_Practicees as $key => $value)
                <tr class="bg-warning">
                 <td>{{ $value->id }}</td>
                 <td>{{ $value->name }}</td>
                 <td>{{ $value->email }}</td>
                  <td>Not found</td>
                 <td>{{ $value->status }}</td>
                 <td>{{ $value->active_status }}</td>
                 <td>{{ $value->created_at }}</td>
                 <td>
                    <a  href="{{ url('restore/practice') }}/{{ $value->id }}" type="button" class="btn btn-success">Restore</a>
                    <a  href="{{ url('hard_delete/practice') }}/{{ $value->id }}" type="button" class="btn btn-danger">Delete</a>
                 </td>

               </tr>
             @empty
                <tr>
                 <td colspan="80" class="text-danger text-center"> <h3>Nothing to Show</h3> </td>
               </tr>
             @endforelse

          </tbody>
        </table>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
           <div class="card bg-info">
              <h2 class="text-center"  style="padding:20px;">Active View </h2>
           </div>
        <table class="table table-table-bordered ">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Photo</th>
              <th>Read_Status</th>
              <th>Active_Status</th>
               <th>created_at</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
             @forelse ($AAactive_status as $key => $value)
              @if ($value->deleted_at=="")


                <tr class="bg-success">
                 <td>{{ $value->id }}</td>
                 <td>{{ $value->name }}</td>
                 <td>{{ $value->email }}</td>
                 <td>Not found</td>
                 <td>{{ $value->status }}</td>
                 <td>{{ $value->active_status }}</td>
                 <td>{{ $value->created_at }}</td>
                 <td>
                    @if ($value->active_status=='2')
                    <a href="{{ url('active_and_dective/practice') }}/{{ $value->id }}"  class="btn btn-danger">Dective</a>
                    @endif
                 </td>

               </tr>
                 @endif
             @empty
                <tr>
                 <td colspan="80" class="text-danger text-center"> <h3>Nothing to Show</h3> </td>
               </tr>
             @endforelse


          </tbody>
        </table>
      </div>
   </div>
</div>
@endsection
