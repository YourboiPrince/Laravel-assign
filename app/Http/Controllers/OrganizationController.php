<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'industry' => 'required',
            'orgsize' => 'required',
            // Add other validation rules as needed
        ]);

        Organization::create($request->all());

        return redirect()->route('organizations.index')->with('success', 'Organization created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $organization = Organization::findOrFail($id);
            return view('organizations.show', compact('organization'));
        } catch (\Exception $e) {
            return redirect()->route('organizations.index')->with('error', 'Organization not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organization = Organization::find($id);
        return view('organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $organization = Organization::find($id);

        if ($organization) {
            $organization->update($request->all());
            return redirect()->route('organizations.index')->with('success', 'Organization updated successfully');
        } else {
            return redirect()->route('organizations.index')->with('error', 'Organization not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $organization = Organization::findOrFail($id);
            $organization->delete();
            return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('organizations.index')->with('error', 'Organization not found');
        }
    }
}
