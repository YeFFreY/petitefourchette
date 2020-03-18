@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h1>Caisses</h1>
      <a href="/cashbooks/create" class="btn btn-secondary">Start Caisse</a>
    </div>
      @forelse ($cashbooks as $cashbook)
        <div class="card mb-2" >
          <div class="card-body">
            <h5 class="card-title"><a href="{{ $cashbook->path() }}">{{$cashbook->start_at->format('Y-m-d H:00')}} <small>Service : {{$cashbook->service_id}}</small></a></h5>
            <div class="card-text">
              <p>Start balance : Not implemented</p>
              <p>End balance : Not implemented</p>
            </div>
          </div>
        </div>
      @empty
        <p>No caisses yet.</p>
      @endforelse
  </div>
@endsection
