<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CancelParticipationFromAnEventController extends Controller
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
     *
     *
     * By Reyhan
     */
    public function cancelParticipation(Request $request)
    {
        $idevent = $request->idevent;
        $username = Auth::user()->username;
        if (DB::table('partisipan')->where('idevent', $idevent)->where('username', $username)->exists()) {
            CancelParticipationFromAnEventController::deletePartisipan($idevent, $username);
            $event = DB::table('eo')->where('idevent', $idevent)->first();
            $judulevent = $event->judulevent;
            $usernamepn = $event->usernamehost;

            CancelParticipationFromAnEventController::createParticipationCancellationNotification($idevent, $usernamepn, $judulevent, $username);
            CancelParticipationFromAnEventController::setStatusPenerimaan($idevent);
        }

        return redirect()->back();

    }

    /**
     *
     *
     * By Reyhan
     */
    public function deletePartisipan($idevent, $username)
    {
        DB::table('partisipan')->where('idevent', $idevent)->where('username', $username)->delete(); //might want to create another function
    }

    /**
     * Create participant removal notification for the removed partisipan
     *
     * By Reyhan
     */
    public function createParticipationCancellationNotification($idevent, $usernamepn, $judulevent, $usernamepg) {

        $jenis = 7; //jenis notifikasi cancel participation = 7
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
