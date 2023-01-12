@extends('layouts.control-panel')
@section('content')
    <div class="mb-2">
        @php
            $auth = auth()->user()->roles[0];
        @endphp
        @if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader')
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-success bg-gradient"  data-bs-toggle="modal" data-bs-target="#createAssignUser">
                    Assign Spreadsheet
                </button>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-body py-1">
            @if ($sheets->isEmpty())
                <div class="pt-3 pb-2">
                    <h4 class="text-muted">No Data found.</h4>
                </div>
            @else
                <div class="table-responsive text-nowrap">
                    <table class="table-hover table align-middle table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Spreadsheet</th>
                                <th>Assign To</th>
                                <th>Assign By</th>
                                <th>Assign Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sheets as $sheet)
                                <tr>
                                    <td>#{{ $sheet->id }}</td>
                                    <td>{{ $sheet->spreadsheet_name }}</td>
                                    <td>{{ $sheet->assignTo->name ?? '' }}</td>
                                    <td>{{ $sheet->assignBy->name ?? '' }}</td>
                                    <td>{{ $sheet->created_at->format('d-M-Y') }}</td>
                                    <td>
                                        <a href="{{route('spreadsheets.show',$sheet->id)}}" class="btn btn-primary text-white">View</a>
                                        @if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader')
                                        <a href="{{route('spreadsheets.edit',$sheet->id)}}" class="btn btn-info text-white">Edit</a>
                                        <a href="{{route('spreadsheets.delete',$sheet->id)}}" class="btn btn-danger text-white">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $sheets->links() }}
            @endif
        </div>
    </div>

    @if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader')
  <!-- Modal -->
  <div class="modal fade" id="createAssignUser" tabindex="-1" role="dialog" aria-labelledby="createAssignUserTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Assign Sheet to User</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
        
        <div class="modal-body">
            <div class="mb-3 col-md-12">
                <label for="sheet_name" class="form-label">Spreadsheet Name</label>
                <input type="text" id="sheet_name" name="spreadsheet_name" value="" class="form-control" placeholder="Assignment">
              </div>    
            <div class="mb-3 col-md-12">
                    <label for="sheet_link" class="form-label">Spreadsheet Link</label>
                    <input type="url" id="sheet_link" name="spreadsheet_link" value="" class="form-control" placeholder="https://docs.google.com/spreadsheets/d/xxxx">
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="assign_to" class="form-label">Assign to</label>
                   <select name="assign_to" id="assign_to" class="form-control">
                    <option value="">Select Writer</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                   </select>
                  </div>
                  <span class="text-danger alert-assignUser"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary create-assignUser">Create</button>
                </div>
            </form>
      </div>
    </div>
  </div>
  @endif
@endsection

@push('scripts')
    
<script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".create-assignUser").click(function(e){
  
        e.preventDefault();
   
        var spreadsheet_name = $("input[name=spreadsheet_name]").val();
        var spreadsheet_link = $("input[name=spreadsheet_link]").val();
        var assign_to = $("select[name=assign_to]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('spreadsheets.store') }}",
           data:{spreadsheet_name:spreadsheet_name, spreadsheet_link:spreadsheet_link, assign_to:assign_to},
           success:function(data){
            if (data.message == 'success') {
                location.reload();
            } else {
            $('.alert-assignUser').html(data.message);
            $('.alert-assignUser').css('font-weight','bold')
            } 
           }
        });
  
    });
</script>

@endpush