<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyEventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the My Events tab created view.
     */
    public function index_created()
    {
        return view('myeventscreated');
    }

    /**
     * Show the My Events tab joined view.
     */
    public function index_joined()
    {
        return view('myeventsjoined');
    }

    /**
     * Show the My Events tab requested view.
     */
    public function index_requested()
    {
        return view('myeventsrequested');
    }
}

