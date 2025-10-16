@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Clientes</h1>
    <form method="GET" action="{{ route('clients.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, apellido o DNI" value="{{ $search }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Nuevo Cliente</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
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
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->last_name }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->address }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clients->appends(['search' => $search])->links() }}
</div>
@endsection
