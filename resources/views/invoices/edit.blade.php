@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Factura</h1>
    <form method="POST" action="{{ route('invoices.update', $invoice) }}">
        @csrf
        @method('PUT')
        @include('invoices.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
