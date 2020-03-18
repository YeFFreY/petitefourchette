@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="text-primary">{{$cashbook->start_at->format('Y-m-d H:00')}} <small>Service :
        {{$cashbook->service_id}}</small></h1>
    <div>
      <a href="/cashbooks" class="btn btn-secondary">Caisses List</a>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-md-12">
      <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
        <h2>Income</h2>
        <a href="" class="btn btn-outline-success">Add Income</a>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Description</th>
            <th>When</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Starting Balance</td>
            <td>15:00</td>
            <td>1500 €</td>
          </tr>
        </tbody>
      </table>
      <div>
        <div>Total: 1500€</div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-md-12">
      <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
        <h2>Expense</h2>
        <a href="" class="btn btn-outline-danger">Add Expense</a>
      </div>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Description</th>
            <th>When</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Avances Personnel</td>
            <td>16:00</td>
            <td>500 €</td>
          </tr>
        </tbody>
      </table>
      <div>
        <div>Total: 500€</div>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="d-flex justify-content-between align-items-center p-4 shadow rounded">
        <div>Current Balance : 1000€</div>
        <a href="" class="btn btn-danger btn-lg">Close</a>
      </div>
    </div>
  </div>

</div>
@endsection