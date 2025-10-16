<!-- Vista: Detalle de cliente. Muestra toda la información de un cliente específico. -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Cliente</h1>
    <div class="card">
        <div class="card-body">
            <!-- Nombre y apellido del cliente -->
            <h5 class="card-title">{{ $client->name }} {{ $client->last_name }}</h5>
            <!-- DNI, email, teléfono y dirección -->
            <p class="card-text"><strong>DNI:</strong> {{ $client->dni }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $client->phone }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $client->address }}</p>
            <!-- Botón para editar el cliente -->
            <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning no-print">Editar</a>
            <!-- Botón para volver al listado -->
            <a href="{{ route('clients.index') }}" class="btn btn-secondary no-print">Volver</a>
            <!-- Botón para imprimir la ficha del cliente -->
            <button onclick="window.print();return false;" class="btn btn-info no-print">Imprimir</button>
        </div>
    </div>
</div>
@endsection
