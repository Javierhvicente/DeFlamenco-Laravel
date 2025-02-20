@extends('main')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear Cliente</h1>
        <div class="card">
            <div class="card-body">
                @include('clientes.form-create')
            </div>
        </div>
    </div>
@endsection
