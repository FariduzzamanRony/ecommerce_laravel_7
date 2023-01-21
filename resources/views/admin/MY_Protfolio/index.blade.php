@extends('layouts.app')
@section('content')
<div class="container">
   <h3><a href="https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_display_checkbox_text">javascrept code</a></h3>
   <div class="row">

      <div class="col-lg-12">
         <div class="card ">

            <div class="card-header bg-success text-warning text-center">
            <h2>protfilio view</h2>
          </div>
          <div class="dd">
             @if (session('delete_protfolio'))
                <div class="alert alert-warning">
                     {{ session('delete_protfolio') }}
                </div>
             @endif
<form  action="{{ url('mark/delete') }}" method="post">
   @csrf
   <table class="table">
<thead>
<tr>
<td>Mark<td>
<td>ID<td>
<td>my_name<td>
<td>father_name<td>
<td>mother_name<td>
<td>Created_At<td>
<td>status<td>
<td>Action<td>
</tr>
</thead>
<tbody>
@forelse ($my_protfolio as $key => $value)
<tr>
   <td> <input type="checkbox" name="mark_id[]" value="{{ $value->id }}" id="myCheck" onclick="myFunction()"> <td>
  <td>{{ $value->id }}<td>
  <td>{{ $value->my_name }}<td>
  <td>{{ $value->father_name }}<td>
  <td>{{ $value->mother_name }}<td>
  {{-- <td>

   <li>{{ $value->created_at->timezone('Asia/Dhaka')->format('h:i:s:A') }}</li>
   <li> {{ $value->created_at->format('d/m/Y') }} </li>
   <li> {{ $value->created_at->diffForHumans() }}</li>

   <td> --}}
  <td>{{ $value->status }}<td>



<td>


   <?php
if($value->status=='1'){ ?>

    <a href="{{ url('potfolio/dective') }}/{{ $value->id }}"class="btn btn-primary">Active</a>
<?php } else { ?>

   <a href="{{ url('potfolio/dective') }}/{{ $value->id }}"class="btn btn-danger">Dective</a>
<?php }  ?>


</td>
</tr>
@empty
<tr>
  <td colspan="80" class="text-danger text-center"><h3>Nothing To Show</h3> <td>
</tr>
@endforelse
</tbody>
</table>
<button id="text" style="display:none" type="submit" class="btn btn-warning" style="margin:10px;">All Delete</button>
</form>


</div>
         </div>
      </div>
      <div class="col-lg-12">
         <div class="card ">

            <div class="card-header bg-success text-warning text-center">
            <h2>protfilio view</h2>
          </div>
          <div class="dd">
             @if (session('delete_protfolio'))
                <div class="alert alert-warning">
                     {{ session('delete_protfolio') }}
                </div>
             @endif
<form  action="{{ url('mark/delete') }}" method="post">
   @csrf
   <table class="table">
<thead>
<tr>
<td>Mark<td>
<td>ID<td>
<td>my_name<td>
<td>father_name<td>
<td>mother_name<td>
<td>Created_At<td>
<td>status<td>
<td>Action<td>
</tr>
</thead>
<tbody>
@forelse ($my_protfolios_2 as $key => $value)
<tr>
   <td> <input type="checkbox" name="mark_id[]" value="{{ $value->id }}" id="myCheck" onclick="myFunction()"> <td>
  <td>{{ $value->id }}<td>
  <td>{{ $value->my_name }}<td>
  <td>{{ $value->father_name }}<td>
  <td>{{ $value->mother_name }}<td>
  {{-- <td>

   <li>{{ $value->created_at->timezone('Asia/Dhaka')->format('h:i:s:A') }}</li>
   <li> {{ $value->created_at->format('d/m/Y') }} </li>
   <li> {{ $value->created_at->diffForHumans() }}</li>

   <td> --}}
  <td>{{ $value->status }}<td>



<td>


   <?php
if($value->status=='1'){ ?>

    <a href="{{ url('potfolio/dective') }}/{{ $value->id }}"class="btn btn-primary">Active</a>
<?php } else { ?>

   <a href="{{ url('potfolio/dective') }}/{{ $value->id }}"class="btn btn-danger">Dective</a>
<?php }  ?>


</td>
</tr>
@empty
<tr>
  <td colspan="80" class="text-danger text-center"><h3>Nothing To Show</h3> <td>
</tr>
@endforelse
</tbody>
</table>
<button id="text" style="display:none" type="submit" class="btn btn-warning" style="margin:10px;">All Delete</button>
</form>


</div>
         </div>
      </div>





<div class="col-lg-4 m-auto py-5">
      <div class="card-header bg-success text-warning text-center">
      <h2>protfilio</h2>
    </div>
    @if (session('success_protfolio'))
       <div class="alert alert-success">
          {{ session('success_protfolio') }}
       </div>
    @endif
<form method="post" action="{{ url('my/protfilio/post') }}">
   @csrf
  <div class="form-group">
    <label>Please Enter your Name</label>
    <input type="text" class="form-control"   placeholder="You Name" name="my_name" value="{{ old('my_name')}}">
  </div>
  <div class="form-group">
    <label>Please Enter your Father Name</label>
    <input type="text" class="form-control"   placeholder="Father Name" name="father_name" value="{{ old('father_name')}}">
  </div>
  <div class="form-group">
    <label>Please Enter your Mother Name</label>
    <input type="text" class="form-control"   placeholder="Mother Name" name="mother_name" value="{{ old('mother_name')}}">
  </div>
  <button type="submit" class="btn bg-success text-warning text-center">Submit</button>
</form>
      </div>
   </div>
</div>
</div>

@endsection
<script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
