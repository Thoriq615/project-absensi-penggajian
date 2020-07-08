<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
class mailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title' => 'Pemberitahuan',
            'body' => 'Testing email dari smptp'
        ];

        Mail::to('thoriqkamal18@gmail.com')->send(new MyEmail($details));
        return redirect()->back()->with('success', 'Email Berhasil Dikirim !!');

    }
}
