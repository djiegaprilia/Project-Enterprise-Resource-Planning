<?php

namespace App\Http\Controllers;

use App\SalesInvoice;
use App\SalesOrder;
use App\Barang;
use App\akun;
use App\SalesItem;
use Illuminate\Http\Request;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_invoice = SalesInvoice::all();
        $data['sales_invoice'] = $sales_invoice;
        return view('sales_invoice.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idsales_order = SalesOrder::all()->unique('salesorder');
        $sales_order = SalesOrder::all();
        $barang = Barang::all();
        $data['idsalesorder'] = $idsales_order;
        $data['total'] = 0;
        $data['barang'] = $barang;
        $data['sales_order'] = $sales_order;
        $data['action'] = 'salesInvoice.store';
        return view('sales_invoice.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sales_invoice = new SalesInvoice();
        $sales_invoice->invoice = $request->invoice;
        $sales_invoice->businesspartner = $request->businesspartner;
        $sales_invoice->pajak = $request->pajak;
        $sales_invoice->invoicedate = $request->invoicedate;
        $sales_invoice->idsalesorder = $request->idsalesorder;
        $sales_invoice->duedate = $request->duedate;
        $sales_invoice->total = $request->total;
        $sales_invoice->save();
        $sales_order = SalesOrder::where('salesorder', $request->idsalesorder)->get();
        foreach($sales_order as $key => $value){
            $sales_order->find($value->id)->delete();
        }
        $akun = akun::where('nama_akun','Pendapatan')->get();
        foreach($akun as $key =>$value){
            $akun = $akun->find($value->id);
        }
        $akun->jumlah = $akun->jumlah + $request->total;
        $akun->update();
        $akun = akun::where('nama_akun','Kas')->get();
        foreach($akun as $key =>$value){
            $akun = $akun->find($value->id);
            $akun->jumlah = $akun->jumlah + $request->total;
            $akun->update();
        }
        $akun = akun::where('nama_akun','Utang Usaha')->get();
        foreach($akun as $key =>$value){
            $akun = $akun->find($value->id);
            $akun->jumlah = $akun->jumlah + $request->total;
            $akun->update();
        }
        
        return redirect('salesInvoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesInvoice  $salesInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(SalesInvoice $salesInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesInvoice  $salesInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesInvoice $salesInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesInvoice  $salesInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesInvoice $salesInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesInvoice  $salesInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesInvoice $salesInvoice)
    {
        //
    }

    
    
}
