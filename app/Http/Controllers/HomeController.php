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
        $eventscreated = DB::table('eo')->where('usernamehost', $user->username)->where('tanggal', '>=', Carbon::today())->orderBy('tanggal', 'asc')->orderBy('jam', 'asc')->get();
        $jumlahpartisipancreated = [];
        foreach ($eventscreated as $event) {
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipancreated, $partisipan);
        }
        $joinedEventDanJumlahPartisipan = HomeController::activeJoinedEventOlahraga();
        $eventsjoined = $joinedEventDanJumlahPartisipan[0];
        $jumlahpartisipanjoined = $joinedEventDanJumlahPartisipan[1];

        $recEventDanJumlahPartisipan = HomeController:: recommendationEventOlahraga();
        $eventsrec = $recEventDanJumlahPartisipan[0];
        $jumlahpartisipanrec = $recEventDanJumlahPartisipan[1];

        return view('home',['eventscreated' => $eventscreated,'jumlahpartisipancreated' => $jumlahpartisipancreated, 'eventsjoined' => $eventsjoined,'jumlahpartisipanjoined' => $jumlahpartisipanjoined, 'eventsrec' => $eventsrec,'jumlahpartisipanrec' => $jumlahpartisipanrec]);

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
        usort($eventpartisipan, function($a, $b) {
            return strcmp($a->tanggal, $b->tanggal);
        });
        $jumlahpartisipan = [];
        foreach ($eventpartisipan as $eventpar) { //currently pakai yang dari eo alternatif 2
            $partisipan = DB::table('partisipan')->where('idevent', $eventpar->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }
        $joinedEventDanJumlahPartisipan = [$eventpartisipan, $jumlahpartisipan];

        return $joinedEventDanJumlahPartisipan;
    }

    public function recommendationEventOlahraga()
    {
        $user = Auth::user();
        $preferensiolahraga = DB::table('preferensiolahraga')->where('username', $user->username)->get();
        $kategori = [];
        foreach($preferensiolahraga as $prefor) {
            array_push($kategori, $prefor->kategori);
        }
        $event_recommendation = DB::table('eo')->whereIn('kategori', $kategori)->where('kota', $user->kota)->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->take(9)->get();
        $jumlahpartisipan = [];
        foreach ($event_recommendation as $eventrec) { //currently pakai yang dari eo alternatif 2
            $partisipan = DB::table('partisipan')->where('idevent', $eventrec->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }
        $recEventDanJumlahPartisipan = [$event_recommendation, $jumlahpartisipan];

        return $recEventDanJumlahPartisipan;
    }

}

