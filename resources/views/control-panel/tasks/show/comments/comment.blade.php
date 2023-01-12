@extends('control-panel.tasks.show.layout', [
    'task' => $task,
    'activeTaskNav' => 'comments',
])

@include('layouts.comment.index', [
    'action' => route('tasks.comments.store', $task),
    'comments' => $comments,
])
