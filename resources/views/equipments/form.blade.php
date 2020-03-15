
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
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $equipment->name }}" required>
  </div>
  <div class="form-group">
    <label for="reference">Reference</label>
    <input type="text" name="reference" id="reference" class="form-control" value="{{ $equipment->reference }}" required>
  </div>
  <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
  <a href="{{ $equipment->path() }}" class="btn btn-secondary">Cancel</a>
