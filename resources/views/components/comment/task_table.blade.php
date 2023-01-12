
@props(['comments','action'])


@error('name')
  <x-alerts.toast :message="$message" color="danger" />
@enderror

@if ($comments->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No Comment found.</h4>
  </div>
@else
  <div class="table-responsive">
    <table class="table-hover table align-middle">
      <thead>
        <tr>
          <th>Comment</th>
          <th>Comment by</th>
          <th>Comment at</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($comments as $comment)
          <tr>
          <td>{{$comment->comment}}</td>
          <td>{{$comment->user->name}}</td>
          <td>{{$comment->created_at}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $comments->links() }}
@endif

@include('control-panel.tasks.show.comments.form')
