@extends('layouts.control-panel')

@section('content')
    <div class="mb-2">
        @php
            $auth = auth()->user()->roles[0];
        @endphp
        @if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader' || $auth->name == 'user')
            <div class="d-flex justify-content-between">
                <a class="btn btn-success bg-gradient" href="{{ route('content-details.create') }}">
                    Create Content Detail
                </a>
            </div>

            <div class="mt-2 rounded" style="border: 1px solid #cacaca; ">
                <div class="card-head d-flex justify-content-between">
                    <h1 class="mb-0">
                        Import CSV
                    </h1>
                    @if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader')
                        <a class="btn btn-success d-flex justify-content-center align-items-center"
                            href="{{ route('content-export') }}">Export</a>
                    @endif
                </div>
                <form action="{{ route('content-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group p-4" style="display: flex; align-items: center ">
                        <div class="custom-file text-left" style="margin-right: 20px">
                            <input type="file" name="file" class="custom-file-input form-control" id="customFile">
                            {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                        </div>
                        <button class="btn btn-primary">Upload</button>
                    </div>
                    {{-- @if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader')
                        <a class="btn btn-success" href="{{ route('content-export') }}">Export data</a>
                    @endif --}}
                </form>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-body py-1">
            @if ($contents->isEmpty())
                <div class="pt-3 pb-2">
                    <h4 class="text-muted">No Data found.</h4>
                </div>
            @else
                <div class="table-responsive text-nowrap">
                    <table class="table-hover table align-middle table-striped table-bordered">
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
                                <th>Editor Flag</th>
                                <th>Plagiarism</th>
                                <th>Approval</th>
                                <th>Client Feedback</th>
                                <th>Clarity Tab</th>
                                @if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader')
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>{{ \Carbon\Carbon::parse($content->date)->format('d-m-Y') }}</td>
                                    <td>{{ $content->task_id }}</td>
                                    <td>{{ $content->clients->name ?? '' }}</td>
                                    <td>{{ $content->link }}</td>
                                    <td>{{ $content->productType->product_type ?? '' }}</td>
                                    <td>{{ $content->productType->per_word_credit ?? '' }}</td>
                                    <td>{{ $content->expected_word_count }}</td>
                                    <td>{{ $content->writer_word_count }}</td>
                                    <td>{{ (float) $content->productType->per_word_credit * (float) $content->writer_word_count }}
                                    </td>
                                    <td><span class="badge badge-pill badge-{{$content->writer_flag == 'red' ? 'danger' : ($content->writer_flag == 'yellow' ? 'warning' : ($content->writer_flag == 'green' ? 'success' : 'orange')) }}">{{ $content->writer_flag }}</span></td>
                                    <td>{{ $content->assign->name ?? '' }}</td>
                                    <td>{{ $content->editor_word_count }}</td>
                                    <td><span class="badge badge-pill badge-{{$content->editor_flag == 'red' ? 'danger' : ($content->editor_flag == 'yellow' ? 'warning' : ($content->editor_flag == 'green' ? 'success' : 'orange')) }}">{{ $content->editor_flag }}</span></td>
                                    <td>{{ $content->plagiarism }}</td>
                                    <td><span class="badge badge-pill badge-{{$content->approval == 'chargeback' ? 'danger' : ($content->approval == 'refund' ? 'warning' : ($content->approval == 'accepted' ? 'success' : 'info')) }}">{{ $content->approval }}</span></td>
                                    <td>{{ $content->client_feedback }}</td>
                                    <td>{{ $content->clarity_tab }}</td>
                                    @if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader')
                                        <td>
                                            <x-buttons.anchor :href="route('content-details.edit', $content->id)" content="Edit" size="small"
                                                color="warning" />

                                            <x-buttons.form :action="route('content-details.destroy', $content->id)" content="Delete" size="small"
                                                color="danger" />
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $contents->links() }}
            @endif
        </div>
    </div>

@endsection


@push('scripts')
    <script type="text/javascript">
        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('content-details.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'payment_mode',
                        name: 'payment_mode'
                    },
                    {
                        data: 'source',
                        name: 'source'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'brand',
                        name: 'brand'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                ]
            });

        });
    </script>
@endpush
