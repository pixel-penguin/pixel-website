@extends('layouts.website')

@section('content')

<!-- breadcrumb-area -->

<?php
	if( strlen($page->image_name) > 0){
		$imageName = $page->image_name;
	}
	else{
		$imageName = 'placeholders/placeholder-image'; 
	}
?>
<section class="breadcrumb-area breadcrumb-bg" data-background="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_face,h_400,w_1920/v1/{{ $imageName }}.jpg">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="breadcrumb-wrap">
					<div class="breadcrumb-title mb-20">
						<!--<span>digital marketing</span>-->
						<h2>{{ $page->name }}</h2>
					</div>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							@foreach($parentPages as $parentPage)
							<li class="breadcrumb-item active" aria-current="page">{{ $page->name  }}</li>
							@endforeach
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="portfolio-details-area pt-120 pb-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="portfolio-details-wrap">
					
					<div class="portfolio-details-content mb-50">
						{!! $page->detail !!}
					</div>
					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="project-status">
					
					<img style="width: 100%" src="https://res.cloudinary.com/pixel-penguin/image/upload/c_scale,w_800/v1583698879/websites/pixel-penguin/misc/penguin_for_website-01-01_iwogdw.png" />
					
					
					<div style="margin-top: 50px" class="menu-btn"><a href="/contact-us" class="btn" style=" width: 100%; display: block">Get A Quote</a></div>
					<!--
					<ul>
						<li>
							<h5>Client:</h5>
							<span>Humble LLC Group</span>
						</li>
						<li>
							<h5>Date:</h5>
							<span>23rd January 2019</span>
						</li>
						<li>
							<h5>Website:</h5>
							<span>www.example.com</span>
						</li>
						<li>
							<h5>Category:</h5>
							<span>Digital, SEO, Website, UI/UX</span>
						</li>
					</ul>
					-->
				</div>
			</div>
		</div>
	</div>
</section>




@endsection
@section('scripts')

@endsection