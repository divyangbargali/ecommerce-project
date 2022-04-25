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

   
  
 
  <br>
@php 
       $category = DB::table('categories')->get();

@endphp

      <form method="POST" action="{{url('/subcategory/update/'.$subcategory->id)}}">
      @csrf
            <label>Subcategory Name</label>
            <input type="text" name="subcategory_name" value="{{$subcategory->subcategory_name}}" class="form-control"><br>

            <label>Category Name</label>
            <select class="form-control" style="width:90%; margin:auto;" name="category_id">
            @foreach($category as $cat)
                    <option class="form-control" style="width:70%;"
                    <?php 
                        if($subcategory->category_id == $cat->id){
                            echo "selected";
                        }
                    ?> value="{{$cat->id}}">{{$cat->category_name}}</option>
            @endforeach
            </select><br><br>
            <input type="submit" name="submit" value="update" class="form-control btn btn-success" >
      </form>
     
     
     
    
  
 

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