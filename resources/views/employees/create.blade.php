@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Register an employee</h1>

  <form method="POST" action="/employees">

  @include('employees.form', [
      'employee' => new App\Employee,
      'buttonText' => 'Register Employee'
      ])

  </form>

</div>

@endsection
  