@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Repuesto</h1>
    <form method="POST" action="{{ route('parts.update', $part) }}">
        @csrf
        @method('PUT')
        @include('parts.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('parts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
