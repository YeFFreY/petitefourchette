@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create equipment</h1>

  <form method="POST" action="/equipments">

  @include('equipments.form', [
      'equipment' => new App\Equipment,
      'buttonText' => 'Create Equipment'
      ])

  </form>

</div>

@endsection
  