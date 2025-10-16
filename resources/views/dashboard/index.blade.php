<!-- Vista: Dashboard principal. Muestra métricas, gráficos y accesos rápidos a los módulos principales. -->
@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Título del panel -->
    <h1 class="mb-4">Panel de Administración</h1>
    <!-- Métricas principales: clientes, OTs y ingresos -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Clientes registrados</h5>
                    <p class="card-text display-4">{{ $totalClients }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">OTs en proceso</h5>
                    <p class="card-text display-4">{{ $totalWorkOrders }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Ingresos del mes</h5>
                    <p class="card-text display-4">${{ number_format($monthlyIncome, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Gráfico de ingresos y últimas OTs -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Ingresos últimos 6 meses</h5>
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Últimas 5 OTs</h5>
                    <ul class="list-group">
                        <!-- Listado de las últimas órdenes de trabajo -->
                        @foreach($lastWorkOrders as $wo)
                            <li class="list-group-item">#{{ $wo->id }} - {{ $wo->status }} - {{ $wo->created_at->format('d/m/Y') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Accesos rápidos a creación de entidades -->
    <div class="mb-4">
        <a href="{{ route('clients.create') }}" class="btn btn-outline-primary">Crear Cliente</a>
        <a href="{{ route('work-orders.create') }}" class="btn btn-outline-success">Nueva OT</a>
        <a href="{{ route('quotes.create') }}" class="btn btn-outline-info">Nuevo Presupuesto</a>
    </div>
</div>
<!-- Script para el gráfico de ingresos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('incomeChart').getContext('2d');
    const incomeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($incomeByMonth->toArray())) !!},
            datasets: [{
                label: 'Ingresos',
                data: {!! json_encode(array_values($incomeByMonth->toArray())) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
