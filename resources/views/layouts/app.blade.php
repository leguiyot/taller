<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Taller')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print, .navbar, .btn, form[action], .navbar-brand {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Taller Mecánico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('clients.index') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vehicles.index') }}">Vehículos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('parts.index') }}">Repuestos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('quotes.index') }}">Presupuestos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('work-orders.index') }}">Órdenes de Trabajo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('invoices.index') }}">Facturación</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><span class="nav-link">{{ Auth::user()->name }}</span></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Salir</button>
                        </form>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Ingresar</a></li>
                </ul>
                @endauth
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
