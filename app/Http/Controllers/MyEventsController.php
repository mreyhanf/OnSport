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
     * Show the My Events tab view.
     */
    public function index()
    {
        return view('myeventscreated');
    }
}
