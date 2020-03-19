@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h1>Caisses</h1>
      <a href="/cashbooks/create" class="btn btn-secondary">Start Caisse</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Started at</th>
          <th>Ended at</th>
          <th>Service</th>
          <th>Balance</th>
        </tr>
      </thead>
      <tbody>
      @forelse ($cashbooks->sortByDesc('start_at') as $cashbook)
      <tr>
        <td><a href="{{ $cashbook->path() }}">{{$cashbook->start_at->format('Y-m-d')}}</a></td>
        <td>{{$cashbook->start_at->format('H:i')}}</td>
        <td>{{optional($cashbook->end_at)->format('H:i')}}</td>
        <td>{{$cashbook->service_id}}</td>
      <td class="{{$cashbook->balance() < 0 ? 'text-danger' : 'text-success'}}">{{number_format($cashbook->balance(),2, ',', '.')}} €</td>
      </tr>
      @empty
        <tr>
          <td colspan="5">No caisses yet.</td>
        </tr>
      @endforelse
    </tbody>
    </table>
  </div>
@endsection
