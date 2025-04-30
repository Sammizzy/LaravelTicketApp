@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Ticket Details</h2>
        <p><strong>Name:</strong> {{ $ticket->name }}</p>
        <p><strong>Email:</strong> {{ $ticket->email }}</p>
        <p><strong>Subject:</strong> {{ $ticket->subject }}</p>

        <div >
            <label for="message" class="text-xl font-bold mb-4">Description</label>
            <textarea id="message" readonly oninput="adjustHeight(this)"
                      class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 focus:border-blue-500 focus:ring-blue-500">
        {{ $ticket->message }}
        </textarea>
        </div>

        <script>
            function adjustHeight(element) {
                element.style.height = "auto"; // Reset height first
                element.style.height = element.scrollHeight + "px"; // Adjust based on content
            }

            window.onload = function() {
                adjustHeight(document.getElementById('message')); // Auto-adjust height on page load
            };
        </script>






        <a href="{{ route('tickets') }}" class="mt-4 inline-block text-blue-600 hover:underline">← Back to Tickets</a>

        <div class="flex gap-2 mt-4">
            <form action="{{ route('tickets.approve', $ticket->id) }}" method="POST">
                @csrf
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">
                    Approve
                </button>
            </form>

            <form action="{{ route('tickets.deny', $ticket->id) }}" method="POST">
                @csrf
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">
                    Deny
                </button>
            </form>

            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="ml-auto">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this ticket?');"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-md">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection
