<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowJoinedEvents extends Controller
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
     * Show the My Events tab joined view.
     */
    public function displayJoinedEventOlahraga()
    {
        //alternatif 1 ambil dari eoikt
        $events = DB::table('eoikt')->where('username', 'mreyhanf')->get();

        //alternatif 2 ambil langsung dari eo. eoikt & eorqt sepertinya dihapus saja, tidak diperlukan
        $ideventpartisipan = DB::table('partisipan')->where('username', 'mreyhanf')->get();
        $eventpartisipan = [];
        foreach($ideventpartisipan as $ideventpar) {
            $eventdata = DB::table('eo')->where('idevent', $ideventpar->idevent)->first();
            array_push($eventpartisipan, $eventdata);
        }

        $jumlahpartisipan = [];
        foreach ($eventpartisipan as $eventpar) { //currently pakai yang dari eo alternatif 2
            $partisipan = DB::table('partisipan')->where('idevent', $eventpar->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return view('myeventsjoined',['events' => $eventpartisipan,'jumlahpartisipan' => $jumlahpartisipan]);
    }
}
