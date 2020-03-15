@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Add an evaluation to {{$employee->first_name}} {{ $employee->last_name}} </h1>

  <form method="POST" action="{{ $employee->path() . '/evaluations' }}">

  @include('employees.evaluations.form', [
      'employee' => $employee,
      'evaluation' => new App\EmployeeEvaluation,
      'buttonText' => 'Save evaluation'
      ])

  </form>

</div>

@endsection
  