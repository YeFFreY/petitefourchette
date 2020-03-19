@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex align-items-center justify-content-between mb-2">
    <div>
      <h1 class="mb-0">{{$cashbook->start_at->format('Y-m-d')}}</h1>
      <p class="lead">Service started at {{$cashbook->start_at->format('H:i')}} ({{$cashbook->service_id}})</p>
    </div>
    
    <div>
      <a href="/cashbooks" class="btn btn-secondary">Caisses List</a>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-md-12">
      <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
        <h2>Income</h2>
        <div class="h2 text-success">{{ number_format($cashbook->totalIncomes(),2, ',', '.') }} €</div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr class="d-flex">
            <th class="col-6">Description</th>
            <th class="col-2">When</th>
            <th class="col-2">Amount</th>
            <th class="col-2"></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($cashbook->incomes() as $income)
          <tr class="d-flex">
            <td class="col-6">{{ $income->description }}</td>
            <td class="col-2">{{ $income->created_at->format('H:i') }}</td>
            <td class="col-2">{{ number_format($income->amount,2, ',', '.') }} €</td>
            <td class="col-2">
              <a href="" class="btn btn-outline-secondary btn-sm">Edit</a>
              <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4">No incomes</td>
          </tr>
          @endforelse
        </tbody>
      </table>
      <div class="border p-2 bg-white">
        <form method="POST" action="{{$cashbook->path() . '/transactions'}}">
          @include('cashbooks.transactions.form', [
            'type' => 'INCOME',
            'buttonText' => 'Add Income'
            ])
        </form>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-md-12">
      <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
        <h2>Expense</h2>
        <div class="h2 text-danger">{{ number_format($cashbook->totalExpenses(),2, ',', '.') }} €</div>
      </div>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="col-6">Description</th>
            <th class="col-2">When</th>
            <th class="col-2">Amount</th>
            <th class="col-2"></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($cashbook->expenses() as $expense)
          <tr>
            <td class="col-6">{{ $expense->description }}</td>
            <td class="col-2">{{ $expense->created_at->format('H:i') }}</td>
            <td class="col-2">{{ number_format($expense->amount,2, ',', '.') }} €</td>
            <td class="col-2">
              <a href="" class="btn btn-outline-secondary btn-sm">Edit</a>
              <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
            </td>

          </tr>
          @empty
          <tr>
            <td colspan="4">No expenses</td>
          </tr>
          @endforelse
      </table>
      <div class="border p-2 bg-white">
        <form method="POST" action="{{$cashbook->path() . '/transactions'}}">
          @include('cashbooks.transactions.form', [
            'type' => 'EXPENSE',
            'buttonText' => 'Add Expense'
            ])
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="d-flex justify-content-between align-items-center p-4 shadow rounded">
        <div class="h2 mb-0">Current Balance : <span class="{{$cashbook->balance() < 0 ? 'text-danger' : 'text-success'}}">{{ number_format($cashbook->balance(),2, ',', '.') }} €</span></div>
        <a href="" class="btn btn-danger btn-lg">Close</a>
      </div>
    </div>
  </div>

</div>
@endsection