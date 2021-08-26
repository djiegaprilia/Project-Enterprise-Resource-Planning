<?php

namespace App\Http\Controllers;

use App\SalesItem;
use App\Barang;
use Illuminate\Http\Request;

class SalesItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesItem  $salesItem
     * @return \Illuminate\Http\Response
     */
    public function show(SalesItem $salesItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesItem  $salesItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesItem $salesItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesItem  $salesItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesItem $salesItem)
    {
        //
    }

    public function delete($id)
    {
        $sales_item = SalesItem::find($id);
        $sales_item->delete();
        return redirect('/salesOrder/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesItem  $salesItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesItem $salesItem)
    {
        //
    }
}
