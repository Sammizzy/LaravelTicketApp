@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold mb-4">Runs logged</h1>
            <p class="text-gray-600 mb-6">You are in the logged runs Page. <!--Tickets will be displayed here along with create/history/approve/deny actions.--></p>

            <form method="GET" action="{{ route('tickets.search') }}" class="mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group shadow rounded">
                            <input type="text"
                                   name="query"
                                   class="form-control border-end-0"
                                   placeholder="🔍 Search run entries..."
                                   value="{{ request('query') }}">
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>



            <div class="flex justify-end mb-4">
                <a href="{{ route('tickets.deleted') }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    View Deleted Tickets
                </a>
            </div>


        @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if($tickets->count())
                <div class="space-y-4"> <!--changes ticket border colour depending on selection -->
                    @foreach($tickets as $ticket)
                        @php
                            $borderColor = match($ticket->status) {
                                'approved' => 'border-green-500',
                                'denied' => 'border-red-500',
                                default => 'border-gray-300'
                            };
                        @endphp


                        <div class="rounded-lg p-4 shadow-sm bg-gray-50 hover:bg-gray-100 transition border {{ $borderColor }}">
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="block">
                                <p><strong>Name:</strong> {{ $ticket->name }}</p>
                                <p><strong>Email:</strong> {{ $ticket->email }}</p>
                                <p><strong>Distance:</strong> {{ $ticket->distance }}</p>
                                <p><strong>Terrain:</strong> {{ $ticket->terrain }}</p>

                            </a>

                            <div class="flex gap-2 mt-4">
                                <form action="{{ route('tickets.approve', $ticket->id) }}" method="POST"> <!--calls on the tickets.approve route in the web.php-->
                                    @csrf
                                    <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">
                                        Approve
                                    </button>
                                </form>

                                <form action="{{ route('tickets.deny', $ticket->id) }}" method="POST"> <!--calls on the tickets.deny route in the web.php-->
                                    @csrf
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">
                                        Deny
                                    </button>
                                </form>

                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="ml-auto"> <!--calls on the tickets.destroy route in the web.php-->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this ticket?');"
                                            class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-md"> <!--button confirming the ticket to be deleted -->
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No tickets yet.</p>
            @endif

        </div>
    </div>
@endsection
