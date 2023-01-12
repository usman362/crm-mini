@extends('layouts.form')

@section('title')
  Create Content Detail
@endsection

@section('action')
  {{ route('content-details.store') }}
@endsection

@section('input-fields')
  @include('control-panel.content_details.partials.input-fields', [
      'content' => null,
      'products' => $products,
      'tasks' => $tasks,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Create" color="success" />
@endsection