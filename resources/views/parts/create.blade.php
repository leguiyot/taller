@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Repuesto</h1>
    <form method="POST" action="{{ route('parts.store') }}">
        @csrf
        @include('parts.partials.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('parts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
