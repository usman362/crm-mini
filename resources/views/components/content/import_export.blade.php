@props(['action', 'name' => 'file', 'button' => 'Upload'])
<div class="mt-2 mb-2 rounded" style="border: 1px solid #cacaca; ">
    <div class="card-head d-flex justify-content-between">
        <h1 class="mb-0">
            Import CSV
        </h1>
        <a class="btn btn-success d-flex justify-content-center align-items-center" href="{{ route('content-export') }}">Export</a>
    </div>

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data {{ $attributes }}">
        @csrf
        <div class="form-group p-4" style="display: flex; align-items: center ">
            <div class="custom-file text-left" style="margin-right: 20px">
                <input type="file" name="file" class="custom-file-input form-control" id="customFile" >
            
            </div>
            @error('file')<span class="text-danger" >{{$message}}</span>@enderror
            <button class="btn btn-primary" content="{{ $button }}">Upload</button>
        </div>
        
        {{-- <a class="btn btn-success" href="{{ route('content-export') }}">Export</a> --}}
       
    </form>

    
   
</div>