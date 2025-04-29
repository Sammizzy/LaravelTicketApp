
@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Ticket Details</h2>
        <p><strong>Name:</strong> {{ $ticket->name }}</p>
        <p><strong>Email:</strong> {{ $ticket->email }}</p>
        <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
        <p><strong>Message:</strong> {{ $ticket->message }}</p>
        <a href="{{ route('tickets') }}" class="mt-4 inline-block text-blue-600 hover:underline">Back to Tickets</a>
    </div>
@endsection
