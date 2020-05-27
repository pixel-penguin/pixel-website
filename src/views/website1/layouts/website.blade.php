<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ env('APP_NAME') }}</title>

    <!--<meta name="keywords" content="HTML5 Template" />-->
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}">
    <meta name="author" content="PixelPenguin Creative Solutions">
        
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/plugins/website/assets/images/icons/favicon.ico">
    
    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    
    <!-- Plugins CSS File -->
    <!--<link rel="stylesheet" href="/plugins/website/assets/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="/css/website-1.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/plugins/website/assets/css/style.min.css">
	
	<style>
		.header-middle {
			background-image:url(https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_337,w_1970/v1/{{ PixelPenguin\Admin\Models\Page::whereId(1)->first()->gallery()->orderBy('column_order')->first()->image_name }}.png)
		}
		
		.header-left{
			border-right: 1px solid {{ env('NAVIGATION_BORDER_COLOR') }}
		}
		.header-search{
			border-left: 1px solid {{ env('NAVIGATION_BORDER_COLOR') }}
		}
		.header-search input::placeholder {
			color:{{ env('NAVIGATION_TOP_TEXT_COLOR') }} !important
		}
		
		.dropdown-cart-text{
			color:{{ env('NAVIGATION_TOP_TEXT_COLOR') }} !important
		}
		
		.cart-dropdown{
			border-left: 1px solid {{ env('NAVIGATION_BORDER_COLOR') }};
			border-right: 1px solid {{ env('NAVIGATION_BORDER_COLOR') }};
		}
		
		.header-search .form-control{
			border-right: 1px solid {{ env('NAVIGATION_BORDER_COLOR') }};
			
		}
		
		.header-dropdowns .header-dropdown{
			border-left: 1px solid {{ env('NAVIGATION_BORDER_COLOR') }}			
		}
		
		.header-row-top{
			border-bottom: 1px solid {{ env('NAVIGATION_BORDER_COLOR') }}					
		}
		
		.header-middle{
			border-bottom: 1px solid {{ env('NAVIGATION_BORDER_COLOR') }}					
		}
		
		
		.header-row-top a{
			color: {{ env('NAVIGATION_TOP_TEXT_COLOR') }} !important;
			
		}
		
		.inner-quickview figure .btn-quickview{
			background-color: {{ env('WEBSITE_COLOR_1') }}
		}
		
		.inner-icon figure .btn-icon:hover{
			background-color: {{ env('WEBSITE_COLOR_1') }};
    		border-color: {{ env('WEBSITE_COLOR_1') }};
		}
		
		.swal2-container{ z-index: 99999999999}
		
		.btn-add-cart{display: none !important}
		
		.btn-primary{ background: {{ env('WEBSITE_COLOR_1') }}; color:{{ env('WEBSITE_INVERTING_COLOR_1') }} !important}
		.btn-primary a{color:{{ env('WEBSITE_INVERTING_COLOR_1') }} !important}
		
		.product-default a{color:{{ env('WEBSITE_INVERTING_COLOR_1') }}}
		
		.product-price{color:{{ env('WEBSITE_COLOR_1') }} !important}
		
		.menu li:hover>a, .menu li.show>a, .menu li.active>a{
			background-color: {{ env('WEBSITE_COLOR_1') }};
			color: {{ env('WEBSITE_INVERTING_COLOR_1') }}
		}
		
		.menu>li>a{background: transparent !important; color: {{ env('NAVIGATION_TOP_TEXT_COLOR') }} !important}
		
		
		.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{ background: {{ env('WEBSITE_COLOR_1') }} !important; color: {{ env('WEBSITE_INVERTING_COLOR_1') }} !important; padding: 6px 12px !important}
		
		.home-slide-content h3{ line-height: 60px !important}
		
		.main{overflow: hidden}
		
		.hooper-prev, .hooper-next{background: rgba(255,255,255, 0.2) !important; border: 1px solid rgba(0,0,0,0.2) !important} 
		
		.widget-newsletter .btn{background-color: {{ env('WEBSITE_COLOR_1') }}; color: {{ env('WEBSITE_INVERTING_COLOR_1') }}}
		
		.home-slide-content h1, .home-slide-content h3{ color: {{ env('NAVIGATION_TOP_TEXT_COLOR') }} !important }
		
		.logo img{ padding:26px !important}
	</style>
	
	
	<style>
		/* Absolute Center Spinner */
		.loading {
		  position: fixed;
		  z-index: 99999999999999999999;
		  height: 2em;
		  width: 2em;
		  overflow: show;
		  margin: auto;
		  top: 0;
		  left: 0;
		  bottom: 0;
		  right: 0;
		}

		/* Transparent Overlay */
		.loading:before {
		  content: '';
		  display: block;
		  position: fixed;
		  top: 0;
		  left: 0;
		  width: 100%;
		  height: 100%;
			background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

		  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
		}

		/* :not(:required) hides these rules from IE9 and below */
		.loading:not(:required) {
		  /* hide "loading..." text */
		  font: 0/0 a;
		  color: transparent;
		  text-shadow: none;
		  background-color: transparent;
		  border: 0;
		}

		.loading:not(:required):after {
		  content: '';
		  display: block;
		  font-size: 10px;
		  width: 1em;
		  height: 1em;
		  margin-top: -0.5em;
		  -webkit-animation: spinner 150ms infinite linear;
		  -moz-animation: spinner 150ms infinite linear;
		  -ms-animation: spinner 150ms infinite linear;
		  -o-animation: spinner 150ms infinite linear;
		  animation: spinner 150ms infinite linear;
		  border-radius: 0.5em;
		  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
		box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
		}

		/* Animation */

		@-webkit-keyframes spinner {
		  0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		  }
		  100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		  }
		}
		@-moz-keyframes spinner {
		  0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		  }
		  100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		  }
		}
		@-o-keyframes spinner {
		  0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		  }
		  100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		  }
		}
		@keyframes spinner {
		  0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		  }
		  100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		  }
		}
	</style>
	
	@yield('style')
