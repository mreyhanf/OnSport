<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Auth;

class ShowEventDetailsController extends Controller
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
     * Show event details view
     */
    public function showEventDetails($idevent) {
        $eventdetails = DB::table('eo')->where('idevent', $idevent)->get();
        $jumlahpartisipan = DB::table('partisipan')->where('idevent', $idevent)->count();

        $host_username = $eventdetails[0]->usernamehost;
        $host = DB::table('users')->where('username', $host_username)->get(); //get host's info (username/name and profile picture) from users table

        $partisipan = DB::table('partisipan')->where('idevent', $idevent)->get();
        $userpartisipan = [];
        foreach ($partisipan as $par) {
            $infopartisipan = DB::table('users')->where('username', $par->username)->first(); //get each partisipan's info (username/name and profile picture) from users table
            array_push($userpartisipan, $infopartisipan);
        }

        $user = Auth::user();

        // Return view berdasarkan role

        // cek apakah calon partisipan, return view eventdetails_calonpartisipan apabila ya
        // cara 1 cek apakah calon partisipan

        $calonpartisipanloggedin = DB::table('calonpartisipan')->where([
            ['idevent', '=', $idevent],
            ['username', '=', $user->username], // username of logged in user (retrieved from session)
        ])->get();
        if ($calonpartisipanloggedin->isNotEmpty()) {
            return view('eventdetails_calonpartisipan',['eventdetails' => $eventdetails,'jumlahpartisipan' => $jumlahpartisipan,'host' => $host,'userpartisipan' => $userpartisipan]);
        }

        /*
        // cara 2 cek apakah calon partisipan
        foreach ($calonpartisipan as $cp) {
            if (0) { // $par->username == username of logged in user (retrieved from session)
                $iscalonparticipant = true;
                break;
            }
        }
        */


        // cek apakah partisipan, return view eventdetails_partisipan apabila ya
        // cara 1 cek apakah partisipan

        $partisipanloggedin = DB::table('partisipan')->where([
            ['idevent', '=', $idevent],
            ['username', '=', $user->username], // username of logged in user (retrieved from session)
        ])->get();
        if ($partisipanloggedin->isNotEmpty()) {
            return view('eventdetails_partisipan',['eventdetails' => $eventdetails,'jumlahpartisipan' => $jumlahpartisipan,'host' => $host,'userpartisipan' => $userpartisipan]);
        }

        /*
        // cara 2 cek apakah partisipan
        foreach ($partisipan as $par) {
            if (0) { // $par->username == username of logged in user (retrieved from session)
                $isparticipant = true;
                break;
            }
        }
        */



        // cek apakah host, return view eventdetails_host apabila ya
        if ($host_username == $user->username) { // $eventdetails->usernamehost == username of logged in user (retrieved from session)
            $calonpartisipan = DB::table('calonpartisipan')->where('idevent', $idevent)->get();
            $usercalonpartisipan = [];
            foreach ($calonpartisipan as $cp) {
                $infocalonpartisipan = DB::table('users')->where('username', $cp->username)->first(); //get each calon partisipan's info (username/name and profile picture) from users table
                array_push($usercalonpartisipan, $infocalonpartisipan);
            }

            return view('eventdetails_host',['eventdetails' => $eventdetails,'jumlahpartisipan' => $jumlahpartisipan,'host' => $host,'userpartisipan' => $userpartisipan,'usercalonpartisipan' => $usercalonpartisipan]);
        }



        // dijalankan apabila logged in user bukan host, partisipan, atau pun calon partisipan. return view eventdetails_default
        return view('eventdetails_default',['eventdetails' => $eventdetails,'jumlahpartisipan' => $jumlahpartisipan,'host' => $host,'userpartisipan' => $userpartisipan]);


        /*
        if ($role == 0) { // default, for when not a host and has not requested to join
            return view('eventdetails_default',['eventdetails' => $eventdetails,'jumlahpartisipan' => $jumlahpartisipan,'host' => $host,'userpartisipan' => $userpartisipan]);
        } elseif ($role == 3) { // for calon partisipan
            return view('eventdetails_calonpartisipan',['eventdetails' => $eventdetails,'jumlahpartisipan' => $jumlahpartisipan,'host' => $host,'userpartisipan' => $userpartisipan]);
        } elseif ($role == 2) { // for partisipan
            return view('eventdetails_partisipan',['eventdetails' => $eventdetails,'jumlahpartisipan' => $jumlahpartisipan,'host' => $host,'userpartisipan' => $userpartisipan]);
        } elseif ($role == 1) { // for host
            return view('eventdetails_host',['eventdetails' => $eventdetails,'jumlahpartisipan' => $jumlahpartisipan,'host' => $host,'userpartisipan' => $userpartisipan,'usercalonpartisipan' => $usercalonpartisipan]);
        }
        */

    }


    /**
     * Update event
     */
    /*
    public function update(Request $request)
    {
	    // update eo table
	    DB::table('eo')->where('idevent',$request->id)->update([

	    ]);

        // update eoikt table
        DB::table('eoikt')->where('idevent',$request->id)->update([

	    ]);

        // update eorqt table
        DB::table('eorqt')->where('idevent',$request->id)->update([

	    ]);

	    return redirect('/event/details/{$request->id}');
    }
    */

}
