@extends('home.layouts.product_layout')


@section('show_product')

		<main class="main">
			
			<div class="container">
			
			@if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif


				<div class="row">

					<div class="col-lg-9 main-content">
						<div class="product-single-container product-single-default">

						<form method="post" action="{{url('/insert/cart/'.$product->id)}}">
							@csrf
							<div class="row">


							
								<div class="col-lg-7 col-md-6 product-single-gallery">
									<div class="product-slider-container">
										<div class="product-single-carousel owl-carousel owl-theme">
											<div class="product-item">
												<img class="product-single-image" src="{{asset($product->image_one)}}" data-zoom-image="{{asset($product->image_one)}}"/>
											</div>
											<div class="product-item">
												<img class="product-single-image" src="{{asset($product->image_two)}}" data-zoom-image="{{asset($product->image_two)}}"/>
											</div>
											<div class="product-item">
												<img class="product-single-image" src="{{asset($product->image_three)}}" data-zoom-image="{{asset($product->image_three)}}"/>
											</div>
											
										</div>
										<!-- End .product-single-carousel -->
										<span class="prod-full-screen">
											<i class="icon-plus"></i>
										</span>
									</div>
									<div class="prod-thumbnail owl-dots" id='carousel-custom-dots'>
										<div class="owl-dot">
											<img src="{{asset($product->image_one)}}" height="50px" width="50px"/>
										</div>
										<div class="owl-dot">
											<img src="{{asset($product->image_two)}}" height="50px" width="50px"/>
										</div>
										<div class="owl-dot">
											<img src="{{asset($product->image_three)}}" height="50px" width="50px"/>
										</div>
										
									</div>
								</div><!-- End .col-lg-7 -->

								<div class="col-lg-5 col-md-6 product-single-details">
									<h1 class="product-title">{{$product->product_name}}</h1>

									<div class="ratings-container">
										
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										

										
									</div><!-- End .ratings-container -->

									<hr class="short-divider">

									@if($product->discount_price)
									<div class="price-box">
										<span class="old-price">{{$product->actual_price}}</span>
										<span class="product-price">{{$product->discount_price}}</span>
									</div><!-- End .price-box -->

									@else
									<div class="price-box">
										<span class="product-price">{{$product->actual_price}}</span>
									</div><!-- End .price-box -->
									@endif
									<div class="product-desc">
										<p>{{str_limit($product->product_details,$limit=2)}}</p>
									</div><!-- End .product-desc -->

									<ul class="single-info-list">
										<li>AVAILABILITY: <strong>AVAILABLE</strong></li>
										<li>PRODUCT CODE: <strong>{{$product->product_code}}</strong></li>
									</ul>

									
									<div>
									<label>Color:</label>
										@php 
											$color = $product->product_color;
										
										@endphp
									<select class="form-control" name="product_color">
											
											<option class="form-control">{{$color}}</option>
												
									</select>

									<label>Size:</label>
									@php 
										$size = $product->product_size;
									
									@endphp
									<select class="form-control" name="product_size">
										
											<option class="form-control">{{$size}}</option>
											
									</select>

									<label>Product Quantity:</label>

									@if($product->product_quantity>=1)

									<select class="form-control" name="product_quantity">
										@for($i=1;$i<=$product->product_quantity;$i++)	
											<option class="form-control" value="{{$i}}">{{$i}}</option>
										@endfor
									</select>

									@else 
										<h3>Product is Out of Stock.</h3>
									@endif

									</div>

									<hr class="divider">

									@if($product->product_quantity>=1)

									<input type="submit" name="submit" class="btn btn-dark add-cart" value="Add To Cart">

									@endif

									<hr class="divider mb-1">

								
								</div><!-- End .product-single-details -->
	
							</div><!-- End .row -->
							</form>
						</div><!-- End .product-single-container -->

						<div class="product-single-tabs">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
								</li>
							
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
									<div class="product-desc-content">

										<p>{{$product->product_details}}</p>

									</div><!-- End .product-desc-content -->
								</div><!-- End .tab-pane -->


								

							</div><!-- End .tab-content -->
						</div><!-- End .product-single-tabs -->
					</div><!-- End .main-content -->
		
					<div class="sidebar-overlay"></div>
					<div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
					<aside class="sidebar-product col-lg-3 mobile-sidebar">
						<div class="sidebar-wrapper">
							<div class="widget widget-info">
								<ul>
									<li>
										<i class="fa fa-truck" aria-hidden="true"></i>
										<h4>FREE<br>SHIPPING</h4>
									</li>
									<li>
										<i class="fa fa-usd" aria-hidden="true"></i>
										<h4>100% MONEY<br>BACK GUARANTEE</h4>
									</li>
									<li>
										<i class="fa fa-user" aria-hidden="true"></i>
										<h4>ONLINE<br>SUPPORT 24/7</h4>
									</li>
								</ul>
							</div><!-- End .widget -->

							

							
						</div>
					</aside><!-- End .col-lg-3 -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="products-section">
				<div class="container">
					<h2>Related Products</h2>

				
					@php 
				$products = DB::table('products')->get();
				@endphp

							<div class="row py-4">
				@foreach($products as $pro)
					@if($pro->feature)
					<div class="col-6 col-sm-4 col-md-3 col-xl-2">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="{{url('/show/product/'.$pro->id)}}">
									<img src="{{asset($pro->image_one)}}" height="300px" width="300px">
								</a>
								<div class="label-group">

								@if($pro->discount_price)
								@php
										$actual    = $pro->actual_price;
										$discount  = $pro->discount_price;

										$discount_price = $actual-$discount;
										$discount_percentage = ($discount_price/$actual)*100;
								@endphp
									<span class="product-label label-sale">{{floor($discount_percentage)}}% Discount
									
								@endif
									</span>
								</div>
								<div class="btn-icon-group" style="display:inline-flex;">
										<a href="{{url('add/wishlist/'.$pro->id)}}"><button class="btn-icon " ><i class="fa fa-heart" aria-hidden="true"></i></button></a>	
											

										</div>
								
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										@php
											$id=$pro->category_id;
											$category = DB::table('categories')->where('id',$id)->first();
										@endphp

										<a href="" class="product-category" style="color:black;">{{$category->category_name}}</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">{{$pro->product_name}}</a>
								</h3>
							
								@if($pro->discount_price)
								<div class="price-box">
									<span class="old-price">{{$pro->actual_price}}</span>
									<span class="product-price">{{$pro->discount_price}}</span>
								</div><!-- End .price-box -->
								@else
								<div class="price-box">
									<span class="product-price">{{$pro->actual_price}}</span>
								</div><!-- End .price-box -->
								@endif
							</div><!-- End .product-details -->
						</div>
					</div>
					@endif
					@endforeach
				</div>
				</div><!-- End .container -->
			</div><!-- End .products-section -->
		</main><!-- End .main -->


		@endsection