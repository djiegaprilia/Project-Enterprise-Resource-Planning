<?php

namespace App\Http\Controllers;

use App\pemesanan;
use App\barang;
use App\akun;
use Barang as GlobalBarang;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        $data['pemesanan'] = $pemesanan;
        return view('pemesanan.index', $data); 
    }
    public function cetakPesan()
    {
        $cetakpesan = pemesanan::all();
        $data['pemesanan'] = $cetakpesan;
        return view('pemesanan.cetakpemesanan', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        $data['barang'] = $barang;
        $data['action'] = 'pemesanan.store';
        return view('pemesanan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemesanan = new pemesanan();
        $pemesanan -> nama_barang = $request->nama_barang;
        $pemesanan-> jumlah = $request->jumlah;
        $pemesanan-> harga = $request->harga;
        $pemesanan-> tanggal_order = $request->tanggal_order;
        $pemesanan-> tempat = $request->tempat;
        $pemesanan-> no_telp = $request->no_telp;
        $pemesanan-> total_harga = $request->jumlah*$request->harga ;
        $pemesanan ->save();
        $barang = barang::where('nama_barang', $request->nama_barang)->get();
        foreach($barang as $key => $value){
            $barang = $barang->find($value->id);
            $barang->jumlah = $barang->jumlah + $request->jumlah;
            $barang->update();
        }
        $akun = akun::where('nama_akun','Pembelian')->get();
        foreach($akun as $key =>$value){
            $akun = $akun->find($value->id);
            $akun->jumlah = $akun->jumlah + ($request->jumlah*$request->harga);
            $akun->update();
        }
        $akun = akun::where('nama_akun','Persediaan Barang dagang')->get();
        foreach($akun as $key =>$value){
            $akun = $akun->find($value->id);
            $akun->jumlah = $akun->jumlah + ($request->jumlah*$request->harga);
            $akun->update();
        }
        $akun = akun::where('nama_akun','Utang Usaha')->get();
        foreach($akun as $key =>$value){
            $akun = $akun->find($value->id);
            $akun->jumlah = $akun->jumlah + ($request->jumlah*$request->harga);
            $akun->update();
        }
        return redirect('/pemesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $pemesanan = Pemesanan::find($id);
        $data['pemesanan'] = $pemesanan;
        $data['action'] = 'pemesanan/update';
        return view('pemesanan.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pemesanan = Pemesanan::find($request->id);
        $pemesanan->nama_barang = $request->nama_barang;
        $pemesanan->jumlah = $request->jumlah;
        $pemesanan->harga = $request->harga;
        $pemesanan->tanggal_order = $request->tanggal_order;
        $pemesanan->tempat = $request->tempat;
        $pemesanan->no_telp = $request->no_telp;        
        $pemesanan->total_harga = $request->jumlah*$request->harga;
        $pemesanan->save();
        return redirect('/pemesanan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }

    public function delete($id){
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();
        return redirect('/pemesanan');
    }

    public function countTotal($pemesanan){
        $total=0;
        if($pemesanan->count()>0){
            $total_harga = $pemesanan->pluck('total')->all();
            $total = array_sum($total_harga);
        }
        return $total;
    }

   
  
}
