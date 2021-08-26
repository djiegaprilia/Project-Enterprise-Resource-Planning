<?php

namespace App\Http\Controllers;

use App\data_gaji;
use Illuminate\Http\Request;

class data_gajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_gajis = Data_gaji::all();
        $data['data_gaji'] = $data_gajis;
        return view('data_gaji.index', $data);
    }

    public function cetakGaji()
    {
        $cetakgaji = data_gaji::all();
        $data['data_gaji'] = $cetakgaji;
        return view('data_gaji.cetakGaji', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action']= 'data_gaji.store';
        return view('data_gaji.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_gaji = new Data_gaji;
        $data_gaji->nama = $request->nama;
        $data_gaji->nip = $request->nip;
        $data_gaji->total_gaji = $request->total_gaji;
        $data_gaji->save();
        return redirect('/data_gaji');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data_gaji  $data_gaji
     * @return \Illuminate\Http\Response
     */
    public function show(data_gaji $data_gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data_gaji  $data_gaji
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
        $data_gaji = Data_gaji::find($id);
        $data['data_gaji'] = $data_gaji;
        $data['action'] = 'data_gaji/update';
        return view('data_gaji.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data_gaji  $data_gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data_gaji = Data_gaji::find($request->id);
        $data_gaji->nama = $request->nama;
        $data_gaji->nip = $request->nip;
        $data_gaji->total_gaji = $request->total_gaji;
        $data_gaji->save();
        return redirect('/data_gaji');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data_gaji  $data_gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_gaji $data_gaji)
    {
        //
    }
    public function delete($id){
        $data_gaji = Data_gaji::find($id);
        $data_gaji->delete();
        return redirect('/data_gaji');
    }
}
