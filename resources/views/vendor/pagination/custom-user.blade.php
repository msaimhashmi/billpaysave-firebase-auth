<div class="paginate">
	@if ($paginator->hasPages())
	
	@if ($paginator->onFirstPage())
	<a class="btn btn-light disabled"><i class="bi bi-chevron-left"></i></a>
	@else
	<a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-light disabled"><i class="bi bi-chevron-left"></i></a>
	@endif
	
	@foreach ($elements as $element)
	@if (is_string($element))
	<div class="link">
		<a href="#" class="disabled">{{ $element }}</a> {{-- <span>of</span> <a href="#">10</a> --}}
	</div>
	@endif
	
	@if (is_array($element))
	@foreach ($element as $page => $url)
	@if ($page == $paginator->currentPage())
	<div class="link">
		<a href="#" class="active my-active">{{ $page }}</a>
	</div>
	@else
	<div class="link">
		<a href="{{ $url }}">{{ $page }}</a>
	</div>
	@endif
	@endforeach
	@endif
	@endforeach
	
	@if ($paginator->hasMorePages())
	<a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-light"><i class="bi bi-chevron-right"></i></a>
	@else
	<a class="btn btn-light disabled"><i class="bi bi-chevron-right"></i></a>
	@endif
	@endif
</div>