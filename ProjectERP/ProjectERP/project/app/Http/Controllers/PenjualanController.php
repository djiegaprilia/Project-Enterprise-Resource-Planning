<?php

namespace App\Http\Controllers;

use App\penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        $data['penjualan'] = $penjualan;
        return view('penjualan.index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'penjualan.store';
        return view('penjualan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjualan = new penjualan();
        $penjualan-> nama_barang = $request->nama_barang;
        $penjualan-> jumlah = $request->jumlah;
        $penjualan-> harga = $request->harga;
        $penjualan-> tanggal_jual = $request->tanggal_jual;
        $penjualan-> total_jual = $request->total_jual;
        $penjualan-> info_jual = $request->info_jual;
        $penjualan ->save();

        return redirect('/penjualan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $penjualan = Penjualan::find($id);
        $data['penjualan'] = $penjualan;
        $data['action'] = 'penjualan/update';
        return view('penjualan.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penjualan  $ppenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $penjualan = Penjualan::find($request->id);
        $penjualan-> nama_barang = $request->nama_barang;
        $penjualan-> jumlah = $request->jumlah;
        $penjualan-> harga = $request->harga;
        $penjualan-> tanggal_jual = $request->tanggal_jual;      
        $penjualan-> total_jual = $request->total_jual;
        $penjualan-> info_jual = $request->info_jual;
        $penjualan->save();
        return redirect('/penjualan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjualan $penjualan)
    {
        //
    }

    public function delete($id){
        $penjualan = Penjualan::find($id);
        $penjualan->delete();
        return redirect('/penjualan');
    }
}
