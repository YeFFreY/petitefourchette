<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Register an employee</h1>
  <form method="POST" action="/employees">
    @csrf
    
    <div class="form-group">
      <label for="first_name">First name</label>
      <input type="text" name="first_name" id="first_name" class="form-control">
    </div>
    <div class="form-group">
      <label for="last_name">Last name</label>
      <input type="text" name="last_name" id="last_name" class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="phone_number">Phone number</label>
      <input type="text" name="phone_number" id="phone_number" class="form-control">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <textarea name="address" id="address" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="start_date">Start date</label>
      <input type="date" name="start_date" id="start_date" class="form-control">
    </div>
    <div class="form-group">
      <label for="end_date">End date</label>
      <input type="date" name="end_date" id="end_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</body>
</html>