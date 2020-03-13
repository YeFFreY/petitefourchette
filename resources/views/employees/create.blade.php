@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Register an employee</h1>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div><br />
@endif

  <form method="POST" action="/employees">

  @include('employees.form', [
      'employee' => new App\Employee,
      'buttonText' => 'Register Employee'
      ])

  </form>

</div>

@endsection
  