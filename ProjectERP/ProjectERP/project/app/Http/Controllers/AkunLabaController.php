<?php

namespace App\Http\Controllers;

use App\akunLaba;
use Illuminate\Http\Request;
use PDF;

class AkunLabaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akunLaba = Akun::all();
        $data['akunLaba'] = $akunLaba;
        $data['total'] = 0;
        return view('akunLaba.index', $data); 


    }

    public function cetakUang()
    {
        $cetakakunLaba = akunLaba::all();
        $data['akunLaba'] = $cetakakunLaba;
        return view('akunLaba.cetakUang', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'akunLaba.store';
        return view('akunLaba.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $akunLaba = new akunLaba();
        $akunLaba -> no_akunLaba = $request->no_akunLaba;
        $akunLaba-> nama_akunLaba = $request->nama_akunLaba;
        $akunLaba-> jumlah = $request->jumlah;
        $akunLaba-> total +=  $request->jumlah;
        $akunLaba ->save();

        return redirect('/akunLaba');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\akunLaba  $akunLaba
     * @return \Illuminate\Http\Response
     */
    public function show(akunLaba $akunLaba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\akunLaba  $akunLaba
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $akunLaba = akunLaba::find($id);
        $data['akunLaba'] = $akunLaba;
        $data['action'] = 'akunLaba/update';
        return view('akunLaba.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\akunLaba  $akunLaba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $akunLaba = akunLaba::find($request->id);
        $akunLaba->no_akunLaba = $request->no_akunLaba;
        $akunLaba->nama_akunLaba = $request->nama_akunLaba;
        $akunLaba->jumlah = $request->jumlah;
        $akunLaba->save();
        return redirect('/akunLaba');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\akunLaba  $akunLaba
     * @return \Illuminate\Http\Response
     */
    public function destroy(akunLaba $akunLaba)
    {
        //
    }

    public function delete($id){
        $akunLaba = akunLaba::find($id);
        $akunLaba->delete();
        return redirect('/akunLaba');
    }

    public function countTotal($akunLaba){
        $total=0;
        if($akunLaba->count()>0){
            $total_harga = $akunLaba->pluck('total')->all();
            $total = array_sum($total_harga);
        }
        return $total;
    }

    public function cetak_pdf()
    {
        $akunLaba = AkunLaba::all();

        $pdf = PDF::loadview('akunLaba_pdf',['akunLaba'=>$akunLaba]);
        return $pdf->download('Laporan-akunLaba-pdf');
    }
  
}
