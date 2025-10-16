<!-- Vista: Formulario para crear un nuevo cliente. Permite ingresar los datos y guardarlos en el sistema. -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Cliente</h1>
    <!-- Formulario de alta de cliente -->
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf
        <!-- Campos del formulario (nombre, apellido, etc.) -->
        @include('clients.partials.form')
        <!-- Botón para guardar el cliente -->
        <button type="submit" class="btn btn-success">Guardar</button>
        <!-- Botón para cancelar y volver al listado -->
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
