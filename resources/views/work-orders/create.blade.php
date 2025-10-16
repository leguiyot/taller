@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Orden de Trabajo</h1>
    <form method="POST" action="{{ route('work-orders.store') }}">
        @csrf
        @include('work-orders.partials.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('work-orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
