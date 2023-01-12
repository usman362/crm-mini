<div class="row">

  <div class="mb-3 col-md-4">
    <x-forms.text name="name" label="Name" :value="optional($organization)->name" />
</div>
<div class="mb-3 col-md-4">
  <x-forms.text name="address" label="Address" :value="optional($organization)->address" />
</div>
<div class="mb-3 col-md-4">
  <x-forms.text name="website" label="Website" :value="optional($organization)->website" />
</div>
<div class="mb-3 col-md-12">
  <x-forms.textarea name="description" label="Description" :value="optional($organization)->description" />
</div>
{{-- <div class="mb-3 col-md-12">
  <textarea name="description" label="Description">{{ optional($organization)->description }}</textarea>
</div> --}}
</div>