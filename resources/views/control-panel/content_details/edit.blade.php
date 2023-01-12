@extends('layouts.form')

@section('title')
  Edit Content Detail
@endsection

@section('action'){{route('content-details.update',$content)}}@endsection
@section('method')
@method('PUT')
@endsection

@section('input-fields')
  @include('control-panel.content_details.partials.input-fields', [
      'content' => $content,
      'products' => $products,
      'tasks' => $tasks,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Update" color="success" />
@endsection