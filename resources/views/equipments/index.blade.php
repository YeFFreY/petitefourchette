@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h1>Equipments</h1>
      <a href="/equipments/create" class="btn btn-secondary">New Equipment</a>
    </div>
      @forelse ($equipments as $equipment)
        <div class="card mb-2" >
          <div class="card-body">
            <h5 class="card-title"><a href="{{ $equipment->path() }}">{{$equipment->name}}</a></h5>
            <p class="card-text">{{ $equipment->reference }}</p>
          </div>
        </div>
      @empty
        <p>No equipments yet.</p>
      @endforelse
  </div>
@endsection
