@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h1>Employees</h1>
      <a href="/employees/create" class="btn btn-secondary">New Employee</a>
    </div>
      @forelse ($employees as $employee)
        <div class="card mb-2" >
          <div class="card-body">
            <h5 class="card-title"><a href="{{ $employee->path() }}">{{$employee->first_name}} {{$employee->last_name}}</a></h5>
            <p class="card-text">{{ $employee->email }}</p>
          </div>
        </div>
      @empty
        <p>No employees yet.</p>
      @endforelse
  </div>
@endsection
