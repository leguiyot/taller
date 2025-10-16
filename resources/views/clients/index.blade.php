@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Clientes</h1>
    <!-- Formulario para búsqueda de clientes -->
    <form method="GET" action="{{ route('clients.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, apellido o DNI" value="{{ $search }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <!-- Botón para crear un nuevo cliente -->
    <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Nuevo Cliente</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- Tabla con la lista de clientes -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Recorre todos los clientes y muestra sus datos -->
            @forelse($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->last_name }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->address }}</td>
                    <td>
                        <!-- Botón para ver detalles -->
                        <a href="{{ route('clients.show', $client) }}" class="btn btn-info btn-sm">Ver</a>
                        <!-- Botón para editar -->
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm">Editar</a>
                        <!-- Botón para eliminar -->
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No hay clientes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Paginación -->
    {{ $clients->appends(['search' => $search])->links() }}
</div>
@endsection
