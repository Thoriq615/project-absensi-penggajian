<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use App\Jadwal;
use App\RekapAbsen;
use DB;

class AbsenController extends Controller
{
    public function index()
    {
        // $data = Absen::select('absens.id','tanggal_hadir','jam_hadir','jam_pulang','jumlah_tidak_hadir','id_jadwals','jadwals.nama')
        // ->join('jadwals','absens.id_jadwals', '=','jadwals.id')
        // ->get();
        $data = Absen::all();
        // dd($data);

        $jadwal = Jadwal::select('id','nama')->get();
        // dd($jadwal);

        return view('pages.absen', compact('data','jadwal'));
    }

    public function create(Request $request)
    {
        $data_absen = Absen::create([
            'nama'               => $request->nama,
            'tanggal_hadir'      => $request->tanggal_hadir,
            'jam_hadir'          => $request->jam_hadir,
            'jam_pulang'         => $request->jam_pulang,
            'jumlah_tidak_hadir' => $request->jumlah_tidak_hadir
        ]);

        $data = RekapAbsen::create([
            'id_absen' => $data_absen->id,
            'jumlah_cuti' => 0,
            'jumlah_tidak_hadir' => $data_absen->jumlah_tidak_hadir,
            'potongan_perhari' => 0,
            'jumlah_potongan' => 0,
        ]);
        

        return redirect('/absen')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        // dd($id);
        $getData = Absen::FindOrFail($id);

        return view('pages.absen', ['getData' => $getData]);
    }

    public function update(Request $request)
    {
        // dd($request->all());

        $data_update = DB::table('absens')
        ->where('absens.id', $request->id2)
        ->update([
            'nama'               => $request->nama2,
            'tanggal_hadir'      => $request->tanggal_hadir2,
            'jam_hadir'          => $request->jam_hadir2,
            'jam_pulang'         => $request->jam_pulang2,
            'jumlah_tidak_hadir' => $request->jumlah_tidak_hadir2
        ]);
        return redirect('/absen')->with('status', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = DB::table('absens')
        ->where('id', $id)
        ->delete();

        return redirect('/absen')->with('status', 'Data Berhasil Dihapus');
    }
}