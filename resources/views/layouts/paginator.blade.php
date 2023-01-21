<div class="pagination justify-content-center my-3">
    @if(!$gangues->onFirstPage())
        <a href="{{ $gangues->previousPageUrl() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i></a>
    @endif
    <span class="current-page mx-5">Pàgina {{ $gangues->currentPage() }} de {{ $gangues->lastPage() }}</span>
    @if($gangues->hasMorePages())
        <a href="{{ $gangues->nextPageUrl() }}" class="btn btn-primary"><i class="bi bi-arrow-right"></i></a>
    @endif
</div>
