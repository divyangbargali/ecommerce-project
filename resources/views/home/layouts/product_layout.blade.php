
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Porto - Bootstrap eCommerce Template</title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Bootstrap eCommerce Template">
	<meta name="author" content="SW-THEMES">
		
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{asset('public/assets/images/icons/favicon.ico')}}">
	
	<script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700' ] }
		};
		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'assets/js/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>

	<!-- Plugins CSS File -->
	<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">

	<!-- Main CSS File -->
	<link rel="stylesheet" href="{{asset('public/assets/css/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/fontawesome-free/css/all.min.css')}}">

	
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<div class="page-wrapper">
		<header class="header">
			<div class="header-middle sticky-header">
				<div class="container">
					<div class="header-left">
						<a href="index.html" class="logo">
							<img src="{{asset('public/Books.png')}}" alt="Porto Logo" height="80px" width="60px">
						</a>

						<nav class="main-nav font2">
							<ul class="menu">
								<li>
									<a href="{{url('/')}}">Home</a>
								</li>
								<li>
									<a href="#">Categories <i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<div class="megamenu megamenu-fixed-width megamenu-3cols">
							<div class="row">
								<div class="col-lg-4">
											
									@php 
										$categories = DB::table('categories')->get();
									@endphp

										<ul class="submenu">
											@foreach($categories as $c)
											<li><a href="{{url('/category/page/'.$c->id)}}">{{$c->category_name}}</a></li>
											@endforeach
										</ul>
								</div>
										
										</div>
									</div><!-- End .megamenu -->
								</li>
								<li>
									<a href="{{url('/about/us/')}}">About Us</a>
								
								</li>
								<li>
									<a href="{{url('/contact/us/')}}">Contact Us </a>
								
								</li>

								@if(Auth::check())
							
								@else 
								<li><a href="{{route('login1')}}" >Login</a></li>
								@endif

							</ul>
						</nav>
					</div><!-- End .header-left -->

					<div class="header-right">
						<button class="mobile-menu-toggler" type="button">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                           
						</button>

						<a href="{{route('login1')}}" class="header-icon"><i class="fa fa-user-o" aria-hidden="true"></i></a>

					@if(Auth::check())
					@php 
						$wishlist = DB::table('wishlist')->where('user_id',Auth::user()->id)->get();
					@endphp

					<div class="dropdown cart-dropdown">
						<a href="{{url('/wishlist/')}}" class="dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false" >
									<i class="fa fa-heart-o" aria-hidden="true"></i>
									<span class="cart-count badge-circle">{{$wishlist->count()}}</span>
								</a>
					</div>
					&nbsp;&nbsp;&nbsp;
					@endif
						<div class="header-search header-search-popup header-search-category d-none d-sm-block">
							<a href="#" class="search-toggle" role="button" ><i class="fa fa-search"  aria-hidden="true" ></i></a>
							<form action="{{url('search/product/')}}" method="post">
								@csrf
								<div class="header-search-wrapper">
									<input type="search" class="form-control" name="search" id="q" placeholder="I'm searching for..." required="">
								
									<button class="btn bg-dark" type="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div><!-- End .header-search-wrapper -->
							</form>
						</div>

						<div class="dropdown cart-dropdown">
							<a href="{{url('/cart/content/')}}" class="dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false" >
								<i class="fa fa-shopping-bag" aria-hidden="true"></i>
								<span class="cart-count badge-circle">{{Cart::count()}}</span>
							</a>

							
						</div><!-- End .dropdown -->
					</div><!-- End .header-right -->
				</div><!-- End .container -->
			</div><!-- End .header-middle -->
		</header><!-- End .header -->



            @yield('show_product')

        
		<footer class="footer">
			<div class="footer-top">
				<div class="container top-border d-flex align-items-center justify-content-between flex-wrap">
					
					<div class="footer-right">
						
					</div>
				</div>
			</div>
			<div class="footer-middle">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-xl-4">
							<div class="widget">
								<h4 class="widget-title">Contact Info</h4>

								<div class="row">
									<div class="col-sm-6">
										<div class="contact-widget">
											<h4 class="widget-title">ADDRESS</h4>
											<a href="#">1234 Street Name, City, England</a>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="contact-widget email">
											<h4 class="widget-title">EMAIL</h4>
											<a href="mailto:mail@example.com">mail@example.com</a>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="contact-widget">
											<h4 class="widget-title">PHONE</h4>
											<a href="#">Toll Free (123) 456-7890</a>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="contact-widget">
											<h4 class="widget-title">WORKING DAYS/HOURS</h4>
											<a href="#">Mon - Sun / 9:00 AM - 8:00 PM</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3 col-xl-4">
							<div class="widget">
								<h4 class="widget-title">My Account</h4>
								<ul class="links link-parts row">
									<div class="link-part col-xl-4">
										<li><a href="about.html">About Us</a></li>
										<li><a href="contact.html">Contact Us</a></li>
										<li><a href="my-account.html">My Account</a></li>
									</div>
									<div class="link-part col-xl-8">
										<li><a href="#">Orders History</a></li>
										<li><a href="#">Advanced Search</a></li>
									</div>
								</ul>
							</div><!-- End .widget -->
						</div>
						<div class="col-sm-6 col-lg-3 col-xl-4">
							<div class="widget">
								<h4 class="widget-title">Main Features</h4>
								<ul class="links link-parts row">
									<div class="link-part col-xl-6">
										<li><a href="#">Super Fast WordPress Theme</a></li>
										<li><a href="#">1st Fully working Ajax Theme</a></li>
										<li><a href="#">33 Unique Shop Layouts</a></li>
									</div>
									<div class="link-part col-xl-6">
										<li><a href="#">Powerful Admin Panel</a></li>
										<li><a href="#">Mobile & Retina Optimized</a></li>
									</div>
								</ul>
							</div><!-- End .widget -->
						</div>
					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="container top-border d-flex align-items-center justify-content-between flex-wrap">
					<p class="footer-copyright mb-0 py-3 pr-3">Porto eCommerce. &copy;  2020.  All Rights Reserved</p>
					<img class="py-3" src="assets/images/payments.png" alt="payment image">
				</div>
			</div>
		</footer>
	</div><!-- End .page-wrapper -->

	<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

	<div class="mobile-menu-container">
		<div class="mobile-menu-wrapper">
			<span class="mobile-menu-close"><i class="icon-compare-link"></i></span>
			<nav class="mobile-nav">
				<ul class="mobile-menu">
					<li class="active"><a href="index.html">Home</a></li>
					<li>
						<a href="category.html">Categories <i class="fa fa-angle-down downarrow"  aria-hidden="true"></i></a>
						<ul>
							<li><a href="category.html">Full Width Banner</a></li>
							<li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
							<li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
							<li><a href="category.html">Left Sidebar</a></li>
							<li><a href="category-sidebar-right.html">Right Sidebar</a></li>
							<li><a href="category-flex-grid.html">Product Flex Grid</a></li>
							<li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
							<li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
							<li><a href="category-list.html">List Types</a></li>
							<li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a></li>
							<li><a href="category-3col.html">3 Columns Products</a></li>
							<li><a href="category-4col.html">4 Columns Products</a></li>
							<li><a href="category.html">5 Columns Products</a></li>
							<li><a href="category-6col.html">6 Columns Products</a></li>
							<li><a href="category-7col.html">7 Columns Products</a></li>
							<li><a href="category-8col.html">8 Columns Products</a></li>
						</ul>
					</li>
					<li>
						<a href="product.html">Products<i class="fa fa-angle-down downarrow"  aria-hidden="true"></i></a>
						<ul>
							<li>
								<a href="#">Variations <i class="fa fa-angle-down downarrow"  aria-hidden="true"></i></a>
								<ul>
									<li><a href="product.html">Horizontal Thumbs</a></li>
									<li><a href="product-full-width.html">Vertical Thumbnails</a></li>
									<li><a href="product.html">Inner Zoom</a></li>
									<li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
									<li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
									<li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
									<li><a href="product-simple.html">Simple Product</a></li>
									<li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Product Layout Types </a>
								<ul>
									<li><a href="product.html">Default Layout</a></li>
									<li><a href="product-extended-layout.html">Extended Layout</a></li>
									<li><a href="product-full-width.html">Full Width Layout</a></li>
									<li><a href="product-grid-layout.html">Grid Images Layout</a></li>
									<li><a href="product-sticky-both.html">Sticky Both Side Info</a></li>
									<li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Pages <i class="fa fa-angle-down downarrow"  aria-hidden="true"></i></a>
						<ul>
							<li><a href="cart.html">Shopping Cart</a></li>
							<li>
								<a href="#">Checkout</a>
								<ul>
									<li><a href="checkout-shipping.html">Checkout Shipping</a></li>
									<li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
									<li><a href="checkout-review.html">Checkout Review</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Dashboard</a>
								<ul>
									<li><a href="dashboard.html">Dashboard</a></li>
									<li><a href="my-account.html">My Account</a></li>
								</ul>
							</li>
							<li><a href="about.html">About Us</a></li>
							<li>
								<a href="#">Blog</a>
								<ul>
									<li><a href="blog.html">Blog</a></li>
									<li><a href="single.html">Blog Post</a></li>
								</ul>
							</li>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="#" class="login-link">Login</a></li>
							<li><a href="forgot-password.html">Forgot Password</a></li>
						</ul>
					</li>
					<li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
				</ul>
			</nav><!-- End .mobile-nav -->

			<div class="social-icons">
				<a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
				<a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
				<a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
			</div><!-- End .social-icons -->
		</div><!-- End .mobile-menu-wrapper -->
	</div><!-- End .mobile-menu-container -->
<!-- Add Cart Modal -->
	<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-body add-cart-box text-center">
			<p>You've just added this product to the<br>cart:</p>
			<h4 id="productTitle"></h4>
			<img src="#" id="productImage" width="100" height="100" alt="adding cart image">
			<div class="btn-actions">
				<a href="cart.html"><button class="btn-primary">Go to cart page</button></a>
				<a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
			</div>
		  </div>
		</div>
	  </div>
	</div>

	<a id="scroll-top" href="#top" title="Top" role="button"><i class="fa fa-angle-up" aria-hidden="true"></i></i></a>
	<!-- Plugins JS File -->
	<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/assets/js/plugins.min.js')}}"></script>

	<!-- Main JS File -->
	<script src="{{asset('public/assets/js/main.min.js')}}"></script>
</body>
</html>