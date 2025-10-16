@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Vehículo</h1>
    <form method="POST" action="{{ route('vehicles.update', $vehicle) }}">
        @csrf
        @method('PUT')
        @include('vehicles.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
