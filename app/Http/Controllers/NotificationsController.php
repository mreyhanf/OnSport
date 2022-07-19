<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
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

    public function showNotifications() {
        $user = Auth::user();
        $notifications = DB::table('notifikasi')->where('usernamepn', $user->username)->orderBy('idnotifikasi', 'desc')->get();

        return view('notifications', ['notifications' => $notifications]);
    }

    public function deleteAllNotifications(Request $request)
    {
        DB::table('notifikasi')->where('usernamepn', $request->usernamepn)->delete();
        return redirect('/notifications');
    }
}
