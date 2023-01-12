@extends('layouts.control-panel')

@section('content')
<!-- <div class="card-group"> -->
<div class="row gap-2 mx-1">
  @foreach ($statistics as $entity => $count)
  <div class="card col-md-2" style="background-image: linear-gradient( #ffcec4,#fff); border:1px solid #ffcec4">
    <div class="row p-2">

      <div class="col-md-12 d-flex justify-content-center align-items-center mb-2 ">
        <div class="card-icon">
          @if ($entity == 'Writers')
          <i class="fa fa-user"></i>
          @elseif($entity == 'Clients')
          <i class="fa fa-male"></i>
          @elseif($entity == 'Organizations')
          <i class="fa fa-building" style="font-size: 32px"></i>
          @elseif($entity == 'Projects')
          <i class="fa fa-file-text-o" style="font-size: 32px"></i>
          @elseif($entity == 'Tasks')
          <i class="fa fa-tasks" style="font-size: 32px" ></i>
          @endif
        </div>
        <!-- sfdsfdsf -->
      </div>
      <div class="card-body col-md-12 text-center p-0">
        <h4 class="card-title m-0">{{ $count }}</h4>
        <p class="card-text"><small class="text-muted">{{ $entity }}</small></p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection