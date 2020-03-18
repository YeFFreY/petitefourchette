@extends('layouts.app')

@section('content')
<div class="container">
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
      <input type="text" class="form-control" name="initial_balance" id="initial_balance">
    </div>
    <button type="submit" class="btn btn-primary">Validate</button>
    <a href="{{ $cashbook->path() }}" class="btn btn-secondary">Cancel</a>


  </form>

</div>

@endsection