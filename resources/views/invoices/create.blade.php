@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Factura</h1>
    <form method="POST" action="{{ route('invoices.store') }}">
        @csrf
        @include('invoices.partials.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
