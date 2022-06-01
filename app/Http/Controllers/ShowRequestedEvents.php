<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShowRequestedEvents extends Controller
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
     * Show the My Events tab requested view.
     */
    public function displayRequestedEventOlahraga()
    {
        $user = Auth::user();
        //alternatif 1 ambil dari eorqt
        // $events = DB::table('eorqt')->where('username', $user->username)->get();

        //alternatif 2 ambil langsung dari eo. eoikt & eorqt sepertinya dihapus saja, tidak diperlukan
        $ideventcalonpartisipan = DB::table('calonpartisipan')->where('username', $user->username)->get();
        $eventcalonpartisipan = [];
        foreach($ideventcalonpartisipan as $ideventcapar) {
            $eventdata = DB::table('eo')->where('idevent', $ideventcapar->idevent)->first();
            array_push($eventcalonpartisipan, $eventdata);
        }

        $jumlahpartisipan = [];
        foreach ($eventcalonpartisipan as $eventcapar) { //currently pake yang dari eo, alternatif 2
            $partisipan = DB::table('partisipan')->where('idevent', $eventcapar->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return view('myeventsrequested',['events' => $eventcalonpartisipan,'jumlahpartisipan' => $jumlahpartisipan]);
    }
}
