@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Órdenes de Trabajo</h1>
    <form method="GET" action="{{ route('work-orders.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por descripción o estado" value="{{ $search }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <a href="{{ route('work-orders.create') }}" class="btn btn-success mb-3">Nueva Orden de Trabajo</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Vehículo</th>
                <th>Presupuesto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workOrders as $workOrder)
                <tr>
                    <td>{{ $workOrder->id }}</td>
                    <td>{{ $workOrder->client->name }} {{ $workOrder->client->last_name }}</td>
                    <td>{{ $workOrder->vehicle->brand }} {{ $workOrder->vehicle->model }}</td>
                    <td>{{ $workOrder->quote ? $workOrder->quote->id : '-' }}</td>
                    <td>{{ $workOrder->status }}</td>
                    <td>
                        <a href="{{ route('work-orders.show', $workOrder) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('work-orders.edit', $workOrder) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" onclick="window.print();return false;" class="btn btn-secondary btn-sm">Imprimir</a>
                        <form action="{{ route('work-orders.destroy', $workOrder) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta orden de trabajo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $workOrders->appends(['search' => $search])->links() }}
</div>
@endsection
