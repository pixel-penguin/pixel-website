@extends('pixel-penguin-website::layouts.website')

@section('content')

<main class="main">
	<div class="page-header" style="background-image: url(https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_face,h_400,w_1970/v1/{{ $page->image_name }}.png)">
		<div class="container">
			<h1>{{ $page->name }}</h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->

	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				@foreach($parentPages as $parentPage)
				<li class="breadcrumb-item active" aria-current="page">{{ $parentPage->name }}</li>
				@endforeach
			</ol>
		</div><!-- End .container -->
	</nav>

	<div class="container">


		@foreach($page->contents()->orderBy('column_order')->get() as $content)

		@if($content->page_content_type_id == 1)
		<div class="row">
			<div class="col-md-12">
				<div>
					<h2 class="title">{{ $content->name }}</h2>
					<div>{!! $content->detail !!}</div>
				</div><!-- End .heading -->
			</div><!-- End .col-lg-8 -->
		</div><!-- End .row -->

		@elseif($content->page_content_type_id == 5)
		<div class="row" style="margin: 30px 0 5px 0">
			@foreach($content->gallery()->orderBy('column_order')->get() as $galleryItem)
			<div class="col-lg-4 col-md-6" style="margin-bottom: 10px">
				<a data-fancybox="gallery" href="https://res.cloudinary.com/pixel-penguin/image/upload/c_limit,w_1920/v1/{{ $galleryItem->image_name }}.png"><img style="width: 100%" src="https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_face,h_300,w_400/v1/{{ $galleryItem->image_name }}.png"></a>
			</div>
			@endforeach
		</div>
		@endif
		@endforeach



		<div class="mb-2 mb-lg-5"></div><!-- margin -->
	</div><!-- End .container -->


</main><!-- End .main -->	
		
@endsection

@section('style')
<style>

	
</style>
@endsection
@section('scripts')
<script>
	
</script>
@endsection