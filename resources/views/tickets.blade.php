@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold mb-4">Tickets</h1>
            <p class="text-gray-600 mb-6">You are in the Tickets Page. Tickets will be displayed here along with create/history/approve/deny actions.</p>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if($tickets->count())
                <div class="space-y-4">
                    @foreach($tickets as $ticket)
                        <div class="border border-gray-300 rounded-lg p-4 shadow-sm bg-gray-50">
                            <p><strong>Name:</strong> {{ $ticket->name }}</p>
                            <p><strong>Email:</strong> {{ $ticket->email }}</p>
                            <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No tickets yet.</p>
            @endif
        </div>
    </div>
@endsection
