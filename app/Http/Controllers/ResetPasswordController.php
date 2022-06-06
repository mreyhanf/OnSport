<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    public function displayResetpasswordpage() {
        return view("auth.reset-password");
    }

    public function resetPassword(Request $request) {
       $validation=$request->validate([
           'email' => 'required',
           'password' => 'required|min:8|required_with:confirmpassword|same:confirmpassword',
           'confirmpassword' => 'required'
       ]);
       
        DB::table('users')
        ->where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

        return redirect('/login');
    }
}
