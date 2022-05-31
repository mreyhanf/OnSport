<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteEventController extends Controller
{
    /**
     * Delete event
     * By Reyhan
     */
    public function deleteEvent($idevent) {

        $partisipan = DB::table('partisipan')->where('idevent', $idevent)->get();
        $calonpartisipan = DB::table('calonpartisipan')->where('idevent', $idevent)->get();
        $event = DB::table('eo')->where('idevent', $idevent)->get();
        $judulevent = $event[0]->judulevent;
        $usernamepg = $event[0]->usernamehost;

	    DB::table('eo')->where('idevent',$idevent)->delete();

        DB::table('eoikt')->where('idevent', $idevent)->delete();
        DB::table('eorqt')->where('idevent', $idevent)->delete();
        DB::table('partisipan')->where('idevent', $idevent)->delete();
        DB::table('calonpartisipan')->where('idevent', $idevent)->delete();

        DeleteEventController::createDeleteEventNotification($idevent, $partisipan, $calonpartisipan, $judulevent, $usernamepg);

        return redirect('/myevents/created');
    }


    /**
     * Create Delete Event Notification for all partisipan and calon partisipan
     * By Reyhan
     */
    public function createDeleteEventNotification($idevent, $partisipan, $calonpartisipan, $judulevent, $usernamepg) {

        $jenis = 1; //jenis notifikasi delete event = 1
        foreach ($partisipan as $p) {
            DB::table('notifikasi')->insert([
                'usernamepn' => $p->username,
                'jenis' => $jenis,
                'idevent' => $idevent,
                'judulevent' => $judulevent,
                'usernamepg' => $usernamepg
            ]);
        }

        foreach ($calonpartisipan as $cp) {
            DB::table('notifikasi')->insert([
                'usernamepn' => $cp->username,
                'jenis' => $jenis,
                'idevent' => $idevent,
                'judulevent' => $judulevent,
                'usernamepg' => $usernamepg
            ]);
        }

    }

}
