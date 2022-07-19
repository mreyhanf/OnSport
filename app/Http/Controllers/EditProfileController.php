<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EditProfileController extends Controller
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
     * EditProfile
     * By Kiki
     */

    // display form edit profile
    public function edit()
    {
        $user = Auth::user();
        $userpreferensiolahraga = DB::table('preferensiolahraga')->where('username', $user->username)->get();
        $preferensi_olahraga = [];
        foreach($userpreferensiolahraga as $userprefor) {
            array_push($preferensi_olahraga, $userprefor->kategori);
        }
        $userinfo =  DB::table('users')->where('username', $user->username)->first();
        return view('editprofile',['preferensi_olahraga' => $preferensi_olahraga, 'userinfo' => $userinfo]);

    }

    /**
     * Get a validator for an edit profile  request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:20', 'unique:users,username'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'tanggallahir'=> ['required'],
            'gender'=> ['required'],
            'kota' => ['required'],
            'gambar'=> ['image'],
            'preferensiolahraga' => ['required', 'min:1']
        ]);
    }


    // update data
    public function update(Request $request)
    {
        $user = Auth::user();
        $date = date('Y-m-d', strtotime($request->tanggallahir));


        $error_array = array();
        if (DB::table('users')->where('username', $request->username)->where('id', '<>', Auth::id())->exists()) {
            $error_message_username = "The entered username already exists.";
           array_push($error_array, $error_message_username);
        }

        if (DB::table('users')->where('email', $request->email)->where('id', '<>', Auth::id())->exists()) {
            $error_message_email = "The entered email is already used.";
            array_push($error_array, $error_message_email);
        }

        if (!empty($error_array)) {
            return redirect()->back()->with(['error_messages' => $error_array]);
        }

        // menyimpan data file gambar yang diupload ke variabel $file
		$file = $request->file('gambar');

        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'users_image';
        $namadanlokasi = '' ;
        if(!empty($file)) {
            $namadanlokasi = $tujuan_upload . "/" . $file->getClientOriginalName(); //teknik tanpa direname
        }
	// update data ke table users
        DB::table('users')->where('username',$request->username)->update([
            'username'=> $request->username,
            'name'=> $request->name,
            'email'=> $request->email,
            'tanggallahir'=> $date,
            'gender'=> $request->gender,
            'akunmedsos'=> $request->akunmedsos,
            'kota'=> $request->kota,
            'gambar'=> $namadanlokasi
        ]);

    if(!empty($file)) {
        // upload file
        $file->move($tujuan_upload,$file->getClientOriginalName());
    }

    // delete data preferensiolahraga
        DB::table('preferensiolahraga')->where('username',$request->username)->delete();

    // insert data ke table preferensiolahraga
    $preferensiolahraga = $request->preferensiolahraga;
    foreach($preferensiolahraga as $po){
        DB::table('preferensiolahraga')->insert([
            'username' => $user->username,
            'kategori'=> $po
        ]);
    }


    // alihkan halaman
    return redirect('/profile');
    //if(session('profilepage_url')){
    //return redirect(session('profilepage_url'));
    //}

    }
}
