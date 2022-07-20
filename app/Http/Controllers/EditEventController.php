<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class EditEventController extends Controller
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

    public function editEvent(Request $request, $idevent)
    {
	// mengambil data event berdasarkan id event yang dipilih
	$eo = DB::table('eo')->where('idevent',$idevent)->get();
	// passing data event yang didapat ke view editevent.blade.php
	return view('editevent',['eo' => $eo]);
    }

    // update data event
    public function update(Request $request)
    {
        $user = Auth::user();
        $date = date('Y-m-d', strtotime($request->tanggal));

        // menyimpan data file gambar yang diupload ke variabel $file
		$file = $request->file('gambar');

        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'events_image';

        $namadanlokasi = '';
        if(!empty($file)) {
            $namadanlokasi = $tujuan_upload . "/" . $file->getClientOriginalName(); //teknik tanpa direname
        }
        $kuotapartisipan = DB::table('eo')->where('idevent',$request->idevent)->value('kuotapartisipan');
	// update data event
        DB::table('eo')->where('idevent',$request->idevent)->update([
	    'usernamehost'=> $user->username,
		'judulevent' => $request->judulevent,
		'kategori' => $request->kategori,
        'tanggal' => $date,
        'jam' => $request->jam,
        'lokasi' => $request->lokasi,
        'kota' => $request->kota,
        'rangeub' => $request->rangeub,
        'rangeua' => $request->rangeua,
        'levelkeahlian' => $request->levelkeahlian,
        'kuotapartisipan' => $kuotapartisipan,
        'catatan' => $request->catatan,
        'gambar' => $namadanlokasi
	]);
        if(!empty($file)) {
            // upload file
            $file->move($tujuan_upload,$file->getClientOriginalName());
        }

        EditEventController::updateJudulNotifikasi($request->idevent, $request->judulevent);

        $partisipan = DB::table('partisipan')->where('idevent', $request->idevent)->get();
        $calonpartisipan = DB::table('calonpartisipan')->where('idevent', $request->idevent)->get();
        $event = DB::table('eo')->where('idevent', $request->idevent)->get();
        $judulevent = $event[0]->judulevent;
        $usernamepg = $user->username;

        EditEventController::createEditEventNotification($request->idevent, $partisipan, $calonpartisipan, $judulevent, $usernamepg);

        // alihkan halaman ke halaman event details
        return redirect('/event/details/' . $request->idevent);
    }

    public function updateJudulNotifikasi($idevent, $judulevent)
    {
        DB::table('notifikasi')->where('idevent', $idevent)->update([
            'judulevent' => $judulevent
        ]);
    }

    public function createEditEventNotification($idevent, $partisipan, $calonpartisipan, $judulevent, $usernamepg) {

        $jenis = 6; //jenis notifikasi edit event = 6
        $timestamp = Carbon::now()->toDateTimeString();
        foreach ($partisipan as $p) {
            DB::table('notifikasi')->insert([
                'usernamepn' => $p->username,
                'jenis' => $jenis,
                'idevent' => $idevent,
                'judulevent' => $judulevent,
                'usernamepg' => $usernamepg,
                'created_at' => $timestamp
            ]);
        }

        foreach ($calonpartisipan as $cp) {
            DB::table('notifikasi')->insert([
                'usernamepn' => $cp->username,
                'jenis' => $jenis,
                'idevent' => $idevent,
                'judulevent' => $judulevent,
                'usernamepg' => $usernamepg,
                'created_at' => $timestamp
            ]);
        }

    }
}
