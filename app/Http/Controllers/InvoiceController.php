<?php

namespace App\Http\Controllers;

use App\Models\Invoice_item;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoiceItems = Invoice_item::all();
        return view('invoice_items.index', ['invoiceItems' => $invoiceItems]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoice_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Invoice_item::create($data);

        return redirect()->route('invoice_items.index')->with('success', 'Invoice item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice_item $invoiceItem)
    {
        return view('invoice_items.show', ['invoiceItem' => $invoiceItem]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice_item $invoiceItem)
    {
        return view('invoice_items.edit', ['invoiceItem' => $invoiceItem]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice_item $invoiceItem)
    {
        $data = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $invoiceItem->update($data);

        return redirect()->route('invoice_items.index')->with('success', 'Invoice item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice_item $invoiceItem)
    {
        $invoiceItem->delete();

        return redirect()->route('invoice_items.index')->with('success', 'Invoice item deleted successfully.');
    }
}
