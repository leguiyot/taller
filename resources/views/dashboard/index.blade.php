<!-- Vista: Dashboard principal. Muestra métricas y accesos rápidos a los módulos principales. -->
@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Cards pastel y botones modernos */
        .card-custom-blue {
            background: #e3f2fd;
            color: #263238;
            border: none;
        }
        .card-custom-green {
            background: #e8f5e9;
            color: #263238;
            border: none;
        }
        .card-custom-cyan {
            background: #e0f7fa;
            color: #263238;
            border: none;
        }
        .btn-custom-blue {
            background: #1976d2;
            color: #fff;
            border: none;
        }
        .btn-custom-blue:hover {
            background: #1565c0;
            color: #fff;
        }
        .btn-custom-green {
            background: #388e3c;
            color: #fff;
            border: none;
        }
        .btn-custom-green:hover {
            background: #2e7d32;
            color: #fff;
        }
        .btn-custom-cyan {
            background: #0288d1;
            color: #fff;
            border: none;
        }
        .btn-custom-cyan:hover {
            background: #0277bd;
            color: #fff;
        }
    </style>
    <!-- Título del panel -->
    <h1 class="mb-4">Panel de Administración</h1>
    <!-- Métricas principales: OTs en proceso y presupuestos pendientes -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card card-custom-blue mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Orden en proceso</h5>
                    <p class="card-text display-4">{{ $totalWorkOrders }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom-cyan mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Presupuestos pendientes</h5>
                    <p class="card-text display-4">{{ $pendingQuotes }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Accesos rápidos a creación de entidades con botones personalizados -->
    <div class="mb-4 d-flex gap-2">
        <!-- Botón Bootstrap para crear cliente -->
        <a href="{{ route('clients.create') }}" class="btn btn-custom-blue px-4 py-2 rounded">
            <i class="bi bi-person-plus"></i> Crear Cliente
        </a>
        <!-- Botón Bootstrap para nueva OT -->
        <a href="{{ route('work-orders.create') }}" class="btn btn-custom-green px-4 py-2 rounded">
            <i class="bi bi-wrench"></i> Nueva OT
        </a>
        <!-- Botón Bootstrap para nuevo presupuesto -->
        <a href="{{ route('quotes.create') }}" class="btn btn-custom-cyan px-4 py-2 rounded">
            <i class="bi bi-file-earmark-text"></i> Nuevo Presupuesto
        </a>
    </div>
    <!-- Panel para agregar usuarios -->
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <div class="card card-custom-green shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3"><i class="bi bi-person-plus"></i> Agregar Usuario</h5>
                    <a href="{{ route('users.create') }}" class="btn btn-custom-green px-4 py-2 rounded">
                        <i class="bi bi-person-plus"></i> Nuevo Usuario
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Iconos Bootstrap (opcional, si quieres íconos en los botones) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
