<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ticket;



class FrontController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()

    {

        return view('home');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets()

    {
        $tickets = Ticket::all(); // fetch all tickets
        return view('tickets', compact('tickets'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome()

    {
        return view('welcome');

    }

    public function form()

    {
        return view('form');

    }

    public function showTicket($id)
    {
        $ticket = Ticket::findOrFail($id); // Fetch the ticket or 404
        return view('ticket-detail', compact('ticket')); // Pass $ticket to the view
    }

    public function destroyTicket($id)
    {
        $ticket = \App\Models\Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets')->with('success', 'Ticket deleted successfully.');
    }

    public function approveTicket($id)
    {
        $ticket = \App\Models\Ticket::findOrFail($id);
        $ticket->status = 'approved';
        $ticket->save();

        return back()->with('success', 'Ticket approved.');
    }

    public function denyTicket($id)
    {
        $ticket = \App\Models\Ticket::findOrFail($id);
        $ticket->status = 'denied';
        $ticket->save();

        return back()->with('success', 'Ticket denied.');
    }




}
