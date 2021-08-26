<?php

namespace App\Http\Controllers;

use App\pesanan_pelanggan;
use Illuminate\Http\Request;

class Pesanan_pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan_pelanggan = Pesanan_pelanggan::all();
        $data['pesanan_pelanggan'] = $pesanan_pelanggan;
        return view('pesanan_pelanggan.index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'pesanan_pelanggan.store';
        return view('pesanan_pelanggan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesanan_pelanggan = new pesanan_pelanggan();
        $pesanan_pelanggan -> nama_barang = $request->nama_barang;
        $pesanan_pelanggan-> jumlah = $request->jumlah;
        $pesanan_pelanggan-> harga = $request->harga;
        $pesanan_pelanggan-> tanggal_order = $request->tanggal_order;
        $pesanan_pelanggan-> tempat = $request->tempat;
        $pesanan_pelanggan-> no_telp = $request->no_telp;
        $pesanan_pelanggan-> total_harga = $request->total_harga;
        $pesanan_pelanggan ->save();

        return redirect('/pesanan_pelanggan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pesanan_pelanggan  $ppesanan_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan_pelanggan $pesanan_pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pesanan_pelanggan  $pesanan_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $pesanan_pelanggan = Pesanan_pelanggan::find($id);
        $data['pesanan_pelanggan'] = $pesanan_pelanggan;
        $data['action'] = 'pesanan_pelanggan/update';
        return view('pesanan_pelanggan.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pesanan_pelanggan  $ppesanan_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pesanan_pelanggan = Pesanan_pelanggan::find($request->id);
        $pesanan_pelanggan->nama_barang = $request->nama_barang;
        $pesanan_pelanggan->jumlah = $request->jumlah;
        $pesanan_pelanggan->harga = $request->harga;
        $pesanan_pelanggan->tanggal_order = $request->tanggal_order;
        $pesanan_pelanggan->tempat = $request->tempat;
        $pesanan_pelanggan->no_telp = $request->no_telp;        
        $pesanan_pelanggan->total_harga = $request->total_harga;
        $pesanan_pelanggan->save();
        return redirect('/pesanan_pelanggan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pesanan_pelanggan  $pesanan_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan_pelanggan $pesanan_pelanggan)
    {
        //
    }

    public function delete($id){
        $pesanan_pelanggan = Pesanan_pelanggan::find($id);
        $pesanan_pelanggan->delete();
        return redirect('/pesanan_pelanggan');
    }
}
