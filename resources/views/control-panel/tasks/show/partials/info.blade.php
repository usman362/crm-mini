<div class="card">
  <div class="card-head d-flex justify-content-between align-items-center">
    <div >
      {{-- <h6 class="card-subtitle text-muted mb-1">Task title</h6> --}}
      <h1 class="mb-0">{{ $task->title }}</h1>
    </div>
    <div>
      @can('update', $task)
        <x-buttons.anchor :href="route('tasks.edit', $task)" content="Edit task" size="small" color="warning" class="my-1" />
      @endcan
      @can('delete', $task)
        <x-buttons.form :action="route('tasks.destroy', $task)" content="Delete task" size="small" color="danger" class="my-1" />
      @endcan
    </div>
  
  </div>

@php
    $statuses = App\Models\Status::all();
@endphp

  <div class="card-body d-flex pt-4">
    {{-- <div class="col-3 pe-2"> --}}
      {{-- <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Task title</h6>
        <h2 class="card-subtitle">{{ $task->title }}</h2>
      </div> --}}
      {{-- <div>
        @can('update', $task)
          <x-buttons.anchor :href="route('tasks.edit', $task)" content="Edit task" size="small" color="warning" class="my-1" />
        @endcan
        @can('delete', $task)
          <x-buttons.form :action="route('tasks.destroy', $task)" content="Delete task" size="small" color="danger" class="my-1" />
        @endcan
      </div> --}}
    {{-- </div> --}}
    <div class="col-2 px-3">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Project</h6>
        <h6 class="card-subtitle">
          <a href="{{ route('projects.show', $task->project) }}">{{ $task->project->title }}</a>
        </h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Assigned</h6>
        <h6 class="card-subtitle">
          @isset($task->user)
            @can('view', $task->user)
              <a href="{{ route('users.show', $task->user) }}">{{ $task->user->name }}</a>
            @else
              <p class="my-auto">{{ $task->user->name }}</p>
            @endcan
          @else
            Deleted user
          @endisset
        </h6>
      </div>
    </div>
    <div class="col-2 px-3">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Deadline</h6>
        <h6 class="card-subtitle">{{ $task->deadline->toDateString() }}</h6>
      </div>
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Created at</h6>
        <h6 class="card-subtitle">{{ $task->created_at->toDateString() }}</h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Status</h6>
        <h6 class="card-subtitle">
        @foreach ($statuses as $status)

        <a href="javascript:void(0)" data-status_id="{{$status->id}}" data-status_name="{{$status->name}}" data-id="{{$task->id}}" class="badge task-status badge-{{$status->name == 'Open' ? ($task->status->id == $status->id ? 'success' : 'success-outline') : ($status->name == 'Closed' ? ($task->status->id == $status->id ? 'warning' : 'warning-outline') : ($task->status->id == $status->id ? 'danger' : 'danger-outline'))}} {{$status->name}}">{{$status->name}}</a> 
        
        @endforeach

        </h6>
      </div>
    </div>
    <div class="ps-2">
      <h6 class="card-subtitle text-muted mb-1">Description</h6>
      <div class="card-subtitle task-Description">{!! $task->description !!}</div>
      {{-- <p class="card-subtitle">{{ $task->description }}</p> --}}
    </div>
  </div>
</div>

<script>

$('.task-status').click(function(){

let status_id = $(this).data('status_id');
let status_name = $(this).data('status_name');
let task_id = $(this).data('id');
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
$.ajax({
           type:'POST',
           url:"{{ route('task.status') }}",
           data:{status_id:status_id,task_id:task_id},
           success:function(data){
             if (status_name == 'Open') {
              $('.Open').removeClass('badge-success-outline');
              $('.Open').addClass('badge-success');
              $('.In-Progress').addClass('badge-danger-outline');
              $('.In-Progress').removeClass('badge-danger');
              $('.Closed').addClass('badge-warning-outline');
              $('.Closed').removeClass('badge-warning');
             } else if(status_name == 'In-Progress') {
              $('.Open').addClass('badge-success-outline');
              $('.Open').removeClass('badge-success');
              $('.In-Progress').removeClass('badge-danger-outline');
              $('.In-Progress').addClass('badge-danger');
              $('.Closed').addClass('badge-warning-outline');
              $('.Closed').removeClass('badge-warning');
             }else{
              $('.Open').addClass('badge-success-outline');
              $('.Open').removeClass('badge-success');
              $('.In-Progress').addClass('badge-danger-outline');
              $('.In-Progress').removeClass('badge-danger');
              $('.Closed').removeClass('badge-warning-outline');
              $('.Closed').addClass('badge-warning');
             }
           }
        });

});



</script>
