<div class="list-group">
  <a class="list-group-item list-group-item-action @if ($activeTaskNav == 'documents') active @endif"
    href="{{ route('tasks.documents.index', $task) }}">Documents</a>
{{-- </div> --}}

@can('viewAny', App\Models\ContentDetail::class)
{{-- <div class="list-group"> --}}
  <a class="list-group-item list-group-item-action @if ($activeTaskNav == 'content-detail') active @endif"
    href="{{ route('tasks.content-detail.index', $task) }}">Content Detail</a>
{{-- </div> --}}
@endcan


{{-- <div class="list-group"> --}}
  <a class="list-group-item list-group-item-action @if ($activeTaskNav == 'comments') active @endif"
    href="{{ route('tasks.comments.index', $task) }}">Comments</a>
</div>
