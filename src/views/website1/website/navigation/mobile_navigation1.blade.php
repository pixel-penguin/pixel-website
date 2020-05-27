<li>
	<a @if(strlen($sub) > 4) href="#" @else  href="{{ $link }}" @endif >{{ $navigation->name}}</a>

	@if(strlen($sub) > 4)
	<ul>
		{!! $sub !!} 
	</ul>
	@endif
	@if($navigation->page_type_id == 6)
	<ul>	
		{!! PixelPenguin\Admin\Http\Controllers\Extras\NavigationController::initiateProductsMenu('pixel-penguin-website::navigation.product-mobile_navigation1') !!}
	</ul>
	@endif
</li>
