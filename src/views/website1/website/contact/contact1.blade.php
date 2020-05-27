@extends('pixel-penguin-website::layouts.website')

@section('content')

	<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <contact.contact1></contact.contact1>

            <div class="mb-8"></div><!-- margin -->
        </main><!-- End .main -->

@endsection

@section('style')
 <style>
	 .header{display: contents !important; }
	 .header .sticky-wrapper{background:url(https://res.cloudinary.com/pixel-penguin/image/upload/c_fill,g_north,h_337,w_1970/v1/{{ PixelPenguin\Admin\Models\Page::whereId(1)->first()->gallery()->orderBy('column_order')->first()->image_name }}.png)}
</style>
@endsection