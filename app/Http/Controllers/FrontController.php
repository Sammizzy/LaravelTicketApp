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

    public function login()

    {

        return view('login');

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

    public function ticketsbyquery(Request $request)
    {
        $query = $request->query('query');

        $tickets = Ticket::where('name', 'like', '%' . $query . '%')->get();

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
        // Include soft-deleted tickets using withTrashed()
        $ticket = \App\Models\Ticket::withTrashed()->findOrFail($id);
        return view('ticket-detail', compact('ticket'));
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

    public function deletedTickets()
    {
        $tickets = \App\Models\Ticket::onlyTrashed()->get(); // Only soft-deleted tickets
        return view('deleted-tickets', compact('tickets'));
    }

    public function restoreTicket($id)
    {
        $ticket = \App\Models\Ticket::withTrashed()->findOrFail($id);
        $ticket->restore();

        return redirect()->route('tickets.deleted')->with('success', 'Ticket restored successfully.');
    }





}
