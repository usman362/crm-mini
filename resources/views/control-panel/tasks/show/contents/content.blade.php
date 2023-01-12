@extends('control-panel.tasks.show.layout', [
    'task' => $task,
    'activeTaskNav' => 'content-detail',
])

@include('layouts.content.index', [
    'action' => route('content-import'),
    'add_content' => route('tasks.content-detail.create',$task),
    'contentDetails' => $contentDetails,
])
