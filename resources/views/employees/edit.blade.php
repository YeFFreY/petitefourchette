@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit employee</h1>


<form method="POST" action="{{ $employee->path() }}">
  @method('PATCH')

  @include('employees.form', [
    'buttonText' => 'Update Employee'
  ])

</form>
</div>

@endsection
  