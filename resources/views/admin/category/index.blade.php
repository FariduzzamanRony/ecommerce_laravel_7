
@extends('layouts.deshbord_app')


@section('category')
active
@endsection
@section('deshbord_content')


<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-12 ml-auto">
         <div class="card">
             <div class="card-header text-center text-primary">
                 <h1>Insert view</h1>
                </div>
                      <div class="card-body">

                        @if (session('delete_status'))
                           <div class="alert alert-success">
                             <p>{{ session('delete_status') }}</p>
                           </div>
                        @endif
                       <table   class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                 <th>Sr No<th>
                                 <th>Id<th>
                                 <th>Name<th>
                                 <th>Title<th>
                                 <th>Descip<th>
                                 <th>photo<th>
                                 <th>User Id<th>
                                 <th>Rreated<th>
                                 <th>Action<th>

                            </tr>
                        </thead>
                        <tbody>
                                    @forelse ($categorys as $key => $value)
                                     <tr>
                                        {{-- <td>{{ $loop->index+1 }}<td> --}}
                                        <td>{{ $categorys->firstItem()+$loop->index }}<td>
                                        <td>{{ $value->id }}<td>
                                        <td>{{ $value->category_name }}<td>
                                        <td>{{ $value->category_title }}<td>
                                        <td>{{ $value->category_description }}<td>
                                        <td> <img src="{{ asset('uplodes/category_photo') }}/{{ $value->category_photo }}" alt="" class="img-fluid" width="50"><td>
                                        <td>{{ App\User::find($value->user_id)->name }}<td>
                                        <td>{{ $value->created_at }}<td>
                                        <td>
                                            <a href="{{ url('delete/category/') }}/{{ $value->id }}" type="button" class="btn btn-danger">Delete</a>
                                            <a href="{{ url('edit/category')}}/{{ $value->id }}" type="button" class="btn btn-primary">Edit</a>
                                        <td>

                                     </tr>
                                     @empty
                                        <tr>
                                              <td colspan="50" class="text-center text-danger"><h4>No Data Availavel</h4></td>
                                        </tr>
                                  @endforelse


                        </tbody>
                       </table>
                       {{ $categorys->linkS() }}
             </div>
          </div>
      </div>
   </div>

<div class="container ">


<div class="row mt-2">
  <div class="col-lg-4 m-auto">
     <div class="card">
      <div class="card-body text-white">
          <h3 class="bg-info">Add Category</h3>

{{-- @php
print_r($errors->all());
@endphp --}}

{{-- @if ($errors->all())
 @foreach ($errors->all() as $value)
     <div class="alert alert-danger">
        <li>{{ $value }}</li>
     </div>
 @endforeach
@endif --}}
@if (session('success_status'))
<div class="alert alert-success">
<p>{{ session('success_status') }}</p>
</div>
@endif
          <form method="post" action="{{ url('category/post') }}" enctype="multipart/form-data">
             @csrf
             <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label text-dark" >Category photo</label>

                 <input  type="file" name="category_photo"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);">
                            <img class="hidden" id="tenant_photo_viewer" scr="#" alt="your image"/>
                						<style media="screen">
                							.hidden{
                									display:none;
                							}

                						</style>
                						<script>
                						function readURL(input) {
                						if(input.files && input.files[0]) {
                						var reader = new FileReader();
                						reader.onload = function (e) {
                						$('#tenant_photo_viewer').attr('src',e.target.result).width(150).hight(195);
                						};
                						$('#tenant_photo_viewer').removeClass('hidden');
                						reader.readAsDataURL(input.files[0]);

                						}
                						}

                						</script>

                    </div>
             <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label text-dark" >Category Name</label>
               @error ('category_name')
                        <div class="alert alert-danger">
                             <div class="tt">
                                <li>{{ $message }}</li>
                             </div>
                        </div>
               @enderror
                 <input type="text" name="category_name" value="{{ old('category_name') }}" class="form-control" id="exampleInputPassword1">
                    </div>
             <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-dark">Category Title</label>
                @error ('category_title')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                @enderror
                   <input type="text" name="category_title" value="{{ old('category_title') }}" class="form-control" id="exampleInputPassword1">
                      </div>

           <div class="mb-3">
             <label for="exampleInputPassword1" class="form-label text-dark">Category Description</label>

             @error ('category_description')
                       <div class="alert alert-danger">
                           {{ $message }}
                       </div>
             @enderror
                 <textarea id="w3review" name="category_description" rows="4" cols="20">{{ old('category_description') }}</textarea>


                    </div>

                <button type="submit" class="btn btn-primary">Submit</button>
           </form>
      </div>
  </div>
  </div>

</div>
</div>








</div>




<div class="container">
   <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header text-center text-warning"><h1>Soft Delete</h1></div>

              <div class="card-body">
                 @if (session('restore_sataus'))
                    <div class="alert alert-success">
                       {{ session('restore_sataus') }}
                    </div>
                 @endif
                 @if (session('forcedelete'))
                    <div class="alert alert-success">
                       {{ session('forcedelete') }}
                    </div>
                 @endif
              <table class="table table-border table-dark">
                 <thead>
                     <tr>
                          <th>Sr No<th>
                          <th>Id<th>
                          <th>Name<th>
                          <th>Title<th>
                          <th>Descip<th>
                          <th>User Id<th>
                          <th>deleted_at<th>
                          {{-- <td>Reated<td>
                          <td>update_at<td> --}}
                          <th>Action<th>

                     </tr>
                 </thead>
                 <tbody>
                    @forelse ($delete as $key => $value)
                       <tr>
                          <td>{{ $value->id }}<td>
                          <td>{{ $value->id }}<td>
                          <td>{{ $value->category_name }}<td>
                          <td>{{ $value->category_title }}<td>
                          <td>{{ $value->category_description }}<td>
                          <td>{{ App\User::find($value->user_id)->name }}<td>
                          <td>{{ $value->deleted_at }}<td>
                          {{-- <td>{{ $value->created_at }}<td>
                          <td>{{ $value->updated_at }}<td> --}}
                             <td>
                                <a href="{{ url('restore/category')}}/{{ $value->id }}" type="button" class="btn btn-success" name="button">Restoe</a>
                              <td>
                             <td>
                                <a href="{{ url('forcedelete/category')}}/{{ $value->id }}" type="button" class="btn btn-danger" name="button">hard delete</a>
                              <td>
                       </tr>
                    @empty
                       <tr>
                             <td colspan="50" class="text-center text-danger"><h4>No Data Availavel</h4></td>
                       </tr>
                 @endforelse

                 </tbody>
              </table>

              </div>
          </div>
      </div>
   </div>
</div>
</div>

@endsection
