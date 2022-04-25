@extends('home.layouts.menu_bar')

@section('main_body')




<div class="page-header">
				<div class="container">
					<h1>Checkout</h1>
				</div><!-- End .container -->
			</div><!-- End .page-header -->

			<div class="container">
				<ul class="checkout-progress-bar">
					<li class="active">
						<span>Shipping</span>
					</li>
					<li>
						<span>Payments</span>
					</li>
				</ul>
				<div class="row row-sparse">
					<div class="col-lg-8 padding-right-lg">
						<ul class="checkout-steps">
							<li>
								<h2 class="step-title">Shipping Address</h2>


								<form action="{{url('/submit')}}" method="POST">
								@csrf
									<div class="form-group required-field">
										<label>First Name </label>
										<input type="text" class="form-control" name="ship_name" required>
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label>Email </label>
										<input type="email" class="form-control" name="ship_email" required>
									</div><!-- End .form-group -->


									<div class="form-group required-field">
										<label>Shipping Address </label>
										<input type="text" class="form-control" name="ship_address" required>
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label>City  </label>
										<input type="text" class="form-control" name="ship_city" required>
									</div><!-- End .form-group -->

									<!-- <div class="form-group">
										<label>State/Province</label> -->
										<!-- <div class="select-custom">
											<select class="form-control">
												<option value="CA">California</option>
												<option value="TX">Texas</option>
											</select>
										</div>    End .select-custom -->
									<!-- </div>         End .form-group -->

									<!-- <div class="form-group required-field">
										<label>Zip/Postal Code </label>
										<input type="text" class="form-control" required>
									</div>End .form-group -->

									<!-- <div class="form-group">
										<label>Country</label>
										<div class="select-custom">
											<select class="form-control">
												<option value="USA">United States</option>
												<option value="Turkey">Turkey</option>
												<option value="China">China</option>
												<option value="Germany">Germany</option>
											</select>
										</div>End .select-custom -->
									<!-- </div>End .form-group -->

									<div class="form-group required-field">
										<label>Phone Number </label>
										<div class="form-control-tooltip">
											<input type="tel" class="form-control" name="ship_phone" required>
											<span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
										</div><!-- End .form-control-tooltip -->
									</div><!-- End .form-group -->

									<table class="table table-step-shipping">
										<tbody>
											<tr>
												<td>
											@php
												$paying_amount1 = Cart::subtotal() - (Cart::subtotal()*Session()->get('coupon_percentage'))/100;

												$shipping = DB::table('shipping_price')->first();

												$shipping_price = $shipping->shipping_price;

												$paying_amount2 = $paying_amount1 + $shipping_price;

											@endphp

											<b style="background-color:black; color:white; padding:10px;">{{$paying_amount2}} Rupees</b>

												</td>
												
												<td>Pay Online</td>
											
											</tr>

											<!-- <tr>
												<td><input type="radio" name="shipping-method" value="cash_on_delivery"></td>
												<td><strong>{{Cart::subtotal()- (Cart::subtotal()*Session()->get('coupon_percentage'))/100}} Rupee</strong></td>
												<td>Cash On Delivery</td>
											
											</tr> -->
										</tbody>
									</table>

									<input type="submit" name="submit" value="submit" class="btn btn-primary float-right">
								</form>
							</li>

							
						</ul>
					</div><!-- End .col-lg-8 -->


		
				</div><!-- End .row -->







@endsection