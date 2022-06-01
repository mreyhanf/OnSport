<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
     * Cancel the join request by user to an event
     * By Reyhan
     */
    public function cancelJoinRequest(Request $request)
    {
        $user = Auth::user();
        if (DB::table('calonpartisipan')->where('idevent', $request->idevent)->where('username', $user->username)->exists()) {
        CancelJoinRequestToEventsController::deleteCalonPartisipan($request->idevent, $user->username);
        }

        return redirect()->back();
    }

    /**
     * Delete user from calon partisipan list of the event
     */
    public function deleteCalonPartisipan($idevent, $username)
    {
        DB::table('calonpartisipan')->where('idevent', $idevent)->where('username', $username)->delete();
    }

}
