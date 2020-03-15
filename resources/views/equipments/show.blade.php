@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h1>{{ $equipment->name }}</h1>
      <div>
        <a href="{{ route('equipments.edit',$equipment->id) }}" class="btn btn-outline-primary">Edit</a>
        <a href="/equipments" class="btn btn-secondary">Equipments List</a>
      </div>
    </div>
    <div class="form-group">
      <label>Reference</label>
      <p class="form-control-plaintext">{{ $equipment->reference }}</p>
    </div>
  </div>
@endsection
