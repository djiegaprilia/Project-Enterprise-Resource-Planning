<?php

namespace App\Http\Controllers;

use App\data_karyawan;
use Illuminate\Http\Request;

class data_karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_karyawans = data_karyawan::all();
        $data['data_karyawan'] = $data_karyawans;
        return view('data_karyawan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action']= 'data_karyawan.store';
        return view('data_karyawan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_karyawan = new data_karyawan;
        $data_karyawan->nama = $request->nama;
        $data_karyawan->jenis_kelamin = $request->jenis_kelamin;
        $data_karyawan->nip = $request->nip;
        $data_karyawan->no_hp = $request->no_hp;
        $data_karyawan->agama = $request->agama;
        $data_karyawan->alamat = $request->alamat;
        $data_karyawan->save();
        return redirect('/data_karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data_karyawan  $data_karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(data_karyawan $data_karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data_karyawan  $data_karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
        $data_karyawan = data_karyawan::find($id);
        $data['data_karyawan'] = $data_karyawan;
        $data['action'] = 'data_karyawan/update';
        return view('data_karyawan.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\data_karyawan  $data_karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data_karyawan = data_karyawan::find($request->id);
        $data_karyawan->nama = $request->nama;
        $data_karyawan->jenis_kelamin = $request->jenis_kelamin;
        $data_karyawan->nip = $request->nip;
        $data_karyawan->no_hp = $request->no_hp;
        $data_karyawan->agama = $request->agama;
        $data_karyawan->alamat = $request->alamat;
        $data_karyawan->save();
        return redirect('/data_karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data_karyawan  $data_karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_karyawan $data_karyawan)
    {
        //
    }
    public function delete($id){
        $data_karyawan = data_karyawan::find($id);
        $data_karyawan->delete();
        return redirect('/data_karyawan');
    }
}
