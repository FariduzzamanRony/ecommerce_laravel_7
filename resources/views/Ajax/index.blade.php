
@extends('layouts.deshbord_app')


@section('ajax')
active
@endsection
@section('deshbord_content')




<div class="container">
   <div class="row">
      <div class="col-lg-4 m-auto">


         <div class="card text-white bg-info mb-3">
           <div class="card-body">
             <h3 class="bg-white text-success text-center" style="padding:5px;">Ajax</h3>

             <form action="" class="btn-submit" method="POST">

                <div class="form-group">
                     <label>Title:</label>
                     <input type="text" name="title" class="form-control" placeholder="title">

                 </div>

                 <div class="form-group">
                     <label>Details:</label>
                     <input type="text" name="details" class="form-control" placeholder="details">
                 </div>


                 <div class="form-group">
                     <button class="btn btn-success">Submit</button>
                 </div>

             </form>

           </div>
         </div>
         </div>




   </div>
</div>
@endsection
@section('footer_script')
{{-- <script >
$(function(){
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':'{{ csrf_token() }}'
    }
});
   $('#ajax_submit').submit(function(e){
      e.preventDefault();
      var data=$(this).serialize();
      var url='{{ url('postinsert') }}'
      console.log(data)
      $.ajax({
           url:url,
           method:'POST',
           data:data,
           success:function(response){

          },
          error:function(error){
             console.log(error)
          }

      })




   });
});


</script> --}}
<script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var title = $("input[name=title]").val();
        var details = $("input[name=details]").val();
        var url = '{{ url('postinsert') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
                  Code:title,
                  Chief:details
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
<script>
$(document).ready(function(){
   alert('ok');
});
</script>
@endsection
