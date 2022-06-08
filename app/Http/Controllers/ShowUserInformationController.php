<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShowUserInformationController extends Controller
{
    /**
     * Create a new controller instance.@error ('record')
     * @error
     * @enderror
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
    public function getUserInformation($username) {
        $userinfo = DB::table('users')->where('username', $username)->first();
        return view('userinformation',['userinfo' => $userinfo]);
    }
}
