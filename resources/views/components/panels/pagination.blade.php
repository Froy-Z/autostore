@props(['paginator'])
@if ($paginator->hasPages())
    {{ $paginator->onEachSide(1)->links() }}
@endif
