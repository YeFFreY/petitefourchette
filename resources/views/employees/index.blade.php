<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Employees</h1>
  <ul>
    @forelse ($employees as $employee)
      <li>
        <a href="{{ $employee->path() }}">{{$employee->first_name}} {{$employee->last_name}}</a>
      </li>
    @empty
      <li>No employees yet.</li>
    @endforelse
  </ul>
</body>
</html>