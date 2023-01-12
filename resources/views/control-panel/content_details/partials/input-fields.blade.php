<div class="row">

    <div class="mb-3 col-md-4">
      <x-forms.date name="date" label="Date" :value="optional($content)->date" />
  </div>
  {{-- <div class="mb-3 col-md-4">
    <x-forms.text name="client" label="Client" :value="optional($content)->client" />
  </div> --}}
  <div class="mb-3 col-md-4">
    <x-forms.text name="link" label="Link" :value="optional($content)->link" />
  </div>
  <div class="mb-3 col-md-4">
    <x-forms.select name="product_type" label="Product Type" :options="$products" :selected="optional(optional($content)->product_type)->id" required/>
  </div>
  @if ($tasks != null)
  <div class="mb-3 col-md-4">
    <x-forms.select name="task_id" label="Task" :options="$tasks" :selected="optional(optional($content)->task)->id" />
  </div>
  @endif
  <div class="mb-3 col-md-4">
    <x-forms.number name="expected_word_count" label="Expected Word Count" :value="optional($content)->expected_word_count" />
  </div>
  <div class="mb-3 col-md-4">
    <x-forms.number name="writer_word_count" label="Writer Word Count" :value="optional($content)->writer_word_count" />
  </div>
  <div class="mb-3 col-md-4">
  <label class="form-label">Writer Flag</label>
  <select class="form-control" name="writer_flag">
      <option value="red" {{isset($content->writer_flag) ? ($content->writer_flag == 'red' ? 'selected' : '') : ''}}>Red</option>
      <option value="orange" {{isset($content->writer_flag) ? ($content->writer_flag == 'orange' ? 'selected' : '') : ''}}>Orange</option>
      <option value="yellow" {{isset($content->writer_flag) ? ($content->writer_flag == 'yellow' ? 'selected' : '') : ''}}>Yellow</option>
      <option value="green" {{isset($content->writer_flag) ? ($content->writer_flag == 'green' ? 'selected' : '') : ''}}>Green</option>
  </select>
  </div>
  {{-- <div class="mb-3 col-md-4">
    <x-forms.text name="editor_assingned" label="Editor Assigned" :value="optional($content)->editor_assingned" />
  </div> --}}
  <div class="mb-3 col-md-4">
    <x-forms.number name="editor_word_count" label="Editor Word Count" :value="optional($content)->editor_word_count" />
  </div>
  <div class="mb-3 col-md-4">
    <label class="form-label">Editor Flag</label>
    <select class="form-control" name="editor_flag">
        <option value="red" {{isset($content->editor_flag) ? ($content->editor_flag == 'red' ? 'selected' : '') : ''}}>Red</option>
        <option value="orange" {{isset($content->editor_flag) ? ($content->editor_flag == 'orange' ? 'selected' : '') : ''}}>Orange</option>
        <option value="yellow" {{isset($content->editor_flag) ? ($content->editor_flag == 'yellow' ? 'selected' : '') : ''}}>Yellow</option>
        <option value="green" {{isset($content->editor_flag) ? ($content->editor_flag == 'green' ? 'selected' : '') : ''}}>Green</option>
    </select>
</div>
  <div class="mb-3 col-md-4">
    <x-forms.text name="plagiarism" label="Plagiarism" :value="optional($content)->plagiarism" />
  </div>
  <div class="mb-3 col-md-4">
    <label class="form-label">Approval</label>
    <select class="form-control" name="approval">
        <option value="accepted" {{isset($content->approval) ? ($content->approval == 'accepted' ? 'selected' : '') : ''}}>Accepted</option>
        <option value="revision" {{isset($content->approval) ? ($content->approval == 'revision' ? 'selected' : '') : ''}}>Revision</option>
        <option value="refund" {{isset($content->approval) ? ($content->approval == 'refund' ? 'selected' : '') : ''}}>Refund</option>
        <option value="chargeback" {{isset($content->approval) ? ($content->approval == 'chargeback' ? 'selected' : '') : ''}}>Chargeback</option>
    </select>
</div>
  <div class="mb-3 col-md-4">
    <x-forms.text name="clarity_tab" label="Clarity Tab" :value="optional($content)->clarity_tab" />
  </div>
  <div class="mb-3 col-md-4">
    <x-forms.textarea name="client_feedback" label="Client Feedback" :value="optional($content)->client_feedback" />
  </div>

  </div>