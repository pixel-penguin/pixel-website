@extends('pixel-penguin-website::layouts.website')

@section('content')

	<main class="main">
		
		<nav aria-label="breadcrumb" class="breadcrumb-nav mb-4">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					@foreach($parentPages as $parentPage)
					<li class="breadcrumb-item active" aria-current="page">{{ $parentPage->name  }}</li>
					@endforeach
					
				</ol>
			</div><!-- End .container -->
		</nav>

		<div class="container">
			<product-directory-show :product_category_id="'{{ $category }}'"></product-directory-show>
		</div><!-- End .container -->

		<div class="mb-3"></div><!-- margin -->
	</main><!-- End .main -->

@endsection

@section('style')
 <style>
	 .header{display: contents !important; }
	 .header .sticky-wrapper{background:url(https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_337,w_1970/v1/{{ PixelPenguin\Admin\Models\Page::whereId(1)->first()->gallery()->orderBy('column_order')->first()->image_name }}.png)}
	 
	 .main{min-height: 800px}
</style>
@endsection