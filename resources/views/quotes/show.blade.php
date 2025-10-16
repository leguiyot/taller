@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Presupuesto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Presupuesto #{{ $quote->id }}</h5>
            <p class="card-text"><strong>Cliente:</strong> {{ $quote->client->name ?? '-' }} {{ $quote->client->last_name ?? '' }}</p>
            <p class="card-text"><strong>Vehículo:</strong> {{ $quote->vehicle->brand ?? '-' }} {{ $quote->vehicle->model ?? '' }} ({{ $quote->vehicle->year ?? '' }}) - Patente: {{ $quote->vehicle->license_plate ?? '-' }}</p>
            <p class="card-text"><strong>Descripción:</strong> {{ $quote->description }}</p>
            <p class="card-text"><strong>Total:</strong> ${{ number_format($quote->total_amount, 2) }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $quote->status }}</p>
            <a href="{{ route('quotes.edit', $quote) }}" class="btn btn-warning no-print">Editar</a>
            <a href="{{ route('quotes.index') }}" class="btn btn-secondary no-print">Volver</a>
            <button onclick="window.print();return false;" class="btn btn-info no-print">Imprimir</button>
        </div>
    </div>
</div>
@endsection
