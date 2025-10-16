@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Presupuestos</h1>
    <a href="{{ route('quotes.create') }}" class="btn btn-primary mb-3">Nuevo Presupuesto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Vehículo</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($quotes as $quote)
                <tr>
                    <td>{{ $quote->id }}</td>
                    <td>{{ $quote->client->name ?? '-' }}</td>
                    <td>{{ $quote->vehicle->plate ?? '-' }}</td>
                    <td>{{ $quote->created_at->format('d/m/Y') }}</td>
                    <td>${{ number_format($quote->total, 2) }}</td>
                    <td>
                        <a href="{{ route('quotes.show', $quote) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('quotes.edit', $quote) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" onclick="window.print();return false;" class="btn btn-secondary btn-sm">Imprimir</a>
                        <form action="{{ route('quotes.destroy', $quote) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este presupuesto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay presupuestos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
