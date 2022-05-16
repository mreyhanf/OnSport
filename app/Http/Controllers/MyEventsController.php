<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $events = DB::table('eo')->where('usernamehost', 'reyhan')->get();
        $jumlahpartisipan = [];
        foreach ($events as $event) {
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return view('myeventscreated',['events' => $events],['jumlahpartisipan' => $jumlahpartisipan]);
    }

    /**
     * Show the My Events tab joined view.
     */
    public function index_joined()
    {
        $events = DB::table('eoikt')->where('username', 'mreyhanf')->get();
        $jumlahpartisipan = [];
        foreach ($events as $event) {
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return view('myeventsjoined',['events' => $events],['jumlahpartisipan' => $jumlahpartisipan]);
    }

    /**
     * Show the My Events tab requested view.
     */
    public function index_requested()
    {
        $events = DB::table('eorqt')->where('username', 'reyhanf')->get();
        $jumlahpartisipan = [];
        foreach ($events as $event) {
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return view('myeventsrequested',['events' => $events],['jumlahpartisipan' => $jumlahpartisipan]);
    }
}

