<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
        // Retrieve ticket data from session
        $ticketData = session('ticketData', []);

        return view('tickets', compact('ticketData'));
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
