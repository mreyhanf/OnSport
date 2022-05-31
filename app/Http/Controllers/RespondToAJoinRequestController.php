<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RespondToAJoinRequestController extends Controller
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
     * Accept a join request to an event
     * By Reyhan
     */
    public function acceptJoinRequest($idevent, $username)
    {
        $statuspenerimaan = RespondToAJoinRequestController::checkStatusPenerimaan($idevent);
        $event = DB::table('eo')->where('idevent', $idevent)->first();

        if ($statuspenerimaan && DB::table('partisipan')->where('idevent', $idevent)->where('username', $username)->doesntExist() && $username != $event->usernamehost) {
            RespondToAJoinRequestController::createPartisipan($idevent, $username);

            $judulevent = $event->judulevent;
            $usernamepg = $event->usernamehost;
            RespondToAJoinRequestController::createNotifikasiJoinRequestAccepted($idevent, $username, $judulevent, $usernamepg);

            RespondToAJoinRequestController::deleteCalonPartisipan($idevent, $username);

            RespondToAJoinRequestController::setStatusPenerimaan($idevent);

            return redirect()->back();
        } elseif (DB::table('partisipan')->where('idevent', $idevent)->where('username', $username)->exists()) {
            $erroraccept = "Gagal menerima permintaan bergabung; user telah berada dalam daftar partisipan untuk event ini.";
            return redirect()->back()->with(['erroraccept' => $erroraccept]);
        } elseif (!$statuspenerimaan) {
            $erroraccept = "Gagal menerima permintaan bergabung; kuota partisipan penuh.";
            return redirect()->back()->with(['erroraccept' => $erroraccept]);
        } else {
            $erroraccept = "Gagal menerima permintaan bergabung.";
            return redirect()->back()->with(['erroraccept' => $erroraccept]);
        }

    }

    /**
     * Create record in partisipan table using username and idevent
     * By Reyhan
     */
    public function checkStatusPenerimaan($idevent)
    {
        $event = DB::table('eo')->where('idevent', $idevent)->first();
        $kuota = $event->kuotapartisipan;
        $totalpartisipan = DB::table('partisipan')->where('idevent', $idevent)->count();

        if ($kuota > $totalpartisipan) {
            DB::table('eo')->where('idevent', $idevent)->update(['statuspenerimaan' => 1]);
            return 1;
        } else {
            DB::table('eo')->where('idevent', $idevent)->update(['statuspenerimaan' => 0]);
            return 0;
        }
    }


    /**
     * Create record in partisipan table using username and idevent
     * By Reyhan
     */
    public function createPartisipan($idevent, $username)
    {
        DB::table('partisipan')->insert([
            'idevent' => $idevent,
            'username' => $username
        ]);
    }

    /**
     * Create join request accepted notification for the user whose join request is accepted
     * By Reyhan
     */
    public function createNotifikasiJoinRequestAccepted($idevent, $usernamepn, $judulevent, $usernamepg) {

        $jenis = 3; //jenis notifikasi join request accepted = 3
        DB::table('notifikasi')->insert([
            'usernamepn' => $usernamepn,
            'jenis' => $jenis,
            'idevent' => $idevent,
            'judulevent' => $judulevent,
            'usernamepg' => $usernamepg
        ]);
    }

    /**
     * Delete user from calon partisipan
     * By Reyhan
     */
    public function deleteCalonPartisipan($idevent, $username) {
        DB::table('calonpartisipan')->where('idevent', $idevent)->where('username', $username)->delete();

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


    /**
     * Decline a join request to an event
     * By Reyhan
     */
    public function declineJoinRequest($idevent, $username)
    {
        RespondToAJoinRequestController::deleteCalonPartisipan($idevent, $username);

        $event = DB::table('eo')->where('idevent', $idevent)->first();
        $judulevent = $event->judulevent;
        $usernamepg = $event->usernamehost;
        RespondToAJoinRequestController::createNotifikasiJoinRequestDeclined($idevent, $username, $judulevent, $usernamepg);

        return redirect()->back();
    }


    /**
     * Create join request declined notification for the user whose join request is declined
     * By Reyhan
     */
    public function createNotifikasiJoinRequestDeclined($idevent, $usernamepn, $judulevent, $usernamepg) {

        $jenis = 4; //jenis notifikasi join request declined = 4
        DB::table('notifikasi')->insert([
            'usernamepn' => $usernamepn,
            'jenis' => $jenis,
            'idevent' => $idevent,
            'judulevent' => $judulevent,
            'usernamepg' => $usernamepg
        ]);
    }

}
