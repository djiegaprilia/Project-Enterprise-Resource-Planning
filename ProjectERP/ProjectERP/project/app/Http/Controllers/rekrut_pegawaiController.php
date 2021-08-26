<?php

namespace App\Http\Controllers;

use App\rekrut_pegawai;
use Illuminate\Http\Request;

class rekrut_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekrut_pegawais = Rekrut_pegawai::all();
        $data['rekrut_pegawai'] = $rekrut_pegawais;
        return view('rekrut_pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action']= 'rekrut_pegawai.store';
        return view('rekrut_pegawai.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rekrut_pegawai = new Rekrut_pegawai;
        $rekrut_pegawai->nama_pegawai = $request->nama_pegawai;
        $rekrut_pegawai->jenis_kelamin = $request->jenis_kelamin;
        $rekrut_pegawai->no_hp = $request->no_hp;
        $rekrut_pegawai->agama = $request->agama;
        $rekrut_pegawai->alamat = $request->alamat;
        $rekrut_pegawai->pendidikan = $request->pendidikan;
        $rekrut_pegawai->save();
        return redirect('/rekrut_pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rekrut_pegawai  $rekrut_pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(rekrut_pegawai $rekrut_pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekrut_pegawai  $rekrut_pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
        $rekrut_pegawai = Rekrut_pegawai::find($id);
        $data['rekrut_pegawai'] = $rekrut_pegawai;
        $data['action'] = 'rekrut_pegawai/update';
        return view('rekrut_pegawai.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekrut_pegawai  $rekrut_pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rekrut_pegawai = Rekrut_pegawai::find($request->id);
        $rekrut_pegawai->nama_pegawai = $request->nama_pegawai;
        $rekrut_pegawai->jenis_kelamin = $request->jenis_kelamin;
        $rekrut_pegawai->no_hp = $request->no_hp;
        $rekrut_pegawai->agama = $request->agama;
        $rekrut_pegawai->alamat = $request->alamat;
        $rekrut_pegawai->pendidikan = $request->pendidikan;
        $rekrut_pegawai->save();
        return redirect('/rekrut_pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekrut_pegawai  $rekrut_pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(rekrut_pegawai $rekrut_pegawai)
    {
        //
    }
    public function delete($id){
        $rekrut_pegawai = Rekrut_pegawai::find($id);
        $rekrut_pegawai->delete();
        return redirect('/rekrut_pegawai');
    }
}
