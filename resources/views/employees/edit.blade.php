@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit employee</h1>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div><br />
@endif

<form method="POST" action="{{ $employee->path() }}">
  @method('PATCH')

  @include('employees.form', [
    'buttonText' => 'Update Employee'
  ])

</form>
</div>

@endsection
  