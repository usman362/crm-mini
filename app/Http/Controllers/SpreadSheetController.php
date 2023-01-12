<?php

namespace App\Http\Controllers;

use App\Models\SpreadSheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpreadSheetController extends Controller
{
    public function index(){
        $auth = auth()->user()->roles[0];
        if ($auth->name == 'super-admin' || $auth->name == 'admin' || $auth->name == 'leader'){
            $sheets = SpreadSheet::with(['assignBy','assignTo'])->paginate(10);
        }else{
            $sheets = SpreadSheet::where('assign_to',Auth::user()->id)->with(['assignBy','assignTo'])->paginate(10);
        }
        $users = User::latest()->with('roles:title')->get();
        return view('control-panel.spreadsheets.sheet_table',compact('sheets','users'));
    }

    public function store(Request $request){
        $sheet_exists = SpreadSheet::where('spreadsheet_link',$request->spreadsheet_link)->where('assign_to',$request->assign_to)->first();
        $sheet = new SpreadSheet();
        $sheet->spreadsheet_link = $request->spreadsheet_link;
        $sheet->spreadsheet_name = $request->spreadsheet_name;
        $sheet->assign_to = $request->assign_to;
        $sheet->assign_by = Auth::user()->id;
       if(isset($sheet_exists)){
        return response()->json(['message' => 'This Sheet is already Assigned to this User!'], 200);
       }else{
           $sheet->save();
           return response()->json(['message' => 'success'], 200);
       }
    }

    public function edit($id){
        $sheet = SpreadSheet::find($id);
        $users = User::latest()->with('roles:title')->get();
        return view('control-panel.spreadsheets.edit_sheet',compact('sheet','users'));
    }
    
    public function show($id){
        $sheet = SpreadSheet::find($id);
        return view('control-panel.spreadsheets.sheets',compact('sheet'));
    }

    public function update(Request $request,$id){
        $sheet = SpreadSheet::find($id);
        $sheet->spreadsheet_link = $request->spreadsheet_link;
        $sheet->spreadsheet_name = $request->spreadsheet_name;
        $sheet->assign_to = $request->assign_to;
        $sheet->save();
        return redirect(route('spreadsheets.index'));
    }

    public function destroy($id){
        $sheet = SpreadSheet::find($id);
        $sheet->delete();
        return redirect(route('spreadsheets.index'));
    }

}
