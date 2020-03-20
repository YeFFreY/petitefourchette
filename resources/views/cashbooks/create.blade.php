@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-center">
    <div class="bg-white shadow rounded p-4 col-6">
      <h1>Start Caisse</h1>

      <form method="POST" action="/cashbooks">

        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <div class="form-group">
          <label for="start_at">Date</label>
          <input type="text" readonly class="form-control-plaintext" name="start_at" id="start_at" value="{{ now() }}">
        </div>
        <div class="form-group">
          <label for="service_id">Service</label>
          <select class="form-control" name="service_id" id="service_id">
            <option value="Midi">Midi</option>
            <option value="Soirée">Soirée</option>
            <option value="Continu">Continu</option>
          </select>
        </div>
        <div class="form-group">
          <label for="initial_balance">Initial Balance</label>
          <div class="input-group">
            <input type="text" class="form-control" name="initial_balance" id="initial_balance">
            <div class="input-group-append">
              <span class="input-group-text">€</span>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success mr-2">Start</button>
          <a href="{{ $cashbook->path() }}" class="btn btn-secondary">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection