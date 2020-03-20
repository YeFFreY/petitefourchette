  @csrf
  <input type="hidden" name="type" value="{{ $type }}">

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="d-flex align-items-center">
    <div class="flex-fill p-2">
      <label for="description">Description</label>
      <input type="text" name="description" id="description" class="form-control" required>
    </div>
    <div class="p-2">
      <label for="amount">Amount</label>
      <div class="input-group">
        <input type="text" name="amount" id="amount" class="form-control" required>
        <div class="input-group-append">
          <span class="input-group-text">€</span>
        </div>
      </div>
      
    </div>
    <div class="p-2 align-self-end">
    <button type="submit" class="btn {{$type == 'INCOME' ? 'btn-outline-success' : 'btn-outline-danger'}}">{{ $buttonText }}</button>
    </div>
  </div>