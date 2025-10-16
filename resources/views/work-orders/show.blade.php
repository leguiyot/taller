@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Orden de Trabajo</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">OT #{{ $workOrder->id }}</h5>
            <p class="card-text"><strong>Cliente:</strong> {{ $workOrder->client->name }} {{ $workOrder->client->last_name }}</p>
            <p class="card-text"><strong>Vehículo:</strong> {{ $workOrder->vehicle->brand }} {{ $workOrder->vehicle->model }} ({{ $workOrder->vehicle->year }})</p>
            <p class="card-text"><strong>Presupuesto:</strong>
                @if($workOrder->quote)
                    <span>ID #{{ $workOrder->quote->id }}</span><br>
                    <span><strong>Descripción:</strong> {{ $workOrder->quote->description }}</span><br>
                    <span><strong>Total:</strong> ${{ number_format($workOrder->quote->total_amount, 2) }}</span>
                @else
                    -
                @endif
            </p>
            <p class="card-text"><strong>Descripción:</strong> {{ $workOrder->description }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $workOrder->status }}</p>
            <a href="{{ route('work-orders.edit', $workOrder) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('work-orders.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
