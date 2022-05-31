<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowUserInformationController extends Controller
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
     * Show user information page
     * By Reyhan
     */
    public function getUserInformation($username) {
        $userinfo = DB::table('users')->where('username', $username)->first();
        $userpreferensiolahraga = DB::table('preferensiolahraga')->where('username', $username)->get();
        return view('userinformation',['userinfo' => $userinfo, 'userpreferensiolahraga' => $userpreferensiolahraga]);
    }
}
