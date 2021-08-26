<?php

namespace App\Http\Controllers;

use App\SalesOrder;
use App\Barang;
use App\SalesItem;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_order = SalesOrder::all()->unique('salesorder');
        $barangs = Barang::all();
        $data['sales_order'] = $sales_order;
        $data['barang'] = $barangs;
        return view('sales_order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales_item = SalesItem::all();
        $barangs = Barang::all();
        $data['sales_item'] = $sales_item;
        $data['barang'] = $barangs;
        $data['total'] = 0;
        $data['action'] = 'salesOrder.store';
        return view('sales_order.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sales_item = SalesItem::all();
        foreach($sales_item as $key => $value){
            $sales_order = new SalesOrder();
            $sales_order->id_barang = $value->id_barang;
            $sales_order->jumlah = $value->jumlah;
            $sales_order->businesspartner = $request->businesspartner;
            $sales_order->salesorder = $request->salesorder;
            $sales_order->orderdate = $request->orderdate;
            $sales_order->save();
            $barang = Barang::find($value->id_barang);
            $barang->jumlah = $barang->jumlah - $value->jumlah;
            $barang->update();
            $sales_item->find($value->id)->delete();
        }

        return redirect('salesOrder');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesOrder  $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SalesOrder $salesOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesOrder  $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesOrder $salesOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesOrder  $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesOrder $salesOrder)
    {
        //
    }

    public function delete($id)
    {
        $sales_item = SalesOrder::where('salesorder', $id);
        $sales_item->delete();
        return redirect('/salesOrder');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesOrder  $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesOrder $salesOrder)
    {
        //
    }
    
    public function addItem(){
        $barangs = Barang::all();
        $data['barang'] = $barangs;
        $data['action'] = 'salesOrder.storeItem';
        return view('sales_order.itemform', $data);
    }

    public function storeItem(Request $request){
        $salesItem = new SalesItem();
        $salesItem->id_barang = $request->id_barang;
        $salesItem->jumlah = $request->jumlah;
        $salesItem->deskripsi = $request->deskripsi;
        $salesItem->save();
        $sales_item = SalesItem::all();
        $barangs = Barang::all();
        $data['sales_item'] = $sales_item;
        $data['barang'] = $barangs;
        $data['total'] = 0;    
        return view('sales_order.form', $data);
    }
}
