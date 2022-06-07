<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditEventController extends Controller
{
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
        $date = date('Y-m-d', strtotime($request->tanggal));

        // menyimpan data file gambar yang diupload ke variabel $file
		$file = $request->file('gambar');

        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'events_image';

        $namadanlokasi = $tujuan_upload . "/" . $file->getClientOriginalName(); //teknik tanpa direname
        $kuotapartisipan = DB::table('eo')->where('idevent',$request->idevent)->value('kuotapartisipan');
	// update data event
        DB::table('eo')->where('idevent',$request->idevent)->update([
	    'usernamehost'=> 'hrkurnia',
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
    // upload file
    $file->move($tujuan_upload,$file->getClientOriginalName());

	// alihkan halaman ke halaman event details
	return redirect('/event/details/' . $request->idevent);
    }
}
