<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use DB;

class JadwalController extends Controller
{
    public function index()
    {
        $data = Jadwal::all();
        return view('pages.jadwal', compact('data'));
    }
}
