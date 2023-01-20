 <div class="pagination justify-content-center my-3">
        @if(!$gangues->onFirstPage())
         <a href="{{ $gangues->previousPageUrl() }}" class="btn btn-secondary">Anterior</a>
        @endif
        <span class="current-page mx-5">Pàgina {{ $gangues->currentPage() }} de {{ $gangues->lastPage() }}</span>
        @if($gangues->hasMorePages())
         <a href="{{ $gangues->nextPageUrl() }}" class="btn btn-secondary">Siguiente</a>
        @endif
 </div>
