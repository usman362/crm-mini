<div class="mb-2">

    <div class="d-flex justify-content-between">
           
      @can('create', App\Models\ContentDetail::class)
    <a class="btn btn-success bg-gradient" href="{{$add_content}}">
    Create Content Detail
    </a>
    @endcan
    
    </div>
</div>