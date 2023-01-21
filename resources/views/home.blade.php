
@extends('layouts.deshbord_app')


@section('home')
active
@endsection
@section('deshbord_content')

   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-10 m-auto">
          <h1>10% descaunt all Member</h1>
         <a href="{{ url('sent/all_manber_sms') }}" class="text-center btn btn-info" >send Que</a>

      </div>
   </div>
</div>


       <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-10 m-auto">
                   <div class="card">
                       <div class="card-header">{{ __('Dashboard') }}</div>

                       <div class="card-body">
                           @if (session('status'))
                               <div class="alert alert-success" role="alert">
                                   {{ session('status') }}
                               </div>
                           @endif

                           {{ __('You are logged in!') }}
                           @if (Auth::user()->role=='1')
                              <h1>Admin</h1>
                           @else
                              <h1>Customer</h1>
                           @endif

                           <h1 class="text-danger">{{ Auth::user()->name }}</h1>
                           <h1 class="text-primary">Register Member : {{ $totle_user }}</h1>

                       <table class="table table-border table-dark">
                           <thead>
                               <tr>
                                   <td>Sr No<td>
                                   <td>ID<td>
                                   <td>role<td>
                                   <td>Name<td>
                                   <td>Email<td>
                                   <td>created_At<td>
                                   <td>Updated_At<td>


                               </tr>
                           </thead>
                           <tbody>

                                 @php

                                    $start=1;
                                 @endphp
                                   @foreach($users as $value)
                                   <tr>
                                             {{-- <td>{{ $loop->index+1}}<td> --}}
                                             <td>{{ $users->firstItem()+$loop->index}}<td>

                                             <td>{{ $value->id}}<td>
                                             <td>{{ $value->role }}<td>
                                             <td>{{ Str::title($value->name) }}<td>
                                             <td>{{ $value->email }}<td>

                                             <td>
                                                 <li> {{ $value->created_at->format('h:i:s:A') }}</li>
                                                 <li> {{ $value->created_at->format('d/m/Y') }}</li>
                                                 <li> {{ $value->created_at->diffForHumans() }}</li>
                                             <td>

                                             {{-- <td>
                                                 <li> {{ $value->updated_at->timezone('Asia/Dhaka')->format('h:i:s:A') }}</li>
                                                 <li> {{ $value->updated_at->format('d/m/Y') }} </li>
                                                 <li> {{ $value->updated_at->diffForHumans() }}</li>
                                            <td> --}}




                                   </tr>
                                   @endforeach


                           </tbody>
                       </table>
                       {{ $users->links() }}
                       </div>
                   </div>
               </div>
           </div>
       </div>
       </div>

@endsection
