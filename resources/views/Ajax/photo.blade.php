
@extends('layouts.deshbord_app')


@section('ajaxphoto')
active
@endsection
@section('deshbord_content')




   <div class="container">

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
                                 <th>title<th>
                                 <th>photo<th>
                                 <th>action<th>

                            </tr>
                        </thead>
                        <tbody>





                     @forelse ($AjaxImages as $AjaxImages_value)
                        <tr>
                           <td>{{ $AjaxImages_value->id }}<td>
                           <td>{{ $AjaxImages_value->title }}<td>

                              <td>
                          <img width="50" src="{{  asset('ajax/images')}}/{{ $AjaxImages_value->image }}" alt="">
                            <td>
                              <td>
                           <button class="deleteRecord" data-id="{{ $AjaxImages_value->id }}" >Delete Record</button>

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
       {{-- {{ $product_all->linkS() }} --}}
             </div>

          </div>
      </div>
      <div class="col-lg-4">
         <h1>Laravel 5 - Ajax Image Uploading Tutorial</h1>


         <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">


           <div class="alert alert-danger print-error-msg" style="display:none">
               <ul></ul>
           </div>


           <input type="hidden" name="_token" value="{{ csrf_token() }}">


           <div class="form-group">
             <label>Alt Title:</label>
             <input type="text" name="title" class="form-control" placeholder="Add Title">
           </div>


        <div class="form-group">
             <label>Image:</label>
             <input type="file" name="image" class="form-control">
           </div>


           <div class="form-group">
             <button class="btn btn-success upload-image" type="submit">Upload Image</button>
           </div>


         </form>

      </div>


   </div>
@endsection
@section('footer_script')

   <script >
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = {
    complete: function(response)
    {
    	if($.isEmptyObject(response.responseJSON.error)){
    		$("input[name='title']").val('');
    		alert('Image Upload Successfully.');
         reset();
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };


  function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
  }
</script>
<script>
$(document).ready(function(){
   alert('ok');
});
</script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax(
    {
        url: "users/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success:function(response){
           if(response.success){
               alert(response.message) //Message come from controller
           }else{
               alert("Error")
           }
        },
        error:function(error){
           console.log(error)
        }
    });

});
</script>
@endsection
