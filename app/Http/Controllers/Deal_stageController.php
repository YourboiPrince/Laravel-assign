<?php

namespace App\Http\Controllers;

use App\Models\Deal_stage;
use Illuminate\Http\Request;

class Deal_stageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dealStages = Deal_stage::all();
        return view('deal_stages.index', compact('dealStages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deal_stages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:deal_stages|max:255',
            // Add validation for other fields if needed
        ]);

        Deal_stage::create($request->all());

        return redirect()->route('deal_stages.index')->with('success', 'Deal stage created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dealStage = Deal_stage::findOrFail($id);
        return view('deal_stages.show', compact('dealStage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dealStage = Deal_stage::findOrFail($id);
        return view('deal_stages.edit', compact('dealStage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dealStage = Deal_stage::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255|unique:deal_stages,name,' . $dealStage->id,
            // Add validation for other fields if needed
        ]);

        $dealStage->update($request->all());

        return redirect()->route('deal_stages.index')->with('success', 'Deal stage updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dealStage = Deal_stage::findOrFail($id);
        $dealStage->delete();

        return redirect()->route('deal_stages.index')->with('success', 'Deal stage deleted successfully');
    }
}
