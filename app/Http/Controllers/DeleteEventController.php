<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DeleteEventController extends Controller
{
    /**
     * Delete event
     * By Reyhan
     */
    public function deleteEvent(Request $request) {

        $usernamehost = DB::table('eo')->where('idevent', $request->idevent)->first()->usernamehost;
        $user = Auth::user();
        if ($user->username == $usernamehost) {
            $partisipan = DB::table('partisipan')->where('idevent', $request->idevent)->get();
            $calonpartisipan = DB::table('calonpartisipan')->where('idevent', $request->idevent)->get();
            $event = DB::table('eo')->where('idevent', $request->idevent)->get();
            $judulevent = $event[0]->judulevent;
            $usernamepg = $user->username;

            DB::table('eo')->where('idevent',$request->idevent)->delete();

            // DB::table('eoikt')->where('idevent', $idevent)->delete();
            // DB::table('eorqt')->where('idevent', $idevent)->delete();
            DB::table('partisipan')->where('idevent', $request->idevent)->delete();
            DB::table('calonpartisipan')->where('idevent', $request->idevent)->delete();

            DeleteEventController::createDeleteEventNotification($request->idevent, $partisipan, $calonpartisipan, $judulevent, $usernamepg);

            return redirect('/my-events/created');
        }

        return redirect('/my-events/created');

    }


    /**
     * Create Delete Event Notification for all partisipan and calon partisipan
     * By Reyhan
     */
    public function createDeleteEventNotification($idevent, $partisipan, $calonpartisipan, $judulevent, $usernamepg) {

        $jenis = 1; //jenis notifikasi delete event = 1
        $timestamp = Carbon::now()->toDateTimeString();
        foreach ($partisipan as $p) {
            DB::table('notifikasi')->insert([
                'usernamepn' => $p->username,
                'jenis' => $jenis,
                'idevent' => $idevent,
                'judulevent' => $judulevent,
                'usernamepg' => $usernamepg,
                'created_at' => $timestamp
            ]);
        }

        foreach ($calonpartisipan as $cp) {
            DB::table('notifikasi')->insert([
                'usernamepn' => $cp->username,
                'jenis' => $jenis,
                'idevent' => $idevent,
                'judulevent' => $judulevent,
                'usernamepg' => $usernamepg,
                'created_at' => $timestamp
            ]);
        }

    }

}
