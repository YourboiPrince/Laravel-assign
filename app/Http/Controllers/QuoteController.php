<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Organization; // Assuming you have an Organization model
use App\Models\Contact; // Assuming you have a Contact model

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Quote::all();
        return view('quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = Organization::all();
        $contacts = Contact::all();
        return view('quotes.create', compact('organizations', 'contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deal_id' => 'required',
            'account_id' => 'required|exists:organizations,id',
            'contact_id' => 'required|exists:contacts,id',
            'quote_date' => 'required|date',
            'expiry_date' => 'required|date',
            'total' => 'required|numeric',
            'status' => 'required|max:255',
        ]);

        Quote::create($request->all());

        return redirect()->route('quotes.index')->with('success', 'Quote created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $quote = Quote::findOrFail($id);
            return view('quotes.show', compact('quote'));
        } catch (\Exception $e) {
            return redirect()->route('quotes.index')->with('error', 'Quote not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quote = Quote::find($id);
        $organizations = Organization::all();
        $contacts = Contact::all();

        return view('quotes.edit', compact('quote', 'organizations', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quote = Quote::find($id);

        if ($quote) {
            $request->validate([
                'deal_id' => 'required',
                'account_id' => 'required|exists:organizations,id',
                'contact_id' => 'required|exists:contacts,id',
                'quote_date' => 'required|date',
                'expiry_date' => 'required|date',
                'total' => 'required|numeric',
                'status' => 'required|max:255',
            ]);

            $quote->update($request->all());
            return redirect()->route('quotes.index')->with('success', 'Quote updated successfully');
        } else {
            return redirect()->route('quotes.index')->with('error', 'Quote not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $quote = Quote::findOrFail($id);
            $quote->delete();
            return redirect()->route('quotes.index')->with('success', 'Quote deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('quotes.index')->with('error', 'Quote not found');
        }
    }
}
