<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <ul>
    @foreach ($employees as $employee)
        <li>{{$employee->email}}</li>
    @endforeach
  </ul>
</body>
</html>