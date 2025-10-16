@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Repuesto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $part->name }}</h5>
            <p class="card-text"><strong>SKU:</strong> {{ $part->sku }}</p>
            <p class="card-text"><strong>Descripción:</strong> {{ $part->description }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $part->stock }}</p>
            <p class="card-text"><strong>Precio:</strong> ${{ number_format($part->price, 2) }}</p>
            <a href="{{ route('parts.edit', $part) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('parts.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
