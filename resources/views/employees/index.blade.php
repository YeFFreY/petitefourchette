@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h1>Employees</h1>
      <a href="/employees/create" class="btn btn-secondary">New Employee</a>
    </div>
    <ul>
      @forelse ($employees as $employee)
        <li>
          <a href="{{ $employee->path() }}">{{$employee->first_name}} {{$employee->last_name}}</a>
        </li>
      @empty
        <li>No employees yet.</li>
      @endforelse
    </ul>
  </div>
@endsection
