@extends('admin.layouts.sidebar')


@section('admin')

<style>
    input[type=text]{
       width:90%;
       
    }

    input[type=submit]{
       width:50%;
       
    }
    input{
      margin:auto;
    }

     .mrleft{
      margin-left:15%;
    } 

    @media only screen and (max-width: 600px) {
  .mrleft{
      margin-left:0.1%;
    } }
</style>


<div class="container text-center mrleft" >
    <br><br>
    <h1 class="text-center">Brand Edit</h1>


    
    @if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
                <li>{{$error}}</li>
        @endforeach
    </ul>
</div>


@endif


    @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

   
   <label>Brand Name</label>
 
  <br>
       

      <form method="POST" action="{{url('/brand/update/'.$brands->id)}}" enctype='multipart/form-data'>
      @csrf
            <input type="text" name="brand_name" value="{{$brands->brand_name}}" class="form-control"><br>
            <input type="file" name="brand_logo" class="form-control" style="width:90%;" onchange="readURL(this);"><br>

            <img src="#" id="one"> <br><br>

            <input type="hidden" name="old_logo" value="{{$brands->brand_logo}}">
            
            <label>Existing Brand Logo</label><br>
            <img src="{{asset($brands->brand_logo)}}" height="200px" width="250px"><br><br>

            <input type="submit" name="submit" value="update" class="form-control btn btn-success" >
      </form> 
</div>



<script type="text/javascript">
    function readURL(input){

        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#one').attr('src',e.target.result)
                .width(250)
                .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
  

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection