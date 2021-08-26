<?php

namespace App\Http\Controllers;

use App\keuangan;
use App\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keuangan1 = Akun::where('no_akun', 'like', '1%')->get();
        $keuangan2 = Akun::where('no_akun', 'like', '2%')->get();
        $keuangan3 = Akun::where('no_akun', 'like', '3%')->get();
        $data['keuangan1'] = $keuangan1;
        $data['keuangan2'] = $keuangan2;
        $data['keuangan3'] = $keuangan3;
        $data['total'] = 0;
        return view('keuangan.index', $data); 

    }

    public function cetakUang()
    {
        $keuangan1 = Akun::where('no_akun', 'like', '1%')->get();
        $keuangan2 = Akun::where('no_akun', 'like', '2%')->get();
        $keuangan3 = Akun::where('no_akun', 'like', '3%')->get();
        $data['keuangan1'] = $keuangan1;
        $data['keuangan2'] = $keuangan2;
        $data['keuangan3'] = $keuangan3;
        return view('keuangan.cetakUang', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'keuangan.store';
        return view('keuangan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keuangan = new keuangan();
        $keuangan -> nama = $request->nama;
        $keuangan-> coa = $request->coa;
        $keuangan-> tahun = $request->tahun;
        $keuangan-> jumlah = $request->jumlah;
        $keuangan-> total +=  $request->jumlah;
        $keuangan ->save();

        return redirect('/keuangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function show(keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $keuangan = keuangan::find($id);
        $data['keuangan'] = $keuangan;
        $data['action'] = 'keuangan/update';
        return view('keuangan.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $keuangan = keuangan::find($request->id);
        $keuangan->nama = $request->nama;
        $keuangan->coa = $request->coa;
        $keuangan->tahun = $request->tahun;
        $keuangan->jumlah = $request->jumlah;
        $keuangan->save();
        return redirect('/keuangan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(keuangan $keuangan)
    {
        //
    }

    public function delete($id){
        $keuangan = keuangan::find($id);
        $keuangan->delete();
        return redirect('/keuangan');
    }

    public function countTotal($keuangan){
        $total=0;
        if($keuangan->count()>0){
            $total_harga = $keuangan->pluck('total')->all();
            $total = array_sum($total_harga);
        }
        return $total;
    }

    public function cetak_pdf()
    {
        $keuangan = Keuangan::all();

        $pdf = PDF::loadview('keuangan_pdf',['keuangan'=>$keuangan]);
        return $pdf->download('Laporan-keuangan-pdf');
    }
  
}
