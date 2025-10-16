@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Vehículo</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->year }})</h5>
            <p class="card-text"><strong>Cliente:</strong> {{ $vehicle->client->name }} {{ $vehicle->client->last_name }}</p>
            <p class="card-text"><strong>Patente:</strong> {{ $vehicle->license_plate }}</p>
            <p class="card-text"><strong>VIN:</strong> {{ $vehicle->vin_number }}</p>
            <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
