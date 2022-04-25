@extends('admin.layouts.sidebar')

<!-- <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/> -->

<link href="{{asset('public/bootstrap-tagsinput.css')}}">
@section('admin')
<style> 

    .container{
        width:1050px;
    }

    .marginleft{
        margin-left:260px;
    }

  
    @media only screen and (max-width: 600px) {
        .marginleft{
        margin-left:0%;
        width:480px;
    }
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<br><br><br><br>
<div class="container marginleft" >

@if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
                <li>{{$error}}</li>
        @endforeach
    </ul>
</div>


@endif





<form method="POST" action="{{url('/update/product/'.$product->id)}}" enctype='multipart/form-data'>

        @csrf

    <div class="row" >
        <div class="col-md-5">
            <label>Product Name</label>
            <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" placeholder="Enter Product Name" >
        </div>
        <div class="col-md-5">
            <label>Product Code</label>
            <input type="text" class="form-control" name="product_code" value="{{$product->product_code}}" placeholder="Enter Product Code" >
        </div>
    </div>
<br>
    <div class="row" >
        <div class="col-md-5">
            <label>Actual Price </label>
            <input type="text" class="form-control" name="actual_price" value="{{$product->actual_price}}" placeholder="Enter Actual Price" >
        </div>
        <div class="col-md-5">
            <label>Price after Discount </label>
            <input type="text" class="form-control" name="discount_price" value="{{$product->discount_price}}" placeholder="Enter Price after Discount" >
        </div>
    </div>

    <br>
    <div class="row" >
        <div class="col-md-3">
            <label>Category </label>
            <select class="form-control" name="category_id" id="category_name" >
            @php 
                  $id= $product->category_id;
                  $category = DB::table('categories')->get();
            @endphp   
            
            @foreach($category as $cat)
                <option class="form-control"  
                
                <?php 
                    if($product->category_id == $cat->id){
                        echo "selected";
                    }
                ?>
                value="{{$cat->id}}">{{$cat->category_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label>Sub Category</label>

            <select class="form-control" name="subcategory_id">

                @php 
                  $id= $product->subcategory_id;
                  $cat_id = $product->category_id;
                  $subcategory = DB::table('subcategories')->where('category_id',$cat_id)->get();
                @endphp   

                @if($subcategory)
                @foreach($subcategory as $sub)
                <option class="form-control"  

                <?php
                if($product->subcategory_id == $sub->id)
                    {
                        echo "selected";
                    }
                ?> value="{{$sub->id}}">{{$sub->subcategory_name}}
                </option>

                @endforeach 
                @endif
          
            </select>
        </div>

        <div class="col-md-3">
            <label>Brand</label>
            <select class="form-control" name="brand_id" >
            @php
                    $id= $product->brand_id;
                    $brand = DB::table('brands')->get();
            @endphp

                <option class="form-control" value=""> No brand</option>
              
                @foreach($brand as $b)
                <option class="form-control" 
                    <?php 
                        if($product->brand_id == $b->id){
                            echo "selected";
                        }
                    ?>
                value="{{$b->id}}">{{$b->brand_name}}</option>
                @endforeach
               
               
            </select>
        </div>
    </div>
<br>
    <div class="row" >
        <div class="col-md-3">
            <label>Product Size </label><br>
            <input type="text" class="form-control" name="product_size" value="{{$product->product_size}}" >
        </div>
        <div class="col-md-3">
            <label>Product Color</label>
            <input type="text" class="form-control" name="product_color" value="{{$product->product_color}}" >
        </div>
        <div class="col-md-3">
            <label>Product Quantity</label>
            <input type="text" class="form-control"  name="product_quantity" value="{{$product->product_quantity}}" placeholder="Enter Product Selling Price" >
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-md-10">
            <label>Product Details</label>
            <textarea  class="form-control" name="product_details" rows="8" >{{$product->product_details}}
            </textarea>
        </div>
    </div>

<br>
   
    <br>

           @if($product->feature)
           <input type="checkbox" name="feature"  checked >
            <label > Featured </label><br><br>
           @else
           <input type="checkbox"  name="feature"  >
           <label>Not Featured</label>
           @endif

           <br><br>
           <input type="submit" name="submit" value="update" class="btn btn-success">
</form>    

        <hr>
        <h2>Image Update</h2>

<form method="POST" action="{{url('/update/product/image/'.$product->id)}}" enctype='multipart/form-data'>

        @csrf

<div class="row">
            <div class="col-md-3">
                <label>Image One</label>
                <img src="{{asset($product->image_one)}}"  height="60px" width="80px">
                <br><br>
                <input type="file" name="image_one" class="form-control" onchange="readURL1(this);">
                <img src="#" id="one">
            </div>

            <div class="col-md-3">
                <label>Image Two</label>
                <img src="{{asset($product->image_two)}}"  height="60px" width="80px">
                <br><br>
                <input type="file" name="image_two" class="form-control" onchange="readURL2(this);">
                <img src="#" id="two">
            </div>

            <div class="col-md-3">
                <label>Image Three</label>
                <img src="{{asset($product->image_three)}}"  height="60px" width="80px">
                <br><br>
                <input type="file" name="image_three" class="form-control" onchange="readURL3(this);">
                <img src="#" id="three">
            </div>
    </div>
        <br><br>
    <input type="submit" name="submit" value="update" class="btn btn-success">
</form> 
</div>


<script>
$(document).ready(function(){
  $("#category_name").change(function(){
    var category_id = $("#category_name").val();
     if (category_id) {
               

             $.ajax({
               url: "{{ url('/get/subcategory/') }}/"+category_id,
               type:"GET",
               dataType:"json",
               success:function(data) { 
                console.log(data);
                var d =$('select[name="subcategory_id"]').empty();
                 data.forEach(function(info){
                     console.log(info.id,info.subcategory_name);
                     $('select[name="subcategory_id"]').append('<option value="'+ info.id + '">' + info.subcategory_name + '</option>');
                 })
               
               
               
                  
                // var d =$('select[name="subcategory_id"]').empty();
                // $.each(data, function(key, value){

                       
                // $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

                // });
                },
             });

           }else{
             alert('danger');
           }

            });
  });

</script>

<!-- <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script> -->

<script src="{{asset('public/bootstrap-tagsinput.js')}}"></script>

<script type="text/javascript">
    function readURL1(input){

        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#one').attr('src',e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
    function readURL2(input){

        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#two').attr('src',e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<script type="text/javascript">
    function readURL3(input){

        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#three').attr('src',e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection