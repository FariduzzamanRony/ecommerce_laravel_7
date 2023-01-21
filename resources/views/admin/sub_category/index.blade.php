
@extends('layouts.deshbord_app')


@section('sub_category')
active
@endsection
@section('deshbord_content')
  <div class="container ">


  <div class="row mt-2">
    <div class="col-lg-4 m-auto">
       <div class="card">
        <div class="card-body text-white">
            <h3 class="bg-info">Add Sub Category</h3>

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
  @if (session('success_full'))
  <div class="alert alert-success">
  <p>{{ session('success_full') }}</p>
  </div>
  @endif

            <form method="post" action="{{ url('sub_category/post') }}" enctype="multipart/form-data">
               @csrf

               <div class="mb-3">

                 <label for="exampleInputPassword1" class="form-label text-dark" >category name</label>
                 <select class="form-control" name="category_id">
                    <option value="">-Select One-</option>
                    @foreach ($category_actives as $category_value)
                          <option class="text-center" value="{{ $category_value->id }}">{{ $category_value->category_name }}</option>
                    @endforeach
                 </select>
                </div>
               <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label text-dark" >Sub category name</label>
                   <input type="text" name="sub_category_name" value="{{ old('sub_category_name') }}" class="form-control" id="exampleInputPassword1">
                      </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label text-dark" >Sub Category photo</label>

                            <input  type="file" name="sub_category_photo"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);">
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



                  <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </div>
    </div>
    </div>

  </div>
  </div>


<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-12">
         <div class="card">
             <div class="card-header text-center text-primary">
                 <h1>Insert view</h1>
                </div>
                      <div class="card-body">
            <table class="table table-dark">
     <thead>
       <tr>
         <th >Serial No</th>
         <th >id</th>
         <th >Category_id</th>
         <th >sub_category_name</th>
         <th >photo</th>
         <th >created_at</th>
       </tr>
     </thead>
     <tbody>
        @forelse ($sub_categorys as  $sub_categorys_value)
           <tr>
             <td>{{ $sub_categorys->firstItem()+$loop->index }}</td>
             <td>{{ $sub_categorys_value->id }}</td>

             <td>{{ App\Category::find($sub_categorys_value->category_id)->category_name }}</td>
             <td>{{ $sub_categorys_value->sub_category_name }}</td>
             <td> <img src="{{ asset('uplodes/sub_category_photo') }}/{{ $sub_categorys_value->sub_category_photo }}" alt="" width="50"> </td>

             <td>{{ $sub_categorys_value->created_at }}</td>



           </tr>
        @empty
           <tr>
             <td colspan="50" class="text-center text-danger"> <h4>Nothing to show</h4> </td>

          </tr>
        @endforelse



     </tbody>
   </table>
   {{ $sub_categorys->linkS() }}
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
                    <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                    </tr>

                 </tbody>
              </table>

              </div>
          </div>
      </div>
   </div>
</div>
</div>

@endsection
