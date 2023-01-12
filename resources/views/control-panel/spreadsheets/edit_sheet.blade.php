@extends('layouts.control-panel')

@section('content')

<div class="card">
    <div class="card-head d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-0">Update Sheets</h1>
        </div>
      </div>
    </div>
    
        <div class="card mt-4">
            <div class="card-body py-1">
               
                <form action="{{route('spreadsheets.update',$sheet->id)}}" method="post">
                    @csrf
                    <div class="mb-3 col-md-12">
                        <label for="sheet_name" class="form-label">Spreadsheet Name</label>
                        <input type="text" id="sheet_name" name="spreadsheet_name" value="{{old('spreadsheet_name',$sheet->spreadsheet_name)}}" class="form-control" placeholder="Assignment">
                      </div>    
                    <div class="mb-3 col-md-12">
                            <label for="sheet_link" class="form-label">Spreadsheet Link</label>
                            <input type="url" id="sheet_link" name="spreadsheet_link" value="{{old('spreadsheet_link',$sheet->spreadsheet_link)}}" class="form-control" placeholder="https://docs.google.com/spreadsheets/d/xxxx">
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="assign_to" class="form-label">Assign to</label>
                           <select name="assign_to" id="assign_to" class="form-control">
                            <option value="">Select Writer</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}" @selected(old('assign_to',$sheet->assign_to) == $user->id)>{{$user->name}}</option>
                            @endforeach
                           </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Update</button>  
                       
                    </form>
                  
            </div>
        </div>

@endsection