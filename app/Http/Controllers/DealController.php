<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::all();
        return view('deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required',
            'contact_id' => 'required',
            'stage' => 'required',
            'value' => 'required|numeric',
            'probability' => 'required|numeric',
            'expected_close_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Deal::create($request->all());

        return redirect()->route('deals.index')->with('success', 'Deal created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $deal = Deal::findOrFail($id);
            return view('deals.show', compact('deal'));
        } catch (\Exception $e) {
            return redirect()->route('deals.index')->with('error', 'Deal not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $deal = Deal::find($id);
        return view('deals.edit', compact('deal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $deal = Deal::find($id);

        if ($deal) {
            $request->validate([
                'account_id' => 'required',
                'contact_id' => 'required',
                'stage' => 'required',
                'value' => 'required|numeric',
                'probability' => 'required|numeric',
                'expected_close_date' => 'required|date',
                'notes' => 'nullable|string',
            ]);

            $deal->update($request->all());
            return redirect()->route('deals.index')->with('success', 'Deal updated successfully');
        } else {
            return redirect()->route('deals.index')->with('error', 'Deal not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deal = Deal::findOrFail($id);
            $deal->delete();
            return redirect()->route('deals.index')->with('success', 'Deal deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('deals.index')->with('error', 'Deal not found');
        }
    }
}
