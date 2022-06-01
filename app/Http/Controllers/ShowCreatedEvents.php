<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShowCreatedEvents extends Controller
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
    public function displayCreatedEventOlahraga()
    {
        $user = Auth::user();
        $events = DB::table('eo')->where('usernamehost', $user->username)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->get();
        $jumlahpartisipan = [];
        foreach ($events as $event) {
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return view('myeventscreated',['events' => $events,'jumlahpartisipan' => $jumlahpartisipan]);
    }

}

