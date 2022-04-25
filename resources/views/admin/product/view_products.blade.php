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





    
    <div class="row" >
        <div class="col-md-5">
            <label>Product Name</label>
            <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" placeholder="Enter Product Name" disabled>
        </div>
        <div class="col-md-5">
            <label>Product Code</label>
            <input type="text" class="form-control" name="product_code" value="{{$product->product_code}}" placeholder="Enter Product Code" disabled>
        </div>
    </div>
<br>
    <div class="row" >
        <div class="col-md-5">
            <label>Actual Price </label>
            <input type="text" class="form-control" name="actual_price" value="{{$product->actual_price}}" placeholder="Enter Actual Price" disabled>
        </div>
        <div class="col-md-5">
            <label>Price after Discount </label>
            <input type="text" class="form-control" name="discount_price" value="{{$product->discount_price}}" placeholder="Enter Price after Discount" disabled>
        </div>
    </div>

    <br>
    <div class="row" >
        <div class="col-md-3">
            <label>Category </label>
            <select class="form-control" name="category_id" id="category_name" disabled>
            @php 
                  $id= $product->category_id;
                  $category = DB::table('categories')->where('id',$id)->first();
            @endphp   
                <option class="form-control"  value="{{$category->id}}">{{$category->category_name}}</option>
          
            </select>
        </div>
        <div class="col-md-3">
            <label>Sub Category</label>

            <select class="form-control" name="subcategory_id" disabled>
                @php 
                  $id= $product->subcategory_id;
                  $subcategory = DB::table('subcategories')->where('id',$id)->first();
            @endphp   
                @if($subcategory)
                <option class="form-control"  value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                @else
                <option class="form-control" ></option>

                @endif
                
          
            </select>
        </div>

        <div class="col-md-3">
            <label>Brand</label>
            <select class="form-control" name="brand_id" disabled>
            @php
                    $id= $product->brand_id;
                    $brand = DB::table('brands')->where('id',$id)->first();
            @endphp
                
                @if($brand)
                <option class="form-control" value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @else
                <option class="form-control" > </option>
                @endif
            </select>
        </div>
    </div>
<br>
    <div class="row" >
        <div class="col-md-3">
            <label>Product Size </label><br>
            <input type="text" class="form-control" name="product_size" value="{{$product->product_size}}"  disabled>
        </div>
        <div class="col-md-3">
            <label>Product Color</label>
            <input type="text" class="form-control" name="product_color" value="{{$product->product_color}}"  disabled>
        </div>
        <div class="col-md-3">
            <label>Product Quantity</label>
            <input type="text" class="form-control"  name="product_quantity" value="{{$product->product_quantity}}" placeholder="Enter Product Selling Price" disabled>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-md-10">
            <label>Product Details</label>
            <textarea  class="form-control" name="product_details" rows="8" disabled>{{$product->product_details}}
            </textarea>
        </div>
    </div>

<br>
    <div class="row">
            <div class="col-md-3">
                <label>Image One</label>
                <img src="{{asset($product->image_one)}}"  height="60px" width="80px">
                
            </div>

            <div class="col-md-3">
                <label>Image Two</label>
                <img src="{{asset($product->image_two)}}"  height="60px" width="80px">
            </div>

            <div class="col-md-3">
                <label>Image Three</label>
                <img src="{{asset($product->image_three)}}"  height="60px" width="80px">
            </div>
    </div>
    <br>

           @if($product->feature)
           <input type="checkbox"  checked disabled>
            <label > Featured </label><br><br>
           @else
           <input type="checkbox"   disabled>
           <label>Not Featured</label>
           @endif
           <br><br>

    


    <br><br><br><br>
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