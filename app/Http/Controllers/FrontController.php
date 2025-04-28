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


}
