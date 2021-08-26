<?php

namespace App\Http\Controllers;

use App\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengiriman = Pengiriman::all();
        $data['pengiriman'] = $pengiriman;
        return view('pengiriman.index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'pengiriman.store';
        return view('pengiriman.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengiriman = new pengiriman();
        $pengiriman -> kode_pengiriman = $request->kode_pengiriman;
        $pengiriman-> kode_supplier = $request->kode_supplier;
        $pengiriman-> jumlah = $request->jumlah;
        $pengiriman-> harga = $request->harga;
        $pengiriman-> tgl_permintaan = $request->tgl_permintaan;
        $pengiriman-> tgl_pengiriman = $request->tgl_pengiriman;
        $pengiriman-> total_harga = $request->total_harga;
        $pengiriman ->save();

        return redirect('/pengiriman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $pengiriman = Pengiriman::find($id);
        $data['pengiriman'] = $pengiriman;
        $data['action'] = 'pengiriman/update';
        return view('pengiriman.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pengiriman = Pengiriman::find($request->id);
        $pengiriman -> kode_pengiriman = $request->kode_pengiriman;
        $pengiriman-> kode_supplier = $request->kode_supplier;
        $pengiriman-> jumlah = $request->jumlah;
        $pengiriman-> harga = $request->harga;
        $pengiriman-> tgl_permintaan = $request->tgl_permintaan;
        $pengiriman-> tgl_pengiriman = $request->tgl_pengiriman;
        $pengiriman-> total_harga = $request->total_harga;
        $pengiriman->save();
        return redirect('/pengiriman');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        //
    }

    public function delete($id){
        $pengiriman = Pengiriman::find($id);
        $pengiriman->delete();
        return redirect('/pengiriman');
    }
}
