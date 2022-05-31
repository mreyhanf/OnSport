<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CancelJoinRequestToEventsController extends Controller
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
     * Delete the join request by user to an event
     * By Reyhan
     */
    public function cancelJoinRequest($idevent, $username)
    {
        if (DB::table('calonpartisipan')->where('idevent', $idevent)->where('username', $username)->exists()) {
        CancelJoinRequestToEventsController::deleteCalonPartisipan($idevent, $username);
        }

        return redirect()->back();
    }

    /**
     * Insert the user to calon partisipan list of the event
     * By Reyhan
     */
    public function deleteCalonPartisipan($idevent, $username)
    {
        DB::table('calonpartisipan')->where('idevent', $idevent)->where('username', $username)->delete();
    }

}
