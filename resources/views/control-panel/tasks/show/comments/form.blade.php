<form action="{{$action}}" method="post" class="mt-4">
    @csrf
    <div class="form-group">
      
    <textarea name="comment" id="" class="form-control" rows="4" placeholder="Add Comment"></textarea>
  <button type="submit" class="btn btn-primary mt-2">Comment</button>
    </div>
</form>