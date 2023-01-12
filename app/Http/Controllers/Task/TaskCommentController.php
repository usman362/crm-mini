<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\TaskComment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
       
        $this->authorize('view', $task);
        $auth = auth()->user()->roles[0];
        if($auth->name == 'user'){
            $comments = TaskComment::with('user','task')->where('task_id',$task->id)->paginate(10);
        }else{
            $comments = TaskComment::with('user','task')->where('task_id',$task->id)->paginate(10);
        }
       
        return view('control-panel.tasks.show.comments.comment', [
            'task' => $task,
            'comments' => $comments,
        ]);
    }

    public function store(Request $request, Task $task)
    {
        $comment = TaskComment::create([
        'task_id' => $task->id,
        'user_id' => Auth::user()->id,
        'comment' => $request->comment,
        ]);
        return back();
    }

}
