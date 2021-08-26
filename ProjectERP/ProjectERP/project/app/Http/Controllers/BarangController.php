<?php

namespace App\Http\Controllers;

use App\barang;
use Illuminate\Http\Request;
use PDF;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::all();
        $data['barang'] = $barang;
        return view('barang.index', $data); 
    }

    public function cetakUang()
    {
        $cetakbarang = barang::all();
        $data['barang'] = $cetakbarang;
        return view('barang.cetakUang', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'barang.store';
        return view('barang.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new barang();
        $barang -> nama_barang = $request->nama;
        $barang-> jumlah = $request->jumlah;
        $barang-> harga = $request->harga;
        $barang-> tanggal_order = $request->tanggal_order;
        $barang ->save();

        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $barang = barang::find($id);
        $data['barang'] = $barang;
        $data['action'] = 'barang/update';
        return view('barang.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $barang = barang::find($request->id);
        $barang -> nama_barang = $request->nama;
        $barang-> jumlah = $request->jumlah;
        $barang-> harga = $request->harga;
        $barang-> tanggal_order = $request->tanggal_order;
        $barang->save();
        return redirect('/barang');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        //
    }

    public function delete($id){
        $barang = barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }

    public function countTotal($barang){
        $total=0;
        if($barang->count()>0){
            $total_harga = $barang->pluck('total')->all();
            $total = array_sum($total_harga);
        }
        return $total;
    }

    public function cetak_pdf()
    {
        $barang = Barang::all();

        $pdf = PDF::loadview('barang_pdf',['barang'=>$barang]);
        return $pdf->download('Laporan-barang-pdf');
    }
  
}
