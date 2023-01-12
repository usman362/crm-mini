<div class="card">
  <div class="card-head d-flex justify-content-between align-items-center">
    <div>
      {{-- <h6 class="card-subtitle text-muted ">Project Title :</h6> --}}
      <h1 class="mb-0">{{ $project->title }}</h1>
    </div>
    <div>
      @can('update', $project)
        <x-buttons.anchor :href="route('projects.edit', $project)" content="Edit project" size="small" color="warning" class="my-1" />
      @endcan
      @can('delete', $project)
        <x-buttons.form :action="route('projects.destroy', $project)" content="Delete project" size="small" color="danger" class="my-1" />
      @endcan
    </div>
  
  </div>
  @php
    $statuses = App\Models\Status::all();
@endphp
  <div class="card-body d-flex pt-4">
    {{-- <div class="col-3 pe-2">
      <div class="mb-3 ">
        <h6 class="card-subtitle text-muted ">Project Title :</h6>
        <h2 class="card-subtitle">{{ $project->title }}</h2>
      </div> --}}
      {{-- <div>
        @can('update', $project)
          <x-buttons.anchor :href="route('projects.edit', $project)" content="Edit project" size="small" color="warning" class="my-1" />
        @endcan
        @can('delete', $project)
          <x-buttons.form :action="route('projects.destroy', $project)" content="Delete project" size="small" color="danger" class="my-1" />
        @endcan
      </div> --}}
    {{-- </div> --}}
    <div class="col-2 mb-3">
      <div class="mb-3 ">
        <h6 class="card-subtitle text-muted " >Client :</h6>
        <h6 class="card-subtitle">
          @can('view', $project->client)
            <a href="{{ route('clients.show', $project->client) }}">{{ $project->client->name }}</a>
          @else
            <p class="my-auto">{{ $project->client->name }}</p>
          @endcan
        </h6>
      </div>
      <div class="align-bottom ">
        <h6 class="card-subtitle text-muted " >Manager :</h6>
        <h6 class="card-subtitle">
          @isset($project->manager)
            @can('view', $project->manager)
              <a href="{{ route('users.show', $project->manager) }}">{{ $project->manager->name }}</a>
            @else
              <p class="my-auto">{{ $project->manager->name }}</p>
            @endcan
          @else
            Deleted user
          @endisset
        </h6>
      </div>
    </div>
    <div class="col-2 mb-3">
      <div class="mb-3 ">
        <h6 class="card-subtitle text-muted " >Deadline :</h6>
        <h6 class="card-subtitle">{{ $project->deadline->toDateString() }}</h6>
      </div>
      <div class="mb-3 ">
        <h6 class="card-subtitle text-muted " >Created at :</h6>
        <h6 class="card-subtitle">{{ $project->created_at->toDateString() }}</h6>
      </div>
      <div class="align-bottom ">
        <h6 class="card-subtitle text-muted " >Status :</h6>
        <h6 class="card-subtitle">
          @foreach ($statuses as $status)

        <a href="javascript:void(0)" data-status_id="{{$status->id}}" data-status_name="{{$status->name}}" data-id="{{$project->id}}" class="badge project-status badge-{{$status->name == 'Open' ? ($project->status->id == $status->id ? 'success' : 'success-outline') : ($status->name == 'Closed' ? ($project->status->id == $status->id ? 'warning' : 'warning-outline') : ($project->status->id == $status->id ? 'danger' : 'danger-outline'))}} {{$status->name}}">{{$status->name}}</a> 
        
        @endforeach
        </h6>
      </div>
    </div>
    <div class=" ">
      <h6 class="card-subtitle text-muted " >Description :</h6>
      <div class="card-subtitle task-Description">{!! $project->description !!}</div>
      {{-- <p class="card-subtitle">{{ $project->description }}</p> --}}
    </div>




   
  </div>


</div>

<script>

  $('.project-status').click(function(){
  
  let status_id = $(this).data('status_id');
  let status_name = $(this).data('status_name');
  let project_id = $(this).data('id');
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
     
  $.ajax({
             type:'POST',
             url:"{{ route('project.status') }}",
             data:{status_id:status_id,project_id:project_id},
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
