<?php

namespace App\Http\Controllers;

use App\Exports\ContentDetailExport;
use App\Imports\ContentDetailImport;
use App\Models\ContentDetail;
use App\Models\ProductType;
use App\Models\Task;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ContentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $auth = auth()->user()->roles[0];
        if ($auth->name == 'user') {
            $contents = ContentDetail::with('productType','user','clients','task','assign')->where('editor_assigned',auth()->user()->id)->paginate(10);
        }else{
            $contents = ContentDetail::with('productType','user','clients','task','assign')->paginate(10);
        }
        
        
        return view('control-panel.content_details.index',compact('contents','auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ProductType::pluck('id', 'product_type');
        $tasks = Task::pluck('id','title'); 
        return view('control-panel.content_details.add',compact('products','tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'date|required',
        ]);
        $length = 6;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $task = Task::find($request->task_id);
        $product = ContentDetail::create([
        'date' => $request->date,
        'task_id' => $request->task_id,
        'client' => $task->project->client_id ?? '',
        'link' => $request->link,
        'product_type' => $request->product_type,
        'expected_word_count' => $request->expected_word_count,
        'writer_word_count' => $request->writer_word_count,
        'writer_flag' => $request->writer_flag,
        'editor_assigned' => $task->user_id,
        'editor_word_count' => $request->editor_word_count,
        'editor_flag' => $request->editor_flag,
        'plagiarism' => $request->plagiarism,
        'approval' => $request->approval,
        'client_feedback' => $request->client_feedback,
        'clarity_tab' => $request->clarity_tab,
        'user_id' => auth()->user()->id,
        ]);
        return redirect('content-details');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = ContentDetail::with('productType')->find($id);
        $products = ProductType::pluck('id', 'product_type');
        $tasks = Task::pluck('id','title'); 
        return view('control-panel.content_details.edit',compact('products','content','tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'date|required',
        ]);
        $product = ContentDetail::find($id)->update([
        'date' => $request->date,
        // 'client' => $request->client,
        'task_id' => $request->task_id,
        'link' => $request->link,
        'product_type' => $request->product_type,
        'expected_word_count' => $request->expected_word_count,
        'writer_word_count' => $request->writer_word_count,
        'writer_flag' => $request->writer_flag,
        'editor_word_count' => $request->editor_word_count,
        'editor_flag' => $request->editor_flag,
        'plagiarism' => $request->plagiarism,
        'approval' => $request->approval,
        'client_feedback' => $request->client_feedback,
        'clarity_tab' => $request->clarity_tab,
        ]);
        return redirect('content-details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = ContentDetail::find($id)->delete();
        return back();
    }

    public function fileImport(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        Excel::import(new ContentDetailImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport()
    {
        $auth = auth()->user()->roles[0];
        if ($auth->name == 'user'){
            return back()->with('error','You have Not Allow to Export Data');     
        }else{
            return Excel::download(new ContentDetailExport, 'content-details.xlsx');            
        }

    }

}
