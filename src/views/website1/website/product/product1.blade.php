@extends('pixel-penguin-website::layouts.website')

@section('content')

	<main class="main">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
					@foreach($parentPages as $parentPage)
					<li class="breadcrumb-item active" aria-current="page">{{ $parentPage->name  }}</li>
					@endforeach
				</ol>
			</div><!-- End .container -->
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="product-single-container product-single-default">
						<div class="row">
							<div class="col-lg-7 col-md-6 product-single-gallery">
								
								<div class="product-slider-container product-item">
									<div class="product-single-carousel owl-carousel owl-theme">
										
										@foreach($product->gallery as $gallerEntry)
										<div class="product-item">
											<img class="product-single-image" src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_600,w_600/v1/{{ $gallerEntry->image_name }}.jpg" data-zoom-image="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_1200,w_1200/v1/{{ $gallerEntry->image_name }}.jpg"/>
										</div>
										@endforeach
										
										
									</div>
									<!-- End .product-single-carousel -->
									<span class="prod-full-screen">
										<i class="icon-plus"></i>
									</span>
								</div>
								<div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
									@foreach($product->gallery as $gallerEntry)
									<div class="col-3 owl-dot">
										<img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_600,w_600/v1/{{ $gallerEntry->image_name }}.jpg"/>
									</div>
									@endforeach
									
								</div>
							</div><!-- End .col-lg-7 -->

							<div class="col-lg-5 col-md-6">
								<div class="product-single-details">
									<h1 class="product-title">{{ $product->name }}</h1>

									<product-show-item :product_id="{{ $product->id }}"></product-show-item>
								</div><!-- End .product-single-details -->
							</div><!-- End .col-lg-5 -->
						</div><!-- End .row -->
					</div><!-- End .product-single-container -->

					<div class="product-single-tabs">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
							</li>
							<!--
							<li class="nav-item">
								<a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews</a>
							</li>
							-->
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
								<div class="product-desc-content">
									
									{!! $product->detail !!}
									
								</div><!-- End .product-desc-content -->
							</div><!-- End .tab-pane -->

							<div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
								<div class="product-tags-content">
									<!-- tab content -->
								</div><!-- End .product-tags-content -->
							</div><!-- End .tab-pane -->

							<div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
								<div class="product-reviews-content">
									<!-- tab content -->
								</div><!-- End .product-reviews-content -->
							</div><!-- End .tab-pane -->
						</div><!-- End .tab-content -->
					</div><!-- End .product-single-tabs -->
				</div><!-- End .col-lg-9 -->

				<div class="sidebar-overlay"></div>
				<div class="sidebar-toggle"><i class="icon-sliders"></i></div>
				<aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
					<div class="sidebar-wrapper">
						<div class="widget widget-brand">
							<a href="#">
								{{ $product->brand }}
							</a>
						</div><!-- End .widget -->
						
						<!--
						<div class="widget widget-info">
							<ul>
								<li>
									<i class="icon-shipping"></i>
									<h4>FREE<br>SHIPPING</h4>
								</li>
								<li>
									<i class="icon-us-dollar"></i>
									<h4>100% MONEY<br>BACK GUARANTEE</h4>
								</li>
								<li>
									<i class="icon-online-support"></i>
									<h4>ONLINE<br>SUPPORT 24/7</h4>
								</li>
							</ul>
						</div>
						-->
						
						<!--
						<div class="widget widget-banner">
							<div class="banner banner-image">
								<a href="#">
									<img src="assets/images/banners/banner-sidebar.jpg" alt="Banner Desc">
								</a>
							</div>
						</div>
						-->

						<div class="widget widget-featured">
							<h3 class="widget-title">Related Products</h3>

							<div class="widget-body">
								<div class="owl-carousel widget-featured-products">
									<div class="featured-col">
										
										
										@foreach($relatedProducts->take(5) as $productEntry)
										<div class="product-default left-details product-widget">
											<figure>
												<a href="/product/{{ $productEntry->link_name }}">
													@if($productEntry->gallery()->orderBy('column_order')->first() != false)
													<img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_200,w_200/v1/{{ $productEntry->gallery()->orderBy('column_order')->first()->image_name }}.jpg">
													@endif
												</a>
											</figure>
											<div class="product-details">
												<h2 class="product-title">
													<a href="/product/{{ $productEntry->link_name }}">{{ $productEntry->name }}</a>
												</h2>
												<div class="ratings-container">
													<!--
													<div class="product-ratings">
														<span class="ratings" style="width:100%"></span>
														<span class="tooltiptext tooltip-top"></span>
													</div>
													-->
													<!-- End .product-ratings -->
												</div><!-- End .product-container -->
												<div class="price-box">
													
													<span class="product-price">From N${{ number_format($productEntry->prices[0]->price) }}</span>													
													
												</div><!-- End .price-box -->
											</div><!-- End .product-details -->
										</div>
										@endforeach
										
									</div><!-- End .featured-col -->

									
								</div><!-- End .widget-featured-slider -->
							</div><!-- End .widget-body -->
						</div><!-- End .widget -->
					</div>
				</aside><!-- End .col-md-3 -->
			</div><!-- End .row -->
		</div><!-- End .container -->

		<div class="featured-section">
			<div class="container">
				<h2 class="carousel-title">Featured Products</h2>

					<div class="owl-carousel owl-theme new-products">
						
						
						@foreach($featuredProducts->take(10) as $productEntry)
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/product/{{ $productEntry->link_name }}">
									<img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_600,w_600/v1/{{ $productEntry->product->gallery->first()->image_name }}.jpg">
									<!-- overlay image -->
									<img src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,h_600,w_600/v1/{{ $productEntry->product->gallery->first()->image_name }}.jpg">
								</a>
								<div class="label-group">
									@if($productEntry->is_discount)
									<div class="product-label label-cut">-{{ round(($productEntry->price - $productEntry->discounted_price) * 100 / $productEntry->price) }}%</div>
									@endif
								</div>
								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i></button>
								</div>
								<a onClick="Hub.$refs.showItem.getProductInfo({{ $productEntry->product->id }})" style="width:100%" class="btn btn-primary" title="Quick View">Quick View</a> 
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										@if(isset($productEntry->product->category))
										<a href="#" class="product-category">{{ $productEntry->product->category->name }}</a>
										@else
										<a href="#" class="product-category">No Category</a>
										@endif
									</div>
									<a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
								</div>
								<h2 class="product-title">
									<a href="/product/{{ $productEntry->link_name }}">{{ $productEntry->name }}</a>
								</h2>
								<div class="ratings-container">
									<!--
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings 
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings 
									-->
								</div><!-- End .product-container -->
								<div class="price-box">
									@if($productEntry->is_discount)
									<span class="old-price">N${{ number_format($productEntry->price) }}</span>
									<span class="product-price">N${{ number_format($productEntry->discounted_price) }}</span>
									@else
									<span class="product-price">N${{ number_format($productEntry->price) }}</span>
									@endif
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						@endforeach
						
					</div><!-- End .featured-products -->
			</div><!-- End .container -->
		</div><!-- End .featured-section -->
	</main><!-- End .main -->

@endsection

@section('style')
 <style>
	 .header{display: contents !important; }
	 .header .sticky-wrapper{background:url(https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_337,w_1970/v1/{{ PixelPenguin\Admin\Models\Page::whereId(1)->first()->gallery()->orderBy('column_order')->first()->image_name }}.png)}
</style>
@endsection