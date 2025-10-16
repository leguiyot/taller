<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $quotes = Quote::with(['client', 'vehicle'])
            ->when($search, function ($query, $search) {
                $query->where('description', 'like', "%$search%")
                      ->orWhere('status', 'like', "%$search%") ;
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('quotes.index', compact('quotes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = \App\Models\Client::all();
        $vehicles = \App\Models\Vehicle::all();
        return view('quotes.create', compact('clients', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreQuoteRequest $request)
    {
        $quote = Quote::create($request->validated());
        return redirect()->route('quotes.index')->with('success', 'Presupuesto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        $quote->load(['client', 'vehicle']);
        return view('quotes.show', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quote)
    {
        $clients = \App\Models\Client::all();
        $vehicles = \App\Models\Vehicle::all();
        return view('quotes.edit', compact('quote', 'clients', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdateQuoteRequest $request, Quote $quote)
    {
        $quote->update($request->validated());
        return redirect()->route('quotes.index')->with('success', 'Presupuesto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('quotes.index')->with('success', 'Presupuesto eliminado correctamente.');
    }
}
