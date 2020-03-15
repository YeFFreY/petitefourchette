@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit equipment</h1>


<form method="POST" action="{{ $equipment->path() }}">
  @method('PATCH')

  @include('equipments.form', [
    'buttonText' => 'Update Equipment'
  ])

</form>
</div>

@endsection
  