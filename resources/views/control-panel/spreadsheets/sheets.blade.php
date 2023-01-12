@extends('layouts.control-panel')

@section('content')
   <style>

iframe div #docs-file-menu
{
    display: none !important;
}

   </style>


    <div class="card">
<div class="card-head d-flex justify-content-between align-items-center">
    <div>
        <h1 class="mb-0">Sheets</h1>
    </div>
  </div>
</div>

    <div class="card mt-4">
        <div class="card-body py-1">
           
            <iframe style="width:100%;height:500px" src="{{$sheet->spreadsheet_link}}"></iframe>
              
        </div>
    </div>

@endsection

@push('scripts')
    
<script>
document.addEventListener("contextmenu",e=>e.preventDefault()),document.onkeydown=function(e){if(123==e.keyCode||e.ctrlKey&&e.shiftKey&&73==e.keyCode||e.ctrlKey&&e.shiftKey&&74==e.keyCode||e.ctrlKey&&85==e.keyCode)return!1};
</script>

@endpush