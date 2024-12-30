<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function GuestView1()
    {
        return view('Guest.Utama');
    }
    public function GuestView2()
    {
        return view('Guest.Syarat');
    }

    public function GuestView3()
    {
        return view('Guest.Infaq');
    }
}
