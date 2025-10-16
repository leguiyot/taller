@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Facturas</h1>
    <form method="GET" action="{{ route('invoices.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por total, fecha o impuesto" value="{{ $search }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <a href="{{ route('invoices.create') }}" class="btn btn-success mb-3">Nueva Factura</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>OT</th>
                <th>Total</th>
                <th>Impuesto</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->client_id }}</td>
                    <td>{{ $invoice->work_order_id }}</td>
                    <td>${{ number_format($invoice->total, 2) }}</td>
                    <td>${{ number_format($invoice->tax_amount, 2) }}</td>
                    <td>{{ $invoice->issue_date }}</td>
                    <td>
                        <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" onclick="window.print();return false;" class="btn btn-secondary btn-sm">Imprimir</a>
                        <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta factura?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $invoices->appends(['search' => $search])->links() }}
</div>
@endsection
