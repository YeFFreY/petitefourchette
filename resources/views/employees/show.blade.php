@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h1 class="text-primary">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
      <div>
        <a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-outline-primary">Edit</a>
        <a href="/employees" class="btn btn-secondary">Employees List</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Email</label>
          <p class="form-control-plaintext">{{ $employee->email }}</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Phone number</label>
          <p class="form-control-plaintext">{{ $employee->phone_number }}</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Address</label>
          <p class="form-control-plaintext">{{ $employee->address }}</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Start date</label>
        <p class="form-control-plaintext">{{ $employee->start_date }}</p>
      </div>
      <div class="form-group col-md-6">
        <label>End date</label>
        <p class="form-control-plaintext">{{ $employee->end_date ?: 'Ongoing' }}</p>
      </div>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
      <h2>Evaluations</h2>
      <a href="{{ $employee->path() . '/evaluations/create' }}" class="btn btn-outline-primary">Add Evaluation</a>
    </div>
    @forelse ($employee->evaluations as $evaluation)
      <div class="card mb-2">
        <div class="card-body">
          <div class="card-text">{{ $evaluation->body }}</div>
          <form method="POST" action="{{ $evaluation->path() }}" class="d-flex justify-content-end">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </div>
      </div>
    @empty
      <p>No evaluations yet.</p>
    @endforelse

    <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
      <h2>Equipments</h2>
    </div>
    <p>Not yet implemented</p>
  </div>
@endsection
