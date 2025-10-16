<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $parts = Part::when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('sku', 'like', "%$search%") ;
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('parts.index', compact('parts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StorePartRequest $request)
    {
        $part = Part::create($request->validated());
        return redirect()->route('parts.index')->with('success', 'Repuesto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Part $part)
    {
        return view('parts.show', compact('part'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Part $part)
    {
        return view('parts.edit', compact('part'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdatePartRequest $request, Part $part)
    {
        $part->update($request->validated());
        return redirect()->route('parts.index')->with('success', 'Repuesto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part)
    {
        $part->delete();
        return redirect()->route('parts.index')->with('success', 'Repuesto eliminado correctamente.');
    }
}
