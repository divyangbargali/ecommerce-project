@extends('home.layouts.menu_bar')

@section('main_body')
		<main class="main">
			<div class="home-slider owl-carousel owl-theme show-nav-hover nav-big">
				<div class="home-slide home-slide1 banner">
					<img class="slide-bg owl-lazy" src="{{asset('public/2021.jpg')}}" data-src="{{asset('public/2021.jpg')}}" >
					<div class="banner-layer banner-layer-middle">
						<br><br><br><br><br>

						@if(session('success'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding:30px;">
								<strong>{{session('success')}}</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
    					@endif
						<h3 class="text-uppercase mb-0">Get up to 30% off</h3>
						<h4 class="m-b-4">on Books</h4>

						<h5 class="text-uppercase">Starting at<span class="coupon-sale-text"><sup></sup>300<sup>rupees</sup></span></h5>
						
					</div><!-- End .banner-layer -->
				</div><!-- End .home-slide -->

				<div class="home-slide home-slide2 banner">
					<img class="slide-bg owl-lazy" src="{{asset('public/Book1.jpg')}}" data-src="{{asset('public/Book1.jpg')}}" alt="home banner">
					<div class="banner-layer banner-layer-middle">
						
					</div><!-- End .banner-layer -->
				</div><!-- End .home-slide -->
			</div><!-- End .home-slider -->

			<section class="container">
				<h2 class="section-title ls-n-10 text-center pt-2 m-b-4">Shop By Category</h2>

				<div class="owl-carousel owl-theme nav-image-center show-nav-hover nav-outer cats-slider">
					<div class="product-category">
						<a href="category.html">
							<figure>
								<img src="{{asset('public/assets/images/categories/category-1.jpg')}}">
							</figure>
							<div class="category-content">
								<h3>Sunglasses</h3>
								<span><mark class="count">8</mark> products</span>
							</div>
						</a>
					</div>
					<div class="product-category">
						<a href="category.html">
							<figure>
								<img src="{{asset('public/assets/images/categories/category-2.jpg')}}">
							</figure>
							<div class="category-content">
								<h3>Bags</h3>
								<span><mark class="count">4</mark> products</span>
							</div>
						</a>
					</div>
					<div class="product-category">
						<a href="category.html">
							<figure>
								<img src="{{asset('public/assets/images/categories/category-3.jpg')}}">
							</figure>
							<div class="category-content">
								<h3>Electronics</h3>
								<span><mark class="count">8</mark> products</span>
							</div>
						</a>
					</div>
					<div class="product-category">
						<a href="category.html">
							<figure>
								<img src="{{asset('public/assets/images/categories/category-4.jpg')}}">
							</figure>
							<div class="category-content">
								<h3>Fashion</h3>
								<span><mark class="count">11</mark> products</span>
							</div>
						</a>
					</div>
					<div class="product-category">
						<a href="category.html">
							<figure>
								<img src="{{asset('public/assets/images/categories/category-5.jpg')}}">
							</figure>
							<div class="category-content">
								<h3>Headphone</h3>
								<span><mark class="count">3</mark> products</span>
							</div>
						</a>
					</div>
					<div class="product-category">
						<a href="category.html">
							<figure>
								<img src="{{asset('public/assets/images/categories/category-6.jpg')}}">
							</figure>
							<div class="category-content">
								<h3>Shoes</h3>
								<span><mark class="count">4</mark> products</span>
							</div>
						</a>
					</div>
					<div class="product-category">
						<a href="category.html">
							<figure>
								<img src="{{asset('public/assets/images/categories/category-1.jpg')}}">
							</figure>
							<div class="category-content">
								<h3>Sunglasses</h3>
								<span><mark class="count">8</mark> products</span>
							</div>
						</a>
					</div>
				</div>
			</section>

			<section class="bg-gray banners-section text-center">
				<div class="container py-2">
					<div class="row">
						<div class="col-sm-6 col-lg-3">
							<div class="home-banner banner banner-sm-vw mb-2">
								<img src="{{asset('public/assets/images/banners/home-banner1.jpg')}}">
								<div class="banner-layer banner-layer-bottom text-left">
									<h3 class="m-b-2">Sunglasses Sale</h3>
									<h4 class="m-b-3">See all and find yours</h4>
									<a href="category.html" class="btn  btn-primary" role="button">Shop By Glasses</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="home-banner banner banner-sm-vw mb-2">
								<img src="{{asset('public/assets/images/banners/home-banner2.jpg')}}">
								<div class="banner-layer banner-layer-top ">
									<h3 class="mb-0">Cosmetics Trends</h3>
									<h4 class="m-b-4">Browse in all our categories</h4>
									<a href="category.html" class="btn  btn-primary" role="button">Shop By Cosmetics</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="home-banner banner banner-sm-vw mb-2">
								<img src="{{asset('public/assets/images/banners/home-banner3.jpg')}}">
								<div class="banner-layer banner-layer-middle">
									<h3 class="text-white m-b-1">Fashion Summer Sale</h3>
									<h4 class="text-white m-b-4">Browse in all our categories</h4>
									<a href="category.html" class="btn btn-light bg-white" role="button">Shop By Fashion</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="home-banner banner banner-sm-vw mb-2">
								<img src="{{asset('public/assets/images/banners/home-banner4.jpg')}}">
								<div class="banner-layer banner-layer-bottom banner-layer-boxed">
									<h3 class="m-b-2">UP TO 70% IN ALL BAGS</h3>
									<h4 class="mb-0">Starting at $99</h4>
									<a href="category.html" class="btn  btn-primary" role="button">Shop By Bags</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="container pb-3 mb-1">

			

				<h2 class="section-title ls-n-10 text-center pb-2 m-b-4">Featured Products</h2>

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
				
				<hr class="mt-3 mb-6">

				<div class="row feature-boxes-container pt-2">
					<div class="col-sm-6 col-lg-3">
						<div class="feature-box feature-box-simple text-center" >
							 <i class="fa fa-headphones sizefont" aria-hidden="true"></i>

							<div class="feature-box-content">
								<h3 class="text-uppercase">Customer Support</h3>
								<h5>Need Assistence?</h5>

								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
							</div><!-- End .feature-box-content -->
						</div><!-- End .feature-box -->
					</div><!-- End .col-lg-3 -->

					<div class="col-sm-6 col-lg-3">
						<div class="feature-box feature-box-simple text-center">
							<i class="fa fa-credit-card sizefont" aria-hidden="true"></i>



							<div class="feature-box-content">
								<h3 class="text-uppercase">Secured Payment</h3>
								<h5>Safe & Fast</h5>

								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
							</div><!-- End .feature-box-content -->
						</div><!-- End .feature-box -->
					</div><!-- End .col-lg-3 -->

					<div class="col-sm-6 col-lg-3">
						<div class="feature-box feature-box-simple text-center">
							<i class="fa fa-share sizefont" aria-hidden="true"></i>

							<div class="feature-box-content">
								<h3 class="text-uppercase">Free Returns</h3>
								<h5>Easy & Free</h5>

								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
							</div><!-- End .feature-box-content -->
						</div><!-- End .feature-box -->
					</div><!-- End .col-lg-3 -->

					<div class="col-sm-6 col-lg-3">
						<div class="feature-box feature-box-simple text-center">
							<i class="fa fa-truck sizefont" aria-hidden="true"></i>

							<div class="feature-box-content">
								<h3 class="text-uppercase">Free Shipping</h3>
								<h5>Orders Over $99</h5>

								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
							</div><!-- End .feature-box-content -->
						</div><!-- End .feature-box -->
					</div><!-- End .col-lg-3 -->
				</div><!-- End .row .feature-boxes-container-->
			</section>
		</main><!-- End .main -->

		

	@endsection