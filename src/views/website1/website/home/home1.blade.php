@extends('pixel-penguin-website::layouts.website')

@section('content')

	<main class="main">
            <div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme owl-theme-light">
                    
					<?php
						$content = $page->contents;
					?>
					@foreach($page->gallery()->orderBy('column_order')->get() as $key => $galleryItem)
					<div class="home-slide">
                        <div class="slide-bg owl-lazy" data-src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_800,w_1970/v1/{{ $galleryItem->image_name }}.png" style="background-position:32% center;"></div><!-- End .slide-bg -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5 offset-md-7">
                                    <div class="home-slide-content slide-content-big">
                                        
										@if(isset($content[$key]))
										{!! $content[$key]->detail !!}
										@endif
										
										<!--
										<h1>Dresses</h1>
                                        <h3>
                                            <span>up to </span>
                                            <strong>30%</strong>
                                            <span>OFF in the<br>collection</span>
                                        </h3>
                                        <a href="category.html" class="btn btn-primary">Shop Now</a>
										-->
										
                                    </div><!-- End .home-slide-content -->
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .home-slide -->
					@endforeach
                    
                </div><!-- End .home-slider -->
            </div><!-- End .home-slider-container -->
			
			<!--
            <div class="banners-container mb-4 mb-lg-6 mb-xl-8">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="banner">
                                <div class="banner-content">
                                    <h3 class="banner-title">Sunglasses</h3>

                                    <a href="category.html" class="btn">Shop now</a>
                                </div>
                                <a href="#">
                                    <img src="/plugins/website/assets/images/banners/banner-1.jpg" alt="banner">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner">
                                <div class="banner-content">
                                    <h3 class="banner-title">Woman Shoes</h3>

                                    <a href="category.html" class="btn">Shop now</a>
                                </div>
                                <a href="#">
                                    <img src="/plugins/website/assets/images/banners/banner-2.jpg" alt="banner">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner">
                                <div class="banner-content">
                                    <h3 class="banner-title">Woman Bags</h3>

                                    <a href="category.html" class="btn">Shop now</a>
                                </div>
                                <a href="#">
                                    <img src="/plugins/website/assets/images/banners/banner-3.jpg" alt="banner">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			-->
            <div class="container mb-2 mb-lg-4 mb-xl-5" style="margin-top:60px">
                <h2 class="title text-center mb-3">Featured Products</h2>
                <div class="owl-carousel owl-theme featured-products">
                    
					
					@foreach($featuredProducts as $product)
					<div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="/product/{{ $product->link_name }}">
                                <img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_600,w_600/v1/{{ $product->product->gallery->first()->image_name }}.jpg">
                                <!-- overlay image -->
								<img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_600,w_600/v1/{{ $product->product->gallery->first()->image_name }}.jpg">
                                
                            </a>
                            <div class="label-group">
								@if($product->is_discount)
                                <div class="product-label label-cut">-{{ round(($product->price - $product->discounted_price) * 100 / $product->price) }}%</div>
								@endif
                            </div>
                            <div class="btn-icon-group">
                                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i></button>
                            </div>
                            <a onClick="Hub.$refs.showItem.getProductInfo({{ $product->product->id }})" class="btn-quickview" style="width: 100%;cursor:pointer" title="Quick View">Quick View</a> 
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
									@if(isset($product->product->category))
                                    <a href="#" class="product-category">{{ $product->product->category->name }}</a>
									@else
									<a href="#" class="product-category">No Category</a>
									@endif
                                </div>
                                <!--<a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>-->
                            </div>
                            <h2 class="product-title">
                                <a href="/product/{{ $product->link_name }}">{{ $product->name }}</a>
                            </h2>
                            <div class="ratings-container">
								<!--
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
								-->
                            </div><!-- End .product-container -->
                            <div class="price-box">
								
								@if($product->is_discount)
                                <span class="old-price">N${{ number_format($product->price) }}</span>
                                <span class="product-price">N${{ number_format($product->discounted_price) }}</span>
								@else
								<span class="product-price">N${{ number_format($product->price) }}</span>
								@endif
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>
					@endforeach
					
					
					
                    
                </div><!-- End .featured-products -->
            </div><!-- End .container -->

            <div class="promo-section" style="background-image: url(assets/images/promo-bg.jpg)">
                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="promo-slider owl-carousel owl-theme owl-theme-light">
                                    <div class="promo-content">
                                        <h3>Up to <span>40%</span> Off<br> <strong>Special Promo</strong></h3>
                                        <a href="#" class="btn btn-primary">Purchase Now</a>
                                    </div><!-- Endd .promo-content -->

                                    <div class="promo-content">
                                        <h3>Up to <span>58%</span> Off<br> <strong>Holiday Promo</strong></h3>
                                        <a href="#" class="btn btn-primary">Purchase Now</a>
                                    </div><!-- Endd .promo-content -->
                                </div><!-- End .promo-slider -->
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .container -->
            </div><!-- End .promo-section -->

            <div class="container mb-2 mb-lg-4 mb-xl-5">
                <h2 class="title text-center mb-3">Discounts</h2>
                <div class="owl-carousel owl-theme new-products">
                    
					
					@foreach($discountedProducts as $product)
					<div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="/product/{{ $product->link_name }}">
                                <img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_600,w_600/v1/{{ $product->product->gallery->first()->image_name }}.jpg">
                                <!-- overlay image -->
								<img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_600,w_600/v1/{{ $product->product->gallery->first()->image_name }}.jpg">
                                
                            </a>
                            <div class="label-group">
								@if($product->is_discount)
                                <div class="product-label label-cut">-{{ round(($product->price - $product->discounted_price) * 100 / $product->price) }}%</div>
								@endif
                            </div>
                            <div class="btn-icon-group">
                                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i></button>
                            </div>
                            <a onClick="Hub.$refs.showItem.getProductInfo({{ $product->product->id }})" class="btn-quickview" style="width: 100%; cursor:pointer" title="Quick View">Quick View</a> 
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
									@if(isset($product->product->category))
                                    <a href="#" class="product-category">{{ $product->product->category->name }}</a>
									@else
									<a href="#" class="product-category">No Category</a>
									@endif
                                </div>
                                <!--<a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>-->
                            </div>
                            <h2 class="product-title">
                                <a href="/product/{{ $product->link_name }}">{{ $product->name }}</a>
                            </h2>
                            <div class="ratings-container">
								<!--
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
								-->
                            </div><!-- End .product-container -->
                            <div class="price-box">
								
								@if($product->is_discount)
                                <span class="old-price">N${{ number_format($product->price) }}</span>
                                <span class="product-price">N${{ number_format($product->discounted_price) }}</span>
								@else
								<span class="product-price">N${{ number_format($product->price) }}</span>
								@endif
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>
					@endforeach
                    
                </div><!-- End .featured-products -->
            </div><!-- End .container -->
			
		
			
        </main><!-- End .main -->

@endsection