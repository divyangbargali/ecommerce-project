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
					<h1>Login and Create Account</h1>
				</div><!-- End .container -->
			</div><!-- End .page-header -->

			<div class="container">

			@if($errors->any())

<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
				<li>{{$error}}</li>
		@endforeach
	</ul>
</div>


@endif

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

				<div class="row row-sparse">
					<div class="col-md-6">
						<div class="heading">
							<h2 class="title">Login</h2>
							<p>If you have an account with us, please log in.</p>
						</div><!-- End .heading -->

						<form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                        @csrf
							<input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
							<input type="password"  id="password"  name="password" class="form-control" placeholder="Password" required>

							<div class="form-footer">
								<button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
							   @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
							</div><!-- End .form-footer -->
						</form>
					</div><!-- End .col-md-6 -->

					<div class="col-md-6">
						<div class="heading">
							<h2 class="title">Create An Account</h2>
							<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						</div><!-- End .heading -->

						<form method="POST" action="{{ route('register') }}">
                        @csrf
							<input type="text" id="name" name="name" class="form-control" placeholder="First Name" required>
							<input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
							<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
							<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>

                            

							<div class="form-footer">
								<button type="submit" name="submit" class="btn btn-primary">Create Account</button>
							</div><!-- End .form-footer -->
						</form>
					</div><!-- End .col-md-6 -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-5"></div><!-- margin -->
		</main><!-- End .main -->


        @endsection