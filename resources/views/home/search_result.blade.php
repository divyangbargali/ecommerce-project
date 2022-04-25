@extends('home.layouts.menu_bar')

@section('main_body')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    h1{
        text-align:center;
        font-weight:700;
    }
</style>

<br><br><br><br><br><br><br><br><br>
<hr>



<div class="container">

<h1>Search Products</h1>

@foreach($products as $products)
<div class="col-6 col-sm-4 col-md-3 col-xl-2">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="{{url('/show/product/'.$products->id)}}">
									<img src="{{asset($products->image_one)}}" height="300px" width="300px">
								</a>
								<div class="label-group">

								@if($products->discount_price)
								@php
										$actual    = $products->actual_price;
										$discount  = $products->discount_price;

										$discount_price = $actual-$discount;
										$discount_percentage = ($discount_price/$actual)*100;
								@endphp
									<span class="product-label label-sale">{{floor($discount_percentage)}}% Discount
									
								@endif
									</span>
								</div>
								<div class="btn-icon-group" style="display:inline-flex;">
										<a href="{{url('/add/wishlist/'.$products->id)}}"><button class="btn-icon " ><i class="fa fa-heart" aria-hidden="true"></i></button></a>	
											

										</div>
								
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										@php
											$id=$products->category_id;
											$category = DB::table('categories')->where('id',$id)->first();
										@endphp

										<a href="" class="product-category" style="color:black;">{{$category->category_name}}</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">{{$products->product_name}}</a>
								</h3>
							
								@if($products->discount_price)
								<div class="price-box">
									<span class="old-price">{{$products->actual_price}}</span>
									<span class="product-price">{{$products->discount_price}}</span>
								</div><!-- End .price-box -->
								@else
								<div class="price-box">
									<span class="product-price">{{$products->actual_price}}</span>
								</div><!-- End .price-box -->
								@endif
							</div><!-- End .product-details -->
						</div>
					</div>

@endforeach

</div>



@endsection