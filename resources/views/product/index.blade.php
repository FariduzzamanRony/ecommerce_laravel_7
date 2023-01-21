<style>
.pagination .page-item .page-link {
	color: #495057;
	padding: 11px 0;
	width: 158px;
	height: 40px;
	text-align: center;
	border-radius: 0;
}
</style>


@extends('layouts.deshbord_app')

@section('proudct')
active
@endsection


@section('deshbord_content')


<div class="container">
   <div class="row">

      <div class="col-lg-12">
         <div class="card">
             <div class="card-header text-center text-primary">
                 <h1>Product Insert view</h1>

                </div>
                      <div class="card-body">

                        <div style="overflow-x:auto;">


                       <table   class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>

                                 <th>Id<th>
                                 <th> category_name<th>
                                 <th>category_id<th>
                                 <th>product Name<th>
                                 <th>Title<th>
                                 <th>price<th>
                                 <th>quantity<th>
                                 <th>alert<th>
                                 <th>photo<th>
                                 <th>action<th>

                            </tr>
                        </thead>
                        <tbody>



                        @php
                           $start=1;
                        @endphp

                     @forelse ($product_all as $product_all_value)
                        <tr>
                           <td>{{ $product_all_value->id }}<td>

         {{-- <td>{{App\Category::find($product_all_value->category_id)->id}}={{App\Category::find($product_all_value->category_id)->category_name}}<td> --}}


									<td>{{$product_all_value->relationship_with_category_table->sub_category_name }}<td>

									<td>{{ $product_all_value->id }}<td>
									<td>{{ $product_all_value->product_name }}<td>
                          <td>{{ $product_all_value->product_title }}<td>
                          <td>{{ $product_all_value->product_price }}<td>
                           <td>{{ $product_all_value->product_quantity }}<td>
                           <td>{{ $product_all_value->alert_quantity }}<td>
                           <td>  <img width="50" src="{{  asset('frontend_asset/product_photo')  }}/{{ $product_all_value->product_thumbnail_photo }}" alt="">    <td>
										<td>
  									 <a href="{{ route('product.edit',$product_all_value->id) }}" type="button" class="btn btn-primary">Edit</a>

									 <form method="post" action="{{ route('product.destroy',$product_all_value->id) }}">
										 @csrf
										 @method('DELETE')
										 <button type="submit" class="btn btn-danger" name="button">hard_delete</button>

                            </form>


									 <td>

								</tr>
                     @empty
                        <tr>
                           <td colspan="80" class="text-center text-danger">Nothing to Show<td>
                        </tr>
                     @endforelse



                        </tbody>
                       </table>


   </div>
	    {{ $product_all->linkS() }}
             </div>

          </div>
      </div>
   </div>
   </div>
   </div>

<div class="container ">


<div class="row mt-2">
  <div class="col-lg-4 ml-auto">
     <div class="card">
      <div class="card-body text-white">
         <div class="card bg-info text-center">
             <h3>Product</h3>
         </div>
			<br>
			@if (session('product_success'))
				<div class="alert alert-success">
			{{ session('product_success') }}
				</div>
			@endif
<br>


          <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
 @csrf
             <div class="form-control">
                <select class="form-control" name="sub_category_id">
                   <option value="">-Select One-</option>
                   @foreach ($active_Sub_categorys as $active_Sub_categorys_value)
                         <option value="{{ $active_Sub_categorys_value->id }}">{{ $active_Sub_categorys_value->sub_category_name }}</option>
                   @endforeach
                </select>
                </div>
             <div class="form-control">
               <label for="exampleInputPassword1" class="form-label text-dark">product Name</label>
                 <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control" id="exampleInputPassword1">
             </div>
             <div class="form-control">
                <label for="exampleInputPassword1" class="form-label text-dark">product Title</label>
            <input type="text" name="product_title" value="{{ old('product_title') }}" class="form-control" id="exampleInputPassword1">
             </div>

           <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product Description</label>
                 <textarea id="w3review" name="product_description" rows="4" cols="20">{{ old('product_description') }}</textarea>
           </div>
           <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product long description</label>
               <br>
             <textarea id="w3review" name="product_long_description" rows="4" cols="20">{{ old('product_long_description') }}</textarea>
          </div>
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product price</label>
           <input type="text" name="product_price" value="{{ old('product_price') }}" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product quantity</label>
           <input type="text" name="product_quantity" value="{{ old('product_quantity') }}" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">alert quantity</label>
           <input type="text" name="alert_quantity" value="{{ old('alert_quantity') }}" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product single photo</label>

					 <input  type="file" name="product_thumbnail_photo"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);">
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
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product multifull photo</label>
           <input type="file" name="product_multifull_photo[]"  class="form-control" id="exampleInputPassword1" multiple>
          </div>


                <button type="submit" class="btn btn-primary">Submit</button>
           </form>
      </div>
  </div>
  </div>
</div>
</div>


@endsection
