@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Cliente</h1>
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf
        @include('clients.partials.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
