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

                        @if(!empty($ticketData))
                            <h2>Ticket Details:</h2>
                            <ul>
                                <li><strong>Name:</strong> {{ $ticketData['name'] }}</li>
                                <li><strong>Email:</strong> {{ $ticketData['email'] }}</li>
                                <li><strong>Subject:</strong> {{ $ticketData['subject'] }}</li>
                            </ul>
                        @else
                            <p>No ticket data available.</p>
                        @endif




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
