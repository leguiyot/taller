@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>
    <form method="POST" action="{{ route('clients.update', $client) }}">
        @csrf
        @method('PUT')
        @include('clients.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
