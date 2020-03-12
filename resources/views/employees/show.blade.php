@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h1>{{ $employee->first_name }} {{ $employee->last_name }}</h1>
      <div>
        <a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-outline-primary">Edit</a>
        <a href="/employees" class="btn btn-secondary">Go Back</a>
      </div>
    </div>
    <div class="form-group">
      <label>Email</label>
      <p class="form-control-plaintext">{{ $employee->email }}</p>
    </div>
    <div class="form-group">
      <label>Phone number</label>
      <p class="form-control-plaintext">{{ $employee->phone_number }}</p>
    </div>
    <div class="form-group">
      <label>Address</label>
      <p class="form-control-plaintext">{{ $employee->address }}</p>
    </div>
    <div class="form-group">
      <label>Start date</label>
      <p class="form-control-plaintext">{{ $employee->start_date }}</p>
    </div>
    <div class="form-group">
      <label>End date</label>
      <p class="form-control-plaintext">{{ $employee->end_date }}</p>
    </div>

  </div>
@endsection