</head>
<body>
	<div id="app" class="page-wrapper">		
        <header class="header header-transparent">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <a href="/" class="logo">
                            <img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_limit,h_200,w_400/v1/{{ env('LOGO_IMAGE_NAME') }}.png" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="row header-row header-row-top">
                            <div class="header-dropdown dropdown-expanded">
                                <a href="#">Links</a>
                                <div class="header-menu">
                                    <ul>
                                        <!--
										<li><a href="#" >MY ACCOUNT </a></li>
                                        <li><a href="#">DAILY DEAL</a></li>
                                        <li><a href="#">MY WISHLIST </a></li>
										-->
										
										@if(Auth::check())
										<li><a style="color: #3a2417;" href="/admin" class="btn btn-default">Admin</a></li>
										<li><a style="color: #3a2417;" href="/logout" class="btn btn-default">Logout</a></li>
										
										@else
										<li><a href="/login" class="login-link">SIGN IN</a></li>
										@endif
                                    </ul>
                                </div><!-- End .header-menu -->
                            </div><!-- End .header-dropown -->
                            <div class="header-search">
                                <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                                <div class="header-search-wrapper">
                                    <form action="#" method="get">
                                        <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                        <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div><!-- End .header-search-wrapper -->
                            </div><!-- End .header-search -->
                        </div><!-- End .header-row -->

                        <div class="row header-row header-row-bottom">
                            <nav class="main-nav">
                                <ul class="menu sf-arrows">
									
									{!! PixelPenguin\Admin\Http\Controllers\Extras\NavigationController::initiate('pixel-penguin-website::navigation.navigation1') !!}
									
                                </ul>
                            </nav>
                        
                            <button class="mobile-menu-toggler" type="button">
                                <i class="icon-menu"></i>
                            </button>

                            <div class="header-dropdowns">
                                
                                
                            </div><!-- End .header-dropdowns -->

                            <globalcomponent-cartnavigation  ref="cartSystem"></globalcomponent-cartnavigation>
                        </div><!-- End .header-row -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        @yield('content')

        <footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Contact Us</h4>
                                <ul class="contact-info">
                                    <li>
                                        <i class="icon-direction"></i>
                                        <span class="contact-info-label">Address:</span>{{ env('WEBSITE_DETAIL_ADDRESS') }}
                                    </li>
                                    <li>
                                        <i class="icon-phone-1"></i>
                                        <span class="contact-info-label">Phone:</span> {!! env('WEBSITE_DETAIL_PHONE') !!}</a>
                                    </li>
                                    <li>
                                        <i class="icon-envolope"></i>
                                        <span class="contact-info-label">Email:</span> {!! env('WEBSITE_DETAIL_EMAIL') !!}
                                    </li>
                                    <li>
                                        <i class="icon-clock-1"></i>
                                        <span class="contact-info-label">Working Days/Hours:</span>
                                        {{ env('WEBSITE_DETAIL_WORKING_HOURS') }}
                                    </li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="widget">
                                        <h4 class="widget-title">My Account</h4>

                                        <ul class="links">
											
                                            <li><a href="/products">All Products</a></li>
                                            <li><a href="/cart/view">View Cart</a></li>
                                            <li><a href="/checkout">Checkout</a></li>
                                            <!--<li><a href="#">Orders History</a></li>
                                            <li><a href="#">Advanced Search</a></li>-->
											
                                        </ul>
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-3 -->

                                <div class="col-md-5">
                                    <div class="widget">
                                        <h4 class="widget-title">Main Features</h4>
                                        <ul class="links">
											
											@foreach(\PixelPenguin\Admin\Models\Page::where('parent_id', 0)->get() as $page)
											
											<?php
												if(strlen($page->website_link) > 0){
													$page->link_url = $page->website_link;				
												}
												else
												{
													$page->link_url = '/page/'.$page->link_name;
												}
											?>
											
                                            <li>
												<a href="{{ $page->link_url }}">{{ $page->name }}</a>
											</li>
											@endforeach
											
                                        </ul>
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-5 -->
							
                                <div class="col-md-4">
                                    <div class="widget widget-newsletter">
                                        <h4 class="widget-title">BE THE FIRST TO KNOW</h4>

                                        <p>{{ env('WEBSITE_DETAIL_NEWSLETTER_TEXT') }}</p>

                                        <form action="#">
                                            <input type="email" class="form-control" placeholder="Email address" required>

                                            <input type="submit" class="btn" value="Go">
                                        </form>
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-4 -->
                            </div><!-- End .row -->

                            <div class="footer-bottom">
                                <img src="https://res.cloudinary.com/pixel-penguin/image/upload/v1586635129/for-all-websites/cards/payments2_knwsa7.png" alt="payment methods" class="footer-payments">
                                <p class="footer-copyright">{{ date('Y') }} &copy; Copyright<br> All Rights Reserved.</p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                                    <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>
                                </div><!-- End .social-icons -->
                            </div><!-- End .footer-bottom -->
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->
        </footer><!-- End .footer -->
		
		
		
		
		
		
		<globalcomponent-show-item ref="showItem"></globalcomponent-show-item>
		
		
		
		
		
		
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
					
					{!! PixelPenguin\Admin\Http\Controllers\Extras\NavigationController::initiate('pixel-penguin-website::navigation.mobile_navigation1') !!}					
                    
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

	
	@if(isset($popup) && $popup)
    <div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url(assets/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="/plugins/website/assets/images/logo-black.png" alt="Logo" class="logo-newsletter">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                    <input type="submit" class="btn" value="Go!">
                </div><!-- End .from-group -->
            </form>
            <div class="newsletter-subscribe">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div><!-- End .newsletter-popup-content -->
    </div><!-- End .newsletter-popup -->
	@endif
    
    <!-- Add Cart Modal -->
    <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>You've just added this product to the<br>cart:</p>
            <h4 id="productTitle"></h4>
            <img src="" id="productImage" width="100" height="100" alt="adding cart image">
            <div class="btn-actions">
                <a href="cart.html"><button class="btn-primary">Go to cart page</button></a>
                <a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	
	<div class="loading" style="display: none">Loading&#8230;</div>
	
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <!--<script src="/plugins/website/assets/js/jquery.min.js"></script>
    <script src="/plugins/website/assets/js/bootstrap.bundle.min.js"></script>-->
	<script src="/js/website-1.js"></script>
    <script src="/plugins/website/assets/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="/plugins/website/assets/js/main.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha256-yt2kYMy0w8AbtF89WXb2P1rfjcP/HTHLT7097U8Y5b8=" crossorigin="anonymous"></script>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha256-Vzbj7sDDS/woiFS3uNKo8eIuni59rjyNGtXfstRzStA=" crossorigin="anonymous" />
	<script>
		
		$('.myAccount').click(function(){
			
			//console.log(Hub.$refs);
			Hub.$refs.cartSystem.alertMe(); //assuming my component has a doSomething() method	
			Hub.$refs.showItem.getProductInfo(); //assuming my component has a doSomething() method	
		});
		
	</script>
</body>
</html>