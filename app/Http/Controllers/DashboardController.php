<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClients = \App\Models\Client::count();
        $totalWorkOrders = \App\Models\WorkOrder::where('status', 'En proceso')->count();
        $monthlyIncome = \App\Models\Invoice::whereMonth('issue_date', now()->month)->sum('total');
        $lastWorkOrders = \App\Models\WorkOrder::orderBy('created_at', 'desc')->take(5)->get();
        // Para el gráfico de ingresos de los últimos 6 meses
        $incomeByMonth = \App\Models\Invoice::selectRaw('DATE_FORMAT(issue_date, "%Y-%m") as month, SUM(total) as total')
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->take(6)
            ->pluck('total', 'month')
            ->reverse();
        // Recuento de presupuestos pendientes
        $pendingQuotes = \App\Models\Quote::where('status', 'pendiente')->count();
        return view('dashboard.index', compact('totalClients', 'totalWorkOrders', 'monthlyIncome', 'lastWorkOrders', 'incomeByMonth', 'pendingQuotes'));
    }
}
