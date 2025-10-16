@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Vehículos</h1>
    <form method="GET" action="{{ route('vehicles.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por marca, modelo, patente o VIN" value="{{ $search }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <a href="{{ route('vehicles.create') }}" class="btn btn-success mb-3">Nuevo Vehículo</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Patente</th>
                <th>VIN</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->client->name }} {{ $vehicle->client->last_name }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->license_plate }}</td>
                    <td>{{ $vehicle->vin_number }}</td>
                    <td>
                        <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este vehículo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $vehicles->appends(['search' => $search])->links() }}
</div>
@endsection
