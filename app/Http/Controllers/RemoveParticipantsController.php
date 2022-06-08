<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class RemoveParticipantsController extends Controller
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
     * Show user information page
     * By Reyhan
     */
    public function deleteParticipant(Request $request) {

        $user = Auth::user();
        $event = DB::table('eo')->where('idevent', $request->idevent)->first();
        if ($user->username == $event->usernamehost) { //if user is indeed the host
        DB::table('partisipan')->where('username', $request->username)->delete();
        DB::table('eoikt')->where('idevent', $request->idevent)->where('username', $request->username)->delete();

        $judulevent = $event->judulevent;
        $usernamepg = $user->username;

        RemoveParticipantsController::createParticipantRemovalNotification($request->idevent, $request->username, $judulevent, $usernamepg);
        RemoveParticipantsController::setStatusPenerimaan($request->idevent);
        }

        return redirect()->back();
    }

    /**
     * Create participant removal notification for the removed partisipan
     * By Reyhan
     */
    public function createParticipantRemovalNotification($idevent, $usernamepn, $judulevent, $usernamepg) {

        $jenis = 2; //jenis notifikasi participant removal = 2
        $timestamp = Carbon::now()->toDateTimeString();

        DB::table('notifikasi')->insert([
            'usernamepn' => $usernamepn,
            'jenis' => $jenis,
            'idevent' => $idevent,
            'judulevent' => $judulevent,
            'usernamepg' => $usernamepg,
            'created_at' => $timestamp
        ]);
    }

    /**
     * Change status penerimaan of the event by comparing the event's quota with total participants
     * By Reyhan
     */
    public function setStatusPenerimaan($idevent) {
        $event = DB::table('eo')->where('idevent', $idevent)->first();
        $kuota = $event->kuotapartisipan;
        $totalpartisipan = DB::table('partisipan')->where('idevent', $idevent)->count();

        if ($kuota > $totalpartisipan) {
            DB::table('eo')->where('idevent', $idevent)->update(['statuspenerimaan' => 1]);
        } else {
            DB::table('eo')->where('idevent', $idevent)->update(['statuspenerimaan' => 0]);
        }
    }
}
