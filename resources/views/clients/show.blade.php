@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Cliente</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $client->name }} {{ $client->last_name }}</h5>
            <p class="card-text"><strong>DNI:</strong> {{ $client->dni }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $client->phone }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $client->address }}</p>
            <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning no-print">Editar</a>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary no-print">Volver</a>
            <button onclick="window.print();return false;" class="btn btn-info no-print">Imprimir</button>
        </div>
    </div>
</div>
@endsection
