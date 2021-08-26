<?php

namespace App\Http\Controllers;

use App\keuangan;
use Illuminate\Http\Request;

class CetakPemesananController extends Controller
{
    public function cetakpemesanan()
    {
        $cetakpemesanans = Pemesanan::all();
        $data['pemesanan'] = $cetakpemesanans;
        return view('pemesanan.cetakpemesanan', $data);
    }
  
}
