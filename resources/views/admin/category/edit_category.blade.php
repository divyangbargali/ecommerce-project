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
    <h1 class="text-center">Category Table</h1>


    
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

   
   <label>Category Name</label>
 
  <br>
        @foreach($category as  $key=>$cat)

      <form method="POST" action="{{url('/category/update/'.$cat->id)}}">
      @csrf
            <input type="text" name="category_name" value="{{$cat->category_name}}" class="form-control"><br>
            <input type="submit" name="submit" value="submit" class="form-control btn btn-success" >
      </form>
     
     
      @endforeach
    
  
 

</div>




  

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