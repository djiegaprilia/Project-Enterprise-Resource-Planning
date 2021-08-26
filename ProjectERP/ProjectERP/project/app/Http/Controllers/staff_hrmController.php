<?php

namespace App\Http\Controllers;

use App\staff_hrm;
use Illuminate\Http\Request;

class staff_hrmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff_hrm = Staff_hrm::all();
        $data['staff_hrm'] = $staff_hrm;
        return view('staff_hrm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action']= 'staff_hrm.store';
        return view('staff_hrm.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff_hrm = new Staff_hrm;
        $staff_hrm->nama = $request->nama;
        $staff_hrm->alamat = $request->alamat;
        $staff_hrm->no_hp = $request->no_hp;
        $staff_hrm->save();
        return redirect('/staff_hrm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff_hrm  $staff_hrm
     * @return \Illuminate\Http\Response
     */
    public function show(staff_hrm $staff_hrm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff_hrm  $staff_hrm
     * @return \Illuminate\Http\Response
     */
    public function edit($id="")
    {
        $staff_hrm = staff_hrm::find($id);
        $data['staff_hrm'] = $staff_hrm;
        $data['action'] = 'staff_hrm/update';
        return view('staff_hrm.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff_hrm  $staff_hrm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $staff_hrm = staff_hrm::find($request->id);
        $staff_hrm->nama= $request->nama;
        $staff_hrm->alamat = $request->alamat;
        $staff_hrm->no_hp = $request->no_hp;
        $staff_hrm->save();
        return redirect('/staff_hrm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff_hrm  $staff_hrm
     * @return \Illuminate\Http\Response
     */
    public function destroy(staff_hrm $staff_hrm)
    {
        //
    }
    public function delete($id){
        $staff_hrm = staff_hrm::find($id);
        $staff_hrm->delete();
        return redirect('/staff_hrm');
    }
}
