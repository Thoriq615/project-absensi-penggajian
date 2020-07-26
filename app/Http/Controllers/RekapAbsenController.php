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
            'absens.id_pegawai',
            'absens.jumlah_tidak_hadir',
            'rekap_absens.jumlah_cuti',
            'rekap_absens.potongan_perhari'
        )
        ->leftjoin('rekap_absens', 'absens.id', '=', 'rekap_absens.id_absen')->get();

        return view('pages.rekap_absen', compact('data'));
    }

    public function edit($id)
    {
        $getData = RekapAbsen::FindOrFail($id);
        return $getData;
    }

    public function update(Request $request)
    {
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
        ]);
        return redirect('/rekap_absen')->with('status', 'Data Berhasil Diubah');
    }
}