
@props(['contentDetails'])


@error('name')
  <x-alerts.toast :message="$message" color="danger" />
@enderror

@if ($contentDetails->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No Content Detail found.</h4>
  </div>
@else
  <div class="table-responsive">
    <table class="table-hover table align-middle">
      <thead>
        <tr>
          <th>Id</th>
          <th>Date</th>
          <th>Task Id</th>
          <th>Client</th>
          <th>Link</th>
          <th>Product Type</th>
          <th>Per Word Credit</th>
          <th>Expected Word Count</th>
          <th>Writer Word Count</th>
          <th>Writer Word (Converted)</th>
          <th>Writer Flag</th>
          <th>Editor Assigned</th>
          <th>Editor Word Count</th>
          <th>Writer Flag</th>
          <th>Plagiarism</th>
          <th>Approval</th>
          <th>Client Feedback</th>
          <th>Clarity Tab</th>
          @can('editAny', App\Models\ContentDetail::class)
          <th>Actions</th>
          @elsecan('deleteAny', App\Models\ContentDetail::class)
          <th>Actions</th>
          @endcan
        </tr>
      </thead>
      <tbody>
        @foreach ($contentDetails as $content)
          <tr>
          <td>{{ $content->id }}</td>
          <td>{{ $content->date }}</td>
            <td>{{ $content->task_id }}</td>
            <td>{{ $content->clients->name ?? '' }}</td>
            <td>{{ $content->link }}</td>
            <td>{{ $content->productType->product_type ?? ''}}</td>
            <td>{{ $content->productType->per_word_credit ?? '' }}</td>
            <td>{{ $content->expected_word_count }}</td>
            <td>{{ $content->writer_word_count }}</td>
            <td>{{ (float)$content->productType->per_word_credit * (float)$content->writer_word_count}}</td>
            <td>{{ $content->writer_flag }}</td>
            <td>{{ $content->assign->name ?? '' }}</td>
            <td>{{ $content->editor_word_count }}</td>
            <td>{{ $content->editor_flag }}</td>
            <td>{{ $content->plagiarism }}</td>
            <td>{{ $content->approval }}</td>
            <td>{{ $content->client_feedback }}</td>
            <td>{{ $content->clarity_tab }}</td>
            @can('editAny', App\Models\ContentDetail::class)
            <td>
              @can('editAny', App\Models\ContentDetail::class)
              <x-buttons.anchor :href="route('task.content-detail.edit',$content)" content="Edit" size="small" color="warning" />
              @endcan
              @can('deleteAny', App\Models\ContentDetail::class)
              <x-buttons.form :action="route('task.content-detail.destroy',$content)" content="Delete" size="small" color="danger" />
              @endcan
            </td>
            @elsecan('deleteAny', App\Models\ContentDetail::class)
            <td>
              @can('editAny', App\Models\ContentDetail::class)
              <x-buttons.anchor :href="route('task.content-detail.edit',$content)" content="Edit" size="small" color="warning" />
              @endcan
              @can('deleteAny', App\Models\ContentDetail::class)
              <x-buttons.form :action="route('task.content-detail.destroy',$content)" content="Delete" size="small" color="danger" />
              @endcan
            </td>
            @endcan
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $contentDetails->links() }}
@endif
