@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Factura</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Factura #{{ $invoice->id }}</h5>
            <p class="card-text"><strong>OT:</strong> {{ $invoice->work_order_id }}</p>
            <p class="card-text"><strong>Cliente:</strong> {{ $invoice->client_id }}</p>
            <p class="card-text"><strong>Total:</strong> ${{ number_format($invoice->total, 2) }}</p>
            <p class="card-text"><strong>Impuesto:</strong> ${{ number_format($invoice->tax_amount, 2) }}</p>
            <p class="card-text"><strong>Fecha:</strong> {{ $invoice->issue_date }}</p>
            <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
