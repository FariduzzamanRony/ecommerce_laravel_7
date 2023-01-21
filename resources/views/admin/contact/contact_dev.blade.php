@extends('layouts.app')
@section('content')

<div class="container">
   <div class="row">
     <div class="col-lg-12"><div class="card ">
        <div class="card-header bg-success text-warning text-center">
        <h2>Contact  view</h2>
      </div>

        <table class="table table-dark">
          <thead>
             <tr>
                 <td>ID<td>
                 <td>Name<td>
                 <td>Email<td>
                 <td>subject<td>
                 <td>Messages<td>
                 <td>Download<td>


             </tr>
          </thead>
          <tbody>

             @forelse ($contact_devs as $key => $value)
                <tr>

                  <td>{{ $value->id }}<td>
                  <td>{{ $value->contact_name }}<td>
                  <td>{{ $value->contact_email }}<td>
                  <td>{{ $value->contact_subject }}<td>
                  <td>{{ $value->contact_messages }}<td>
                  <td>
                     @if ($value->contact_file)
                        <a href="{{ url('contact/file/download') }}/{{ $value->id }}"> <i class="bi bi-download"></i></a> |
                        <a href="{{ asset('storage') }}/{{ $value->contact_file}}"> <i class="bi bi-binoculars-fill"></i></a>
                     @endif

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
