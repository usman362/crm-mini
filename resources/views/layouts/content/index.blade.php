@section('import_export')
  <x-content.import_export :action="$action"/>
@endsection

@can('create', App\Models\ContentDetail::class)
@section('add_content')
@include('components.content.add_button')
@endsection
@endcan

@section('table')
    <x-content.table :contentDetails="$contentDetails" />
@endsection
