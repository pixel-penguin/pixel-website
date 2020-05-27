<li>
	<a @if(strlen($sub) > 4) href="#" @else  href="/products/{{ $navigation->id }}" @endif  @if(strlen($sub) > 4) class="sf-with-ul" @endif>{{ $navigation->name}}</a>

	@if(strlen($sub) > 4)
	<ul>
		{!! $sub !!} 
	</ul>
	@endif
</li>
