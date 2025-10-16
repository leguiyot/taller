@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Repuestos</h1>
    <form method="GET" action="{{ route('parts.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o SKU" value="{{ $search }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <a href="{{ route('parts.create') }}" class="btn btn-success mb-3">Nuevo Repuesto</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>SKU</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parts as $part)
                <tr>
                    <td>{{ $part->name }}</td>
                    <td>{{ $part->sku }}</td>
                    <td>{{ $part->description }}</td>
                    <td>{{ $part->stock }}</td>
                    <td>${{ number_format($part->price, 2) }}</td>
                    <td>
                        <a href="{{ route('parts.show', $part) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('parts.edit', $part) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" onclick="window.print();return false;" class="btn btn-secondary btn-sm">Imprimir</a>
                        <form action="{{ route('parts.destroy', $part) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este repuesto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $parts->appends(['search' => $search])->links() }}
</div>
@endsection
