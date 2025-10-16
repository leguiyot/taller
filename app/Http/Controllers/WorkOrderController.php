<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $workOrders = WorkOrder::with(['client', 'vehicle', 'quote'])
            ->when($search, function ($query, $search) {
                $query->where('description', 'like', "%$search%")
                      ->orWhere('status', 'like', "%$search%") ;
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('work-orders.index', compact('workOrders', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = \App\Models\Client::all();
        $vehicles = \App\Models\Vehicle::all();
        $quotes = \App\Models\Quote::all();
        return view('work-orders.create', compact('clients', 'vehicles', 'quotes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreWorkOrderRequest $request)
    {
        $workOrder = WorkOrder::create($request->validated());
        return redirect()->route('work-orders.index')->with('success', 'Orden de trabajo creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkOrder $workOrder)
    {
        $workOrder->load(['client', 'vehicle', 'quote']);
        return view('work-orders.show', compact('workOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkOrder $workOrder)
    {
        $clients = \App\Models\Client::all();
        $vehicles = \App\Models\Vehicle::all();
        $quotes = \App\Models\Quote::all();
        return view('work-orders.edit', compact('workOrder', 'clients', 'vehicles', 'quotes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdateWorkOrderRequest $request, WorkOrder $workOrder)
    {
        $workOrder->update($request->validated());
        return redirect()->route('work-orders.index')->with('success', 'Orden de trabajo actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkOrder $workOrder)
    {
        $workOrder->delete();
        return redirect()->route('work-orders.index')->with('success', 'Orden de trabajo eliminada correctamente.');
    }
}
