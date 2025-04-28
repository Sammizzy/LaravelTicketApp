<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Show the form
    public function showForm()
    {
        return view('form');
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required',
        ]);

        // Pass data through session to the tickets page
        return redirect()->route('tickets')->with([
            'success' => 'Ticket submitted successfully!',
            'ticketData' => $validatedData,
        ]);
    }
}

