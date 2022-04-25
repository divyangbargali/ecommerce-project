@extends('admin.layouts.sidebar')
<style>



.table,input[type=text],.alert{
    margin-left:120px;
}

@media only screen and (max-width: 600px) {
    .table,input[type=text],.alert{
        margin-left:0%;
        width:480px;

    }
    .container{
        width:480px;
    }
    }

</style>

@section('admin')
<br><br>



<div class="container" style="width:1050px">

@if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
 <br><br>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>PRODUCT CODE</th>
        <th>PRODUCT NAME</th>
        <th>IMAGE</th>
        <th>CATEGORY</th>
        <th>BRAND</th>
        <th>QUANTITY</th>
        <th>FEATURED</th>
        <th>ACTION</th>
      </tr>

    </thead>
    <tbody id="myTable">
    @foreach($products as $pro)
      <tr>
        <td>{{$pro->product_code}}</td>
        <td>{{$pro->product_name}}</td>
        <td><img src="{{asset($pro->image_one)}}" height="50px" width="80px"></td>

        @php
            $id = $pro->category_id;
            $category = DB::table('categories')->where('id',$id)->first();
        @endphp

        <td>{{$category->category_name}}</td>

        @php 
            $id=$pro->brand_id;
            $brands = DB::table('brands')->where('id',$id)->first();
        @endphp

        @if($brands)
        <td>{{$brands->brand_name}}</td>
        @else
        <td>No Brand </td>
        @endif

        <td>{{$pro->product_quantity}}</td>

        @if($pro->feature)
        <td>Featured</td>
        @else
        <td>Not Featured</td>
        @endif

        <td><a href="{{url('/view/product/'.$pro->id)}}">View</a> | <a href="{{url('/edit/product/'.$pro->id)}}">Edit</a> | <a href="{{url('/delete/product/'.$pro->id)}}">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  <div style="float:right;"> {{ $products->links('pagination::bootstrap-4') }}</div>
 
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