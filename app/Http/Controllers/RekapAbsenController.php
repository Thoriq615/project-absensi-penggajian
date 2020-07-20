<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RekapAbsen;
use DB;

class RekapAbsenController extends Controller
{
    public function index()
    {
        $data = RekapAbsen::all();
        return view('pages.rekap_absen', compact('data'));
    }

    public function edit($id)
    {
        $getData = RekapAbsen::FindOrFail($id);

        return $getData;
    }

    public function update(Request $request)
    {
        $data_update = DB::table('rekap_absens')
        ->where('rekap_absens.id', $request->id)
        ->update([
            'nama'                 => $request->nama,
            'jumlah_cuti'          => $request->jumlah_cuti,
            'jumlah_tidak_hadir'   => $request->jumlah_tidak_hadir,
            'potongan'             => $request->potongan_perhari,
            'jumlah_potongan'      => $request->jumlah_potongan
        ]);
        return redirect('/rekap_absen')->with('status', 'Data Berhasil Diubah');
    }
}
