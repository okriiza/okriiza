@if ($paginator->hasPages())
<div class="d-flex justify-content-between ">
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
@endif
