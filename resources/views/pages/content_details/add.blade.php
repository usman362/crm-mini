@extends('layouts.control-panel')
@section('content')
    <div class="card">
        <div class="card-head">
            <h1 class="mt-1">Add Content Detail</h1>
        </div>
        <div class="card-body">
            <!-- <hr> -->
            <form action="{{ route('content-details.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4" style="margin: 0 auto;">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Client</label>
                            <input type="text" class="form-control" name="client">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" name="link">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Product Type</label>
                            <select class="form-control" name="product_type">

                                <option value="">Select Product Type</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Expected Word Count</label>
                            <input type="number" class="form-control" name="expected_word_count">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Writer Word Count</label>
                            <input type="number" class="form-control" name="writer_word_count">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Writer Flag</label>
                            <select class="form-control" name="writer_flag">
                                <option value="red">Red</option>
                                <option value="orange">Orange</option>
                                <option value="yellow">Yellow</option>
                                <option value="green">Green</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Editor Assigned</label>
                            <input type="text" class="form-control" name="editor_assingned">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Editor Word Count</label>
                            <input type="number" class="form-control" name="editor_word_count">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Editor Flag</label>
                            <select class="form-control" name="editor_flag">
                                <option value="red">Red</option>
                                <option value="orange">Orange</option>
                                <option value="yellow">Yellow</option>
                                <option value="green">Green</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Plagiarism</label>
                            <input type="text" class="form-control" name="plagiarism">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Approval</label>
                            <select class="form-control" name="approval">
                                <option value="accepted">Accepted</option>
                                <option value="revision">Revision</option>
                                <option value="refund">Refund</option>
                                <option value="chargeback">Chargeback</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Clarity Tab</label>
                            <input type="text" class="form-control" name="clarity_tab">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Client Feedback</label>
                            <textarea type="text" class="form-control" name="client_feedback"></textarea>
                        </div>
                        <div class="col-md-12 mt-4 text-left">
                            <button type="submit" class="btn btn-primary">Add data</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
