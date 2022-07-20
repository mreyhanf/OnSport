<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class BrowseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('showBrowse','filterBrowse');
    }


    public function showBrowse(Request $request)
    {
        if (Auth::check()) { // for logged in users
            if ($request->is('browse/filter')) {
                return redirect('/browse');
            }
            // BrowseController::browseLoggedIn();
            $user = Auth::user();
            $events = DB::table('eo')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->orderBy('tanggal', 'asc')->orderBy('jam', 'asc')->get();
            $jumlahpartisipan = [];
            foreach ($events as $event) { //currently pakai yang dari eo alternatif 2
                $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
                array_push($jumlahpartisipan, $partisipan);
            }
            return view('browse',['events' => $events,'jumlahpartisipan' => $jumlahpartisipan]);
        } else { // for guests
            // BrowseController::browseGuest();
            $events = DB::table('eo')->where('tanggal', '>=', Carbon::today())->orderBy('tanggal', 'asc')->orderBy('jam', 'asc')->get();
            $jumlahpartisipan = [];
            foreach ($events as $event) {
                $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
                array_push($jumlahpartisipan, $partisipan);
            }
            return view('browse',['events' => $events,'jumlahpartisipan' => $jumlahpartisipan]);
        }
    }

    public function filterBrowse(Request $request)
    {
        if (Auth::check()) { // for logged in users
            // BrowseController::filterLoggedIn($request);
            $kategori = $request->kategori;
            $events = []; //deklarasi variabel
            $user = Auth::user();
            if(empty($kategori)) {
                return redirect('/browse');
            }

            if(in_array('Sepak bola/Futsal', $kategori)) {
                $sbf_events = DB::table('eo')->where('kategori', 'Sepak bola/Futsal')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //sbf = sepak bola/futsal
                foreach($sbf_events as $sbf) {
                    array_push($events, $sbf);
                }
            }

            if(in_array('Basket', $kategori)) {
                $bkt_events = DB::table('eo')->where('kategori', 'Basket')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //bkt = basket
                foreach($bkt_events as $bkt) {
                    array_push($events, $bkt);
                }
            }

            if(in_array('Voli', $kategori)) {
                $voli_events = DB::table('eo')->where('kategori', 'Voli')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get();
                foreach($voli_events as $voli) {
                    array_push($events, $voli);
                }
            }

            if(in_array('Bulu tangkis', $kategori)) {
                $bt_events = DB::table('eo')->where('kategori', 'Bulu tangkis')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //bt = bulu tangkis
                foreach($bt_events as $bt) {
                    array_push($events, $bt);
                }
            }

            if(in_array('Bersepeda', $kategori)) {
                $spd_events = DB::table('eo')->where('kategori', 'Bersepeda')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //spd = bersepeda
                foreach($spd_events as $spd) {
                    array_push($events, $spd);
                }
            }

            if(in_array('Lain-lain', $kategori)) {
                $lain_events = DB::table('eo')->where('kategori', 'Lain-lain')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //lain = lain-lain
                foreach($lain_events as $lain) {
                    array_push($events, $lain);
                }
            }

            if(!empty($events)) {
                usort($events, function($a, $b) {
                    return strcmp($a->tanggal, $b->tanggal);
                });
            }

            $jumlahpartisipan = [];
            foreach ($events as $event) {
                $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
                array_push($jumlahpartisipan, $partisipan);
            }

            return redirect('/browse')->with([ 'events' => $events, 'jumlahpartisipan' => $jumlahpartisipan]);
            } else { // for guests
                // same as filterLoggedIn except it does not check the usernamehost
                $kategori = $request->kategori;
                $events = []; //deklarasi variabel
                $user = Auth::user();
                if(empty($kategori)) {
                    return redirect('/browse');
                }

                if(in_array('Sepak bola/Futsal', $kategori)) {
                    $sbf_events = DB::table('eo')->where('kategori', 'Sepak bola/Futsal')->where('tanggal', '>=', Carbon::today())->get(); //sbf = sepak bola/futsal
                    foreach($sbf_events as $sbf) {
                        array_push($events, $sbf);
                    }
                }

                if(in_array('Basket', $kategori)) {
                    $bkt_events = DB::table('eo')->where('kategori', 'Basket')->where('tanggal', '>=', Carbon::today())->get(); //bkt = basket
                    foreach($bkt_events as $bkt) {
                        array_push($events, $bkt);
                    }
                }

                if(in_array('Voli', $kategori)) {
                    $voli_events = DB::table('eo')->where('kategori', 'Voli')->where('tanggal', '>=', Carbon::today())->get();
                    foreach($voli_events as $voli) {
                        array_push($events, $voli);
                    }
                }

                if(in_array('Bulu tangkis', $kategori)) {
                    $bt_events = DB::table('eo')->where('kategori', 'Bulu tangkis')->where('tanggal', '>=', Carbon::today())->get(); //bt = bulu tangkis
                    foreach($bt_events as $bt) {
                        array_push($events, $bt);
                    }
                }

                if(in_array('Bersepeda', $kategori)) {
                    $spd_events = DB::table('eo')->where('kategori', 'Bersepeda')->where('tanggal', '>=', Carbon::today())->get(); //spd = bersepeda
                    foreach($spd_events as $spd) {
                        array_push($events, $spd);
                    }
                }

                if(in_array('Lain-lain', $kategori)) {
                    $lain_events = DB::table('eo')->where('kategori', 'Lain-lain')->where('tanggal', '>=', Carbon::today())->get(); //lain = lain-lain
                    foreach($lain_events as $lain) {
                        array_push($events, $lain);
                    }
                }

                if(!empty($events)) {
                    usort($events, function($a, $b) {
                        return strcmp($a->tanggal, $b->tanggal);
                    });
                }

                $jumlahpartisipan = [];
                foreach ($events as $event) {
                    $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
                    array_push($jumlahpartisipan, $partisipan);
                }

                return redirect('/browse')->with([ 'events' => $events, 'jumlahpartisipan' => $jumlahpartisipan]);
            }
    }

    public function browseGuest()
    {
        $events = DB::table('eo')->where('tanggal', '>=', Carbon::today())->orderBy('tanggal', 'asc')->orderBy('jam', 'asc')->get();
        $jumlahpartisipan = [];
        foreach ($events as $event) {
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }
        return view('browse',['events' => $events,'jumlahpartisipan' => $jumlahpartisipan]);
    }

    public function browseLoggedIn()
    {
        $user = Auth::user();
        $events = DB::table('eo')->where('kota', $user->kota)->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->orderBy('tanggal', 'asc')->orderBy('jam', 'asc')->get();
        $jumlahpartisipan = [];
        foreach ($events as $event) { //currently pakai yang dari eo alternatif 2
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }
        return view('browse',['events' => $events,'jumlahpartisipan' => $jumlahpartisipan]);
    }

    public function filterLoggedIn(Request $request) {
        $kategori = $request->kategori;
        $events = []; //deklarasi variabel
        $user = Auth::user();
        if(empty($kategori)) {
            return redirect('/browse');
        }

        if(in_array('Sepak bola/Futsal', $kategori)) {
            $sbf_events = DB::table('eo')->where('kategori', 'Sepak bola/Futsal')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //sbf = sepak bola/futsal
            foreach($sbf_events as $sbf) {
                array_push($events, $sbf);
            }
        }

        if(in_array('Basket', $kategori)) {
            $bkt_events = DB::table('eo')->where('kategori', 'Basket')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //bkt = basket
            foreach($bkt_events as $bkt) {
                array_push($events, $bkt);
            }
        }

        if(in_array('Voli', $kategori)) {
            $voli_events = DB::table('eo')->where('kategori', 'Voli')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get();
            foreach($voli_events as $voli) {
                array_push($events, $voli);
            }
        }

        if(in_array('Bulu tangkis', $kategori)) {
            $bt_events = DB::table('eo')->where('kategori', 'Bulu tangkis')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //bt = bulu tangkis
            foreach($bt_events as $bt) {
                array_push($events, $bt);
            }
        }

        if(in_array('Bersepeda', $kategori)) {
            $spd_events = DB::table('eo')->where('kategori', 'Bersepeda')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //spd = bersepeda
            foreach($spd_events as $spd) {
                array_push($events, $spd);
            }
        }

        if(in_array('Lain-lain', $kategori)) {
            $lain_events = DB::table('eo')->where('kategori', 'Lain-lain')->where('tanggal', '>=', Carbon::today())->where('usernamehost','<>', $user->username)->get(); //lain = lain-lain
            foreach($lain_events as $lain) {
                array_push($events, $lain);
            }
        }

        if(!empty($events)) {
            usort($events, function($a, $b) {
                return strcmp($a->tanggal, $b->tanggal);
            });
        }

        $jumlahpartisipan = [];
        foreach ($events as $event) {
            $partisipan = DB::table('partisipan')->where('idevent', $event->idevent)->count();
            array_push($jumlahpartisipan, $partisipan);
        }

        return redirect('/browse')->with([ 'events' => $events, 'jumlahpartisipan' => $jumlahpartisipan]);
    }
}
