
  @csrf

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
  @endif

  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control">{{ $evaluation->body }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
  <a href="{{ $employee->path() }}" class="btn btn-secondary">Cancel</a>
