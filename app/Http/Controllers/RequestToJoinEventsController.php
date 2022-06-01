<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RequestToJoinEventsController extends Controller
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
     * Send join request to an event
     * By Reyhan
     */
    public function sendJoinRequest(Request $request)
    {
        $user = Auth::user();
        if (DB::table('calonpartisipan')->where('idevent', $request->idevent)->where('username', $user->username)->doesntExist()) {
        RequestToJoinEventsController::createCalonPartisipan($request->idevent, $user->username);
        $event = DB::table('eo')->where('idevent', $request->idevent)->first();
        $judulevent = $event->judulevent;
        $usernamepn = $event->usernamehost;
        RequestToJoinEventsController::createJoinEventNotification($request->idevent, $usernamepn, $judulevent, $user->username);
        }

        return redirect()->back();
    }

    /**
     * Insert the user to calon partisipan list of the event
     * By Reyhan
     */
    public function createCalonPartisipan($idevent, $username)
    {
        DB::table('calonpartisipan')->insert([
            'idevent' => $idevent,
            'username' => $username
        ]);
    }

    /**
     * Create Join Event Notification for the host
     * By Reyhan
     */
    public function createJoinEventNotification($idevent, $usernamepn, $judulevent, $usernamepg) {
        $jenis = 5; //jenis notifikasi join event = 5
        DB::table('notifikasi')->insert([
            'usernamepn' => $usernamepn,
            'jenis' => $jenis,
            'idevent' => $idevent,
            'judulevent' => $judulevent,
            'usernamepg' => $usernamepg
        ]);
    }
}
