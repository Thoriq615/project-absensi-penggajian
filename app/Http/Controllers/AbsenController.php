<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;

class AbsenController extends Controller
{
    public function index()
    {
        $data = Absen::all();
        // dd($data);
        return view('absen.index', compact('data'));
    }
}
