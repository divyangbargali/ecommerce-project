@extends('admin.layouts.sidebar')


@section('admin')

<style>
    input[type=text]{
       width:90%;
       
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

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="float:right;">
        Add Category
  </button><br><br>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-striped" style="width:90%; margin:auto;">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="myTable">

      @foreach($category as  $key=>$cat)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$cat->category_name}}</td>
        <td><a href="{{url('edit/category/'.$cat->id)}}">Edit</a> | <a href="{{url('category/delete/'.$cat->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a></td>
      </tr>
     
      @endforeach
    </tbody>
   
 
  </table>
  
  <br>
<div style="float:right;"> {{ $category->links('pagination::bootstrap-4') }}</div>  
 

</div>




  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Insert Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{url('/insert/category')}}">
              @csrf
              <input type="text" name="category_name" class="form-control"><br><br>
              <input type="submit" name="submit" value="submit" class="form-control">

          </form>
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
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