@extends('home.layouts.product_layout')


@section('show_product')

		<main class="main">
			<nav aria-label="breadcrumb" class="breadcrumb-nav mb-md-4">
				<div class="container">
					<ul class="breadcrumb">
						<li ><a href="index.html">Home</a></li>
						<li><a href="#">Men</a></li>
						<li aria-current="page">Accessories</li>
					</ul>
				</div><!-- End .container -->
			</nav>

			<div class="page-header">
				<div class="container">
					<h1>Shopping Cart</h1>
				</div><!-- End .container -->
			</div><!-- End .page-header -->

          
           
			<div class="container">
				
		


            @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

			
				<div class="row row-sparse">
					<div class="col-lg-8 padding-right-lg">
						<div class="cart-table-container">
							<table class="table table-cart">
								<thead>
									<tr>
										<th class="product-col">Product</th>
                                        <th class="price-col">Color</th>
                                        <th class="price-col">Size</th>
										<th class="price-col">Price</th>
                                      
										<th class="qty-col">Qty</th>
										<th>Subtotal</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($cart as $row)
									<tr class="product-row">
										<td class="product-col">
											<figure class="product-image-container">
												<a href="product.html" class="product-image">
													<img src="{{asset($row->options->image)}}" alt="product">
												</a>
											</figure>
											<h2 class="product-title">
												<a href="product.html">{{$row->name}}</a>
											</h2>
										</td>
                                        <td>{{$row->options->color}}</td>
                                        <td>{{$row->options->size}}</td>
										<td>{{$row->price}}</td>
										
										<td >
                                            <form method="POST" action="{{url('/update/cart/quantity/')}}">
                                            @csrf
											<div class="product-single-qty"><br><br><br>

                                            <input type="hidden" name="id" value="{{$row->rowId}}">
											<input class="horizontal-quantity form-control" type="text" name="qty" value="{{$row->qty}}"><br>
                                            <input type="submit" name="submit" value="Update Qty" >

											</div><!-- End .product-single-qty -->
                                            </form>
										</td>
									
								
										<td>{{$row->qty*$row->price}}</td>
                                        <td><a href="{{url('/delete/cart/item/'.$row->rowId)}}" >Delete Item</a></td>
									</tr>
                                    
                                    @endforeach

									<tr class="product-action-row">
										<td colspan="4" class="clearfix">
											<div class="float-left">
												
											</div><!-- End .float-left -->
											
											<div class="float-right">
												
											</div><!-- End .float-right -->
										</td>
									</tr>

								
								</tbody>

								<tfoot>
									<tr>
										<td colspan="4" class="clearfix">
											<div class="float-left">
												
											</div><!-- End .float-left -->

											<div class="float-right">
												<a href="{{url('/remove/all/cartitem/')}}" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
												
											</div><!-- End .float-right -->
										</td>
									</tr>
								</tfoot>
							</table>
						</div><!-- End .cart-table-container -->

						@if(Session()->get('coupon_percentage'))

						@else
						<div class="cart-discount">
							<h4>Apply Discount Code</h4>
							<form action="{{url('/apply/discount/')}}">
							@csrf
								<div class="input-group">
									<input type="text" name="coupon_code" class="form-control form-control-sm" placeholder="Enter discount code"  required>
									<div class="input-group-append">
										<button class="btn btn-sm btn-primary" type="submit" name="submit">Apply Discount</button>
									</div>
								</div><!-- End .input-group -->
							</form>
						</div><!-- End .cart-discount -->
						@endif
					</div><!-- End .col-lg-8 -->

					<div class="col-lg-4">
						<div class="cart-summary">
							<h3>Summary</h3>

							<h4>
								<a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Estimate Shipping and Tax<i class="fa fa-angle-down" aria-hidden="true" style="margin-left:20px;"></i></a>
								
							</h4>
						
							<table class="table table-totals">

								<tbody>
								
									<tr>
										<td>Subtotal</td>
										<td>{{Cart::subtotal()}}</td>
									</tr>

									@if(session()->has('coupon_code'))
									<tr>
										<td>Coupon Code</td>
										<td>
										{{session()->get('coupon_code')}}
                                        </td>
									</tr>
									
									<tr>
									<td>
										<a href="{{url('/remove/coupon/code')}}" class="btn btn-danger btn-sm">Remove Coupon Code</a>
										</td>
									</tr>
									@endif
								</tbody>
								<tfoot>
									<tr>
										<td>Order Total</td>
										<td>{{Cart::subtotal()- (Cart::subtotal()*Session()->get('coupon_percentage'))/100}}</td>
									</tr>
								</tfoot>
							</table>

							<div class="checkout-methods">
								<a href="{{url('/checkout/')}}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
								
							</div><!-- End .checkout-methods -->
						</div><!-- End .cart-summary -->
					</div><!-- End .col-lg-4 -->
				</div><!-- End .row -->
               
			</div><!-- End .container -->
            
			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->

@endsection