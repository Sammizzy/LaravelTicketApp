@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Deleted Tickets</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @if($tickets->count())
            <div class="space-y-4">
                @foreach($tickets as $ticket)
                    <div class="flex items-center justify-between p-4 bg-red-100 rounded shadow">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="text-blue-600 hover:underline">
                            <strong>{{ $ticket->subject }}</strong> from {{ $ticket->email }}
                        </a>

                        <form action="{{ route('tickets.restore', $ticket->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">
                                Restore
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p>No deleted tickets.</p>
        @endif
    </div>
@endsection
