<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShowNotifications extends Controller
{
    public function showNotifications() {
        $user = Auth::user();
        $notifications = DB::table('notifikasi')->where('usernamepn', $user->username)->orderBy('idnotifikasi', 'desc')->get();

        return view('notifications', ['notifications' => $notifications]);
    }
}
