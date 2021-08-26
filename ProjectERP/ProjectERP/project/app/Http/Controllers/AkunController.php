<?php

namespace App\Http\Controllers;

use App\akun;
use Illuminate\Http\Request;
use PDF;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = akun::all();
        $data['akun'] = $akun;
        $data['total'] = 0;
        return view('akun.index', $data); 


    }

    public function cetakUang()
    {
        $cetakakun = akun::all();
        $data['akun'] = $cetakakun;
        return view('akun.cetakUang', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'akun.store';
        return view('akun.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $akun = new akun();
        $akun -> no_akun = $request->no_akun;
        $akun-> nama_akun = $request->nama_akun;
        $akun-> jumlah = $request->jumlah;
        $akun-> total +=  $request->jumlah;
        $akun ->save();

        return redirect('/akun');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $akun = akun::find($id);
        $data['akun'] = $akun;
        $data['action'] = 'akun/update';
        return view('akun.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $akun = akun::find($request->id);
        $akun->no_akun = $request->no_akun;
        $akun->nama_akun = $request->nama_akun;
        $akun->jumlah = $request->jumlah;
        $akun->save();
        return redirect('/akun');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy(akun $akun)
    {
        //
    }

    public function delete($id){
        $akun = akun::find($id);
        $akun->delete();
        return redirect('/akun');
    }

    public function countTotal($akun){
        $total=0;
        if($akun->count()>0){
            $total_harga = $akun->pluck('total')->all();
            $total = array_sum($total_harga);
        }
        return $total;
    }

    public function cetak_pdf()
    {
        $akun = Akun::all();

        $pdf = PDF::loadview('akun_pdf',['akun'=>$akun]);
        return $pdf->download('Laporan-akun-pdf');
    }
  
}
