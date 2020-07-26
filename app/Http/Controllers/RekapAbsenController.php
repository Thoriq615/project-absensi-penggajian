<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RekapAbsen;
use App\Absen;
use DB;

class RekapAbsenController extends Controller
{
    public function index()
    {
        $data = Absen::select(
            'absens.id',
            'absens.id_jadwals',
            'absens.jumlah_tidak_hadir',
            'rekap_absens.jumlah_cuti',
            'jadwals.nama',
            'rekap_absens.potongan_perhari',
            'rekap_absens.jumlah_potongan'
        )
        ->leftjoin('rekap_absens', 'absens.id', '=', 'rekap_absens.id_absen')
        ->leftjoin('jadwals', 'absens.id_jadwals', '=', 'jadwals.id')
        ->get();

        return view('pages.rekap_absen', compact('data'));
    }

    public function edit($id)
    {
        $getData = RekapAbsen::FindOrFail($id);
        return $getData;
    }

    public function update(Request $request)
    {
        $jumlah_tidak_hadir = RekapAbsen::select('jumlah_tidak_hadir')->where('id_absen', '=', $request->id)->first();
        // dd($jumlah_tidak_hadir);
        // dd($getData);

        if($request->jumlah_cuti == null){
            $jumlah_cuti = 0;
        }else{
            $jumlah_cuti = $request->jumlah_cuti;
        }

        if($request->potongan_perhari == null){
            $potongan_perhari = 0;
        }else{
            $potongan_perhari = $request->potongan_perhari;
        }

        // dd($potongan_perhari);

        $data_update = DB::table('rekap_absens')
        ->where('rekap_absens.id_absen', $request->id)
        ->update([
            'jumlah_cuti'          => $jumlah_cuti,
            'potongan_perhari'     => $potongan_perhari,
            'jumlah_potongan'      => $potongan_perhari * $jumlah_tidak_hadir->jumlah_tidak_hadir
        ]);
        return redirect('/rekap_absen')->with('status', 'Data Berhasil Diubah');
    }
}
