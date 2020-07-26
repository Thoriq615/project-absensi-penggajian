<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RekapAbsen;
use App\Absen;
use App\Jadwal;
use DB;

class PenggajianController extends Controller
{
    //
    public function index(){
        $user = Jadwal::select(
            'jadwals.nama as nama', 
            'jadwals.gaji as gaji_awal',
            'rekap_absens.jumlah_tidak_hadir',
            'rekap_absens.potongan_perhari',
            'rekap_absens.jumlah_potongan',
            DB::raw('jadwals.gaji - (rekap_absens.potongan_perhari * rekap_absens.jumlah_tidak_hadir) as gaji_net')
            )
        ->leftJoin('absens', 'absens.id_jadwals', '=', 'jadwals.id')
        ->leftJoin('rekap_absens', 'rekap_absens.id_absen', '=', 'absens.id')
        ->get();
        // dd($user);

        return view('pages.penggajian', compact('user'));
    }

    public function laporan(){
        $user = Jadwal::select(
            'jadwals.nama as nama', 
            'jadwals.gaji as gaji_awal',
            'rekap_absens.jumlah_tidak_hadir',
            'rekap_absens.potongan_perhari',
            'rekap_absens.jumlah_potongan',
            DB::raw('jadwals.gaji - (rekap_absens.potongan_perhari * rekap_absens.jumlah_tidak_hadir) as gaji_net')
            )
        ->leftJoin('absens', 'absens.id_jadwals', '=', 'jadwals.id')
        ->leftJoin('rekap_absens', 'rekap_absens.id_absen', '=', 'absens.id')
        ->get();
        return view('pages.laporan', compact('user'));
    }
}
