@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Presupuesto</h1>
    <form method="POST" action="{{ route('quotes.update', $quote) }}">
        @csrf
        @method('PUT')
        @include('quotes.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('quotes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
