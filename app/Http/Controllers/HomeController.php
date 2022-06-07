<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show Active Created Event Olahraga view.
     */
    public function activeCreatedEventOlahraga()
    {
        $user = Auth::user();
        $events = DB::table('eo')->where('usernamehost', $user->username)->where('tanggal', '>=', Carbon::today())->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->get();
        $jumlahpartisipan = [];
        foreach ($events as $event) {
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return view('home',['events' => $events,'jumlahpartisipan' => $jumlahpartisipan]);
    }

    /**
     * Show Active Joined Event Olahraga view.
     */
    public function activeJoinedEventOlahraga()
    {
        $user = Auth::user();
        //alternatif 1 ambil dari eoikt
        // $events = DB::table('eoikt')->where('username', $user->username)->get();

        //alternatif 2 ambil langsung dari eo. eoikt & eorqt sepertinya dihapus saja, tidak diperlukan
        $ideventpartisipan = DB::table('partisipan')->where('username', $user->username)->get();
        $eventpartisipan = [];
        foreach($ideventpartisipan as $ideventpar) {
            $eventdata = DB::table('eo')->where('idevent', $ideventpar->idevent)->where('tanggal', '>=', Carbon::today())->first();
            array_push($eventpartisipan, $eventdata);
        }

        $jumlahpartisipan = [];
        foreach ($eventpartisipan as $eventpar) { //currently pakai yang dari eo alternatif 2
            $partisipan = DB::table('partisipan')->where('idevent', $eventpar->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return view('home',['events' => $eventpartisipan,'jumlahpartisipan' => $jumlahpartisipan]);
    }
}
