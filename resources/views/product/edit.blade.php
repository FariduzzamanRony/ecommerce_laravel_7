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



<div class="container ">
<div class="row mt-2">
  <div class="col-lg-4 m-auto">
     <div class="card">

        <br>

      <div class="card-body text-white">
         <div class="card bg-info text-center">
             <h3>Product Edit</h3>
         </div>

			<br>
			@if (session('edit_success'))
				<div class="alert alert-success">
			{{ session('edit_success') }}
				</div>
			@endif
<br>


 <form method="post" action="{{ route('product.update',$product_info->id) }}" enctype="multipart/form-data">
 @csrf
 @method('PATCH')



             <div class="form-control">
                <select class="form-control" name="sub_category_id">
                   <option value="">-Select One-</option>
                   @foreach ($category_info as $category_info_value)
                      <option {{ ($category_info_value->id==$product_info->sub_category_id) ? "selected" :"" }} value="{{ $category_info_value->id }}">{{$category_info_value->id}}/{{ $category_info_value->sub_category_name }}{{$product_info->sub_category_id}}</option>
                   @endforeach
                </select>
                </div>
             <div class="form-control">
               <label for="exampleInputPassword1" class="form-label text-dark">product Name</label>
                 <input type="text" name="product_name" value="{{ $product_info->product_name }}" class="form-control" id="exampleInputPassword1">
             </div>
             <div class="form-control">
                <label for="exampleInputPassword1" class="form-label text-dark">product Title</label>
            <input type="text" name="product_title" value="{{ $product_info->product_title }}" class="form-control" id="exampleInputPassword1">
             </div>

           <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product Description</label>
                 <textarea id="w3review" name="product_description" rows="4" cols="20">{{ $product_info->product_description }}</textarea>
           </div>
           <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product long description</label>
               <br>
             <textarea id="w3review" name="product_long_description" rows="4" cols="20">{{ $product_info->product_long_description }}</textarea>
          </div>
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product price</label>
           <input type="text" name="product_price" value="{{ $product_info->product_price }}" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product quantity</label>
           <input type="text" name="product_quantity" value="{{ $product_info->product_quantity }}" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">alert quantity</label>
           <input type="text" name="alert_quantity" value="{{ $product_info->alert_quantity }}" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-control">
             <label for="exampleInputPassword1" class="form-label text-dark">product photo</label>
           <input type="file" name="product_photo"  class="form-control" id="exampleInputPassword1">
          </div>


                <button type="submit" class="btn btn-primary">Submit</button>
           </form>
      </div>
  </div>
  </div>
</div>
</div>


@endsection
