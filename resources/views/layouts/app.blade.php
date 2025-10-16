<!--
    Layout principal de la aplicación.
    Incluye el sidebar de navegación y el área de contenido principal.
    El sidebar muestra los módulos principales del sistema y el usuario logueado.
    El área de contenido se rellena con las vistas específicas de cada módulo.
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos y recursos globales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Taller')</title>
    <!-- Bootstrap para estilos modernos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Oculta elementos no deseados al imprimir */
        @media print {
            .no-print, .navbar, .btn, form[action], .navbar-brand {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar de navegación vertical -->
        <nav class="sidebar bg-dark text-white vh-100 p-3" style="min-width:220px;">
            <!-- Nombre de la aplicación y enlace a inicio -->
            <a class="navbar-brand text-white mb-4 d-block" href="{{ url('/') }}">Taller Mecánico</a>
            @auth
            <ul class="nav flex-column mb-auto">
                <!-- Dashboard: Muestra el panel principal con métricas y gráficos -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
                <!-- Clientes: Acceso al listado y gestión de clientes -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('clients.index') }}">Clientes</a></li>
                <!-- Vehículos: Acceso al listado y gestión de vehículos -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('vehicles.index') }}">Vehículos</a></li>
                <!-- Repuestos: Acceso al listado y gestión de repuestos -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('parts.index') }}">Repuestos</a></li>
                <!-- Presupuestos: Acceso al listado y gestión de presupuestos -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('quotes.index') }}">Presupuestos</a></li>
                <!-- Órdenes de Trabajo: Acceso al listado y gestión de órdenes de trabajo -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('work-orders.index') }}">Órdenes de Trabajo</a></li>
                <!-- Facturación: Acceso al listado y gestión de facturas -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('invoices.index') }}">Facturación</a></li>
            </ul>
            <!-- Sección de usuario logueado y botón de salir -->
            <div class="mt-auto">
                <span class="d-block mb-2">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm w-100" type="submit">Salir</button>
                </form>
            </div>
            @else
            <!-- Menú para usuarios no autenticados -->
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Ingresar</a></li>
            </ul>
            @endauth
        </nav>
        <!-- Área de contenido principal -->
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
