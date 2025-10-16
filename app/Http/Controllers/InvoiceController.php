<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $invoices = Invoice::when($search, function ($query, $search) {
                $query->where('total', 'like', "%$search%")
                      ->orWhere('tax_amount', 'like', "%$search%")
                      ->orWhere('issue_date', 'like', "%$search%") ;
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('invoices.index', compact('invoices', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workOrders = \App\Models\WorkOrder::all();
        $clients = \App\Models\Client::all();
        return view('invoices.create', compact('workOrders', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->validated());
        return redirect()->route('invoices.index')->with('success', 'Factura creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $workOrders = \App\Models\WorkOrder::all();
        $clients = \App\Models\Client::all();
        return view('invoices.edit', compact('invoice', 'workOrders', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());
        return redirect()->route('invoices.index')->with('success', 'Factura actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Factura eliminada correctamente.');
    }
}
