@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Vehículo</h1>
    <form method="POST" action="{{ route('vehicles.store') }}">
        @csrf
        @include('vehicles.partials.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
