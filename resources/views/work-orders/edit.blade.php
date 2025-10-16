@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Orden de Trabajo</h1>
    <form method="POST" action="{{ route('work-orders.update', $workOrder) }}">
        @csrf
        @method('PUT')
        @include('work-orders.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('work-orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
