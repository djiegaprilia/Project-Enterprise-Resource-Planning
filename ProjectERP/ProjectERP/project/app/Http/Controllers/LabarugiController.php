<?php

namespace App\Http\Controllers;

use App\labarugi;
use App\akun;
use Illuminate\Http\Request;

class LabarugiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labarugi1 = akun::where('no_akun', 'like', '4%')->get();
        $labarugi2 = akun::where('no_akun', 'like', '5%')->get();
        $data['labarugi1'] = $labarugi1;
        $data['labarugi2'] = $labarugi2;
        $data['total'] = 0;
        return view('labarugi.index', $data); 
    }
    public function cetakUang()
    {
        $labarugi1 = akun::where('no_akun', 'like', '4%')->get();
        $labarugi2 = akun::where('no_akun', 'like', '5%')->get();
        $data['labarugi1'] = $labarugi1;
        $data['labarugi2'] = $labarugi2;
        return view('labarugi.cetakLaba', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'labarugi.store';
        return view('labarugi.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $labarugi = new labarugi();
        $labarugi -> nama = $request->nama;
        $labarugi-> account = $request->account;
        $labarugi-> tahun = $request->tahun;
        $labarugi-> jumlah = $request->jumlah;
        $labarugi ->save();

        return redirect('/labarugi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\labarugi  $labarugi
     * @return \Illuminate\Http\Response
     */
    public function show(labarugi $labarugi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\labarugi  $labarugi
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        $labarugi = labarugi::find($id);
        $data['labarugi'] = $labarugi;
        $data['action'] = 'labarugi/update';
        return view('labarugi.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\labarugi  $labarugi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $labarugi = labarugi::find($request->id);
        $labarugi->nama = $request->nama;
        $labarugi->account = $request->account;
        $labarugi->tahun = $request->tahun;
        $labarugi->jumlah = $request->jumlah;
        $labarugi->save();
        return redirect('/labarugi');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\labarugi  $labarugi
     * @return \Illuminate\Http\Response
     */
    public function destroy(labarugi $labarugi)
    {
        //
    }

    public function delete($id){
        $labarugi = labarugi::find($id);
        $labarugi->delete();
        return redirect('/labarugi');
    }

    public function countTotal($labarugi){
        $total=0;
        if($labarugi->count()>0){
            $total_harga = $labarugi->pluck('total')->all();
            $total = array_sum($total_harga);
        }
        return $total;
    }
  
}
