<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
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
     * Show Profile page
     * By Kiki
     */
    public function getProfile() {
        $user = Auth::user();
        $userpreferensiolahraga = DB::table('preferensiolahraga')->where('username', $user->username)->get();
        $userinfo =  DB::table('users')->where('username', $user->username)->first();
        return view('profile',['userpreferensiolahraga' => $userpreferensiolahraga, 'userinfo' => $userinfo]);
        //Session::put('profilepage_url', request()->fullUrl());
    }


}
