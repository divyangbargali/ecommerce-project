@extends('home.layouts.product_layout')

@section('show_product')

<style>
    h2,h3 {
        display:inline;
    }

    h3{
        font-weight:300px;
    }
</style>

<main class="main">
			
			<div class="container mb-3">
				<div class="row row-sparse">
					<div class="col-lg-9 main-content">
						
              @if($category_name)
              <h2> Category :</h2>  <h3>{{$category_name->category_name}}</h3>
              @endif
                <hr>

                @if(session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                @endif

						<div class="row">
                            @foreach($products as $p)
							<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="{{url('/show/product/'.$p->id)}}">
											<img src="{{asset($p->image_one)}}">
										</a>
										<div class="label-group">
                                @php 

                                      $price = $p->actual_price - $p->discount_price;
                                      $discount_percentage = ($price/$p->actual_price)*100;

                                @endphp
											<span class="product-label label-sale">{{floor($discount_percentage)}}% Discount</span>
										</div>
										<div class="btn-icon-group" style="display:inline-flex;">
										<a href="{{url('add/wishlist/'.$p->id)}}"><button class="btn-icon " ><i class="fa fa-heart" aria-hidden="true"></i></button></a>	
											

										</div>
									
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="category.html" class="product-category">{{$p->category_name}}</a>
                                              
											</div>
										</div>
										<h2 class="product-title">
											<a href="product.html">{{$p->product_name}}</a>
										</h2>
									
										<div class="price-box">
                                            @if($p->discount_price)
											<span class="old-price">{{$p->actual_price}}</span>
											<span class="product-price">{{$p->discount_price}}</span>

                                            @else
                                            <span class="product-price">{{$p->actual_price}}</span>
                                            @endif
										
                                        </div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
							</div>
							@endforeach

                            
						</div>
                       <div style="float:right;">{{ $products->links('pagination::bootstrap-4') }}</div> 

					
					</div><!-- End .main-content -->

					<div class="sidebar-overlay"></div>
					<div class="sidebar-toggle"><i class="fa fa-sliders-h"></i></div>
					<aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
						<div class="sidebar-wrapper">
							<div class="widget">
								<h3 class="widget-title">
									<a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
								</h3>

								<div class="collapse show" id="widget-body-2">
									<div class="widget-body">
										<ul class="cat-list">
                                    @php 
                                        $categories = DB::table('categories')->get();
                                    @endphp

                                    @foreach($categories as $c)
											<li><a href="{{url('/category/page/'.$c->id)}}">{{$c->category_name}}</a></li>
									@endforeach

										</ul>
									</div><!-- End .widget-body -->
								</div><!-- End .collapse -->
							</div><!-- End .widget -->

						</div><!-- End .sidebar-wrapper -->
					</aside><!-- End .col-lg-3 -->
				</div><!-- End .row -->
			</div><!-- End .container -->
		</main><!-- End .main -->








@endsection