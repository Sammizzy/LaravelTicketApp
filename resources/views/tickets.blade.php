@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tickets</div>
                    <div class="card-body">

                        <p>You are in tickets Page

                        Tickets will be displayed here along with create/history tickets and approve/deny</p>


                        @if(session('success'))
                            <div style="color: green;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($tickets->count())
                            <h2>All Submitted Tickets:</h2>
                            <ul>
                                @foreach($tickets as $ticket)
                                    <li>
                                        <strong>Name:</strong> {{ $ticket->name }} |
                                        <strong>Email:</strong> {{ $ticket->email }} |
                                        <strong>Subject:</strong> {{ $ticket->subject }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No tickets yet.</p>
                        @endif




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
