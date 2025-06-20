<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
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
            'name' => 'required|max:500',
            'email' => 'required|email',
            'distance' => 'numeric',
            'terrain' => 'string|nullable',
            'description' => 'string|nullable',
        ]);

        // Save ticket to database
        Ticket::create($validatedData);

        return redirect()->route('tickets')->with('success', 'Ticket submitted successfully!');
    }
}

