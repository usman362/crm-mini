<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Models\ContentDetail;
use App\Models\ProductType;
use App\Models\Task;
use App\Services\DocumentService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class TaskContentDetailController extends Controller
{
    public function index(Task $task)
    {
       
        $this->authorize('view', $task);
        $auth = auth()->user()->roles[0];
        if ($auth->name == 'user') {
            $contentDetails = ContentDetail::with('productType','user','clients','task','assign')->where('task_id',$task->id)->where('editor_assigned',auth()->user()->id)->paginate(10);       
        }else{
        $contentDetails = ContentDetail::with('productType','user','clients','task','assign')->where('task_id',$task->id)->paginate(10);
        }
        return view('control-panel.tasks.show.contents.content', [
            'task' => $task,
            'contentDetails' => $contentDetails,
        ]);
    }


    public function create(Task $task){
        $products = ProductType::pluck('id', 'product_type');
        return view('control-panel.tasks.show.contents.add_content',compact('products','task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Document\StoreDocumentRequest  $request
     * @param  \App\Models\Task  $Task
     * @param  \App\Services\DocumentService  $documentService
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $product = ContentDetail::create([
        'date' => $request->date,
        'task_id' => $task->id,
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
        return redirect('tasks/'.$task->id.'/content-detail');
    }

    public function edit($id){
        $products = ProductType::pluck('id', 'product_type');
        $content = ContentDetail::find($id);
        return view('control-panel.tasks.show.contents.edit_content',compact('products','content'));
    }
    public function update(Request $request, $id)
    {
        $product = ContentDetail::find($id);
        
        $product->update([
            'date' => $request->date,
            // 'client' => $request->client,
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
            return redirect('tasks/'.$product->task_id.'/content-detail');
    }

    public function destroy($id)
    {
        $content = ContentDetail::find($id)->delete();
        return back();
    }
}
