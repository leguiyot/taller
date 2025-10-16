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
    <!-- Iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* Oculta elementos no deseados al imprimir */
        @media print {
            .no-print, .navbar, .btn, form[action], .navbar-brand {
                display: none !important;
            }
        }
        /* Sidebar moderno con degradado y sombra */
        .sidebar {
            background: linear-gradient(135deg, #263238 60%, #1976d2 100%);
            box-shadow: 2px 0 12px rgba(0,0,0,0.08);
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }
        /* Ítems del menú con bordes y transición */
        .sidebar .nav-link {
            border-radius: 8px;
            margin-bottom: 6px;
            color: #fff !important;
            transition: background 0.2s, color 0.2s;
            padding: 10px 18px;
            font-weight: 500;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: #e3f2fd;
            color: #1976d2 !important;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.08);
        }
        .sidebar .navbar-brand {
            font-size: 1.4rem;
            font-weight: bold;
            letter-spacing: 1px;
            text-shadow: 0 2px 8px rgba(25, 118, 210, 0.08);
        }
        /* Botón de salir con hover personalizado */
        .sidebar .btn-outline-light {
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar .btn-outline-light:hover {
            background: #1976d2;
            color: #fff;
            border-color: #1976d2;
        }
        .sidebar .user-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 32px;
            margin-bottom: 16px;
        }
        .sidebar .user-icon {
            font-size: 2.2rem;
            color: #e3f2fd;
            margin-bottom: 8px;
        }
        .sidebar .mt-auto {
            margin-top: 64px !important;
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
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i> Inicio</a></li>
                <!-- Clientes: Acceso al listado y gestión de clientes -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('clients.index') }}"><i class="bi bi-people"></i> Clientes</a></li>
                <!-- Vehículos: Acceso al listado y gestión de vehículos -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('vehicles.index') }}"><i class="bi bi-truck"></i> Vehículos</a></li>
                <!-- Repuestos: Acceso al listado y gestión de repuestos -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('parts.index') }}"><i class="bi bi-gear"></i> Repuestos</a></li>
                <!-- Presupuestos: Acceso al listado y gestión de presupuestos -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('quotes.index') }}"><i class="bi bi-file-earmark-text"></i> Presupuestos</a></li>
                <!-- Órdenes de Trabajo: Acceso al listado y gestión de órdenes de trabajo -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('work-orders.index') }}"><i class="bi bi-clipboard-check"></i> Órdenes de Trabajo</a></li>
                <!-- Facturación: Acceso al listado y gestión de facturas -->
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('invoices.index') }}"><i class="bi bi-receipt"></i> Facturación</a></li>
            </ul>
            <!-- Sección de usuario logueado con ícono -->
            <div class="user-section">
                <span class="user-icon"><i class="bi bi-person-circle"></i></span>
                <span class="d-block mb-2">{{ Auth::user()->name }}</span>
            </div>
            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm w-100" type="submit">Salir</button>
                </form>
            </div>
            @else
            <!-- Menú para usuarios no autenticados -->
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Ingresar</a></li>
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
