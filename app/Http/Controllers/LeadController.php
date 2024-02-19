<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Add any other validation rules as needed
        ]);

        Lead::create($request->all());

        return redirect()->route('leads.index')->with('success', 'Lead created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $lead = Lead::findOrFail($id);
            return view('leads.show', compact('lead'));
        } catch (\Exception $e) {
            return redirect()->route('leads.index')->with('error', 'Lead not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lead = Lead::find($id);
        return view('leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lead = Lead::find($id);

        if ($lead) {
            $lead->update($request->all());
            return redirect()->route('leads.index')->with('success', 'Lead updated successfully');
        } else {
            return redirect()->route('leads.index')->with('error', 'Lead not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $lead = Lead::findOrFail($id);
            $lead->delete();
            return redirect()->route('leads.index')->with('success', 'Lead deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('leads.index')->with('error', 'Lead not found');
        }
    }
}
