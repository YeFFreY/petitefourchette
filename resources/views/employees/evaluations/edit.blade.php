@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit evaluation</h1>


<form method="POST" action="{{ $evaluation->path() }}">
  @method('PATCH')

  @include('employees.evaluations.form', [
    'employee' => $evaluation->employee,
    'evaluation' => $evaluation,
    'buttonText' => 'Save evaluation'
    ])


</form>
</div>

@endsection
  