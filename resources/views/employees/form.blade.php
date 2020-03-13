
  @csrf

  <div class="form-group">
    <label for="first_name">First name</label>
  <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employee->first_name }}">
  </div>
  <div class="form-group">
    <label for="last_name">Last name</label>
    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employee->last_name }}">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}">
  </div>
  <div class="form-group">
    <label for="phone_number">Phone number</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $employee->phone_number }}">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea name="address" id="address" class="form-control">{{ $employee->address }}</textarea>
  </div>
  <div class="form-group">
    <label for="start_date">Start date</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $employee->start_date }}">
  </div>
  <div class="form-group">
    <label for="end_date">End date</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $employee->end_date }}">
  </div>
  <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
  <a href="{{ $employee->path() }}" class="btn btn-secondary">Cancel</a>
