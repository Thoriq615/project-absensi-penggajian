<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use App\Jadwal;
use App\Imports\AbsenImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Session;
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
        // dd($request->all());
        // $jadwal = DB::table('jadwals')->where('id', $request->id_jadwals)->first();
        // // dd($jadwal);
        // if (empty($jadwal)) {
        //     $jadwal_id = Absen::select('jadwals.nama')
        //                     ->join('jadwals', 'absens.id_jadwals','=','jadwals.id')
        //                     ->where('id_jadwals', $request->id_jadwals)
        //                     ->first();
                            // dd($jadwal_id);
        $data = Absen::create([
            'nama'               => $request->nama,
            'tanggal_hadir'      => $request->tanggal_hadir,
            'jam_hadir'          => $request->jam_hadir,
            'jam_pulang'         => $request->jam_pulang,
            'jumlah_tidak_hadir' => $request->jumlah_tidak_hadir
        ]);
        // dd($data);
        // }
        return redirect('/absen')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        // dd($id);
        $getData = Absen::Find($id);
        // dd($getData);

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

    public function import_excel(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);

		// import data
		Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/siswa');
	}
}
