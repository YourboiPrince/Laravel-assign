<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Organization;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch organizations data from the database
        $organizations = Organization::all();

        // Pass the organizations data to the view
        return view('contacts.create', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job_title' => 'required',
            'organization_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Upload the image and store it in the database
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
    
        // Create a new contact instance
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->job_title = $request->job_title;
        $contact->organization_id = $request->organization_id;
        $contact->image = $name; // Set the image attribute here
        $contact->save();
    
        // Redirect to the index page
        return redirect()->route('contact.index');
    }
        /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $contact = Contact::findOrFail($id);
            return view('contacts.show', compact('contact'));
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'Contact not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:contacts,email,' . $contact->id,
                // Add more validation rules if needed
            ]);

            $contact->update($request->all());
            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
        } else {
            return redirect()->route('contacts.index')->with('error', 'Contact not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();
            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'Contact not found');
        }
    }
}
