<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $vehicles = Vehicle::with('client')
            ->when($search, function ($query, $search) {
                $query->where('brand', 'like', "%$search%")
                      ->orWhere('model', 'like', "%$search%")
                      ->orWhere('license_plate', 'like', "%$search%")
                      ->orWhere('vin_number', 'like', "%$search%") ;
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('vehicles.index', compact('vehicles', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = \App\Models\Client::all();
        return view('vehicles.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->validated());
        return redirect()->route('vehicles.index')->with('success', 'Vehículo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        $vehicle->load('client');
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $clients = \App\Models\Client::all();
        return view('vehicles.edit', compact('vehicle', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());
        return redirect()->route('vehicles.index')->with('success', 'Vehículo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehículo eliminado correctamente.');
    }
}
