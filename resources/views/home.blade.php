@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 d-flex flex-column">
                            <a href="/cashbooks" class="btn btn-primary btn-lg m-2">Restaurant</a>
                            <a href="" class="btn btn-primary btn-lg m-2">Traiteur</a>
                            <a href="" class="btn btn-primary btn-lg m-2">Livraison</a>
                            <a href="" class="btn btn-primary btn-lg m-2">Statistiques</a>
                        </div>
                        <div class="col-md-6 d-flex flex-column">
                            <a href="/employees" class="btn btn-primary btn-lg m-2">Employes</a>
                            <a href="/equipments" class="btn btn-primary btn-lg m-2">Equipments</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
