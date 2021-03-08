@if ($paginator->hasPages())
<div class="card py-2 px-2 border-0 shadow-sm rounded-lg mb-3">
    <div class="d-flex justify-content-between">
        @if ($paginator->onFirstPage())
            <span class="btn btn-sm btn-bg-biru-outline rounded-lg">@lang('pagination.previous')</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm btn-bg-biru-outline rounded-lg"> @lang('pagination.previous')</a>
        @endif
    
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm btn-bg-biru-outline rounded-lg">@lang('pagination.next')</a>
        @else
            <span class="btn btn-sm btn-bg-biru-outline rounded-lg">@lang('pagination.next')</span>
        @endif
    </div>
</div>
@endif
