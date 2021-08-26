@extends('master')
@section('judul', 'Form Penjualan')
@section('content')
<form role="form" action ="{{($action!='penjualan.store')? url($action): route($action)}}" method = "POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{($action!='penjualan.store') ? $penjualan->id:''}}">
<div class="card-body">
                
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="{{($action!='penjualan.store') ? $penjualan->nama_barang:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value="{{($action!='penjualan.store') ? $penjualan->jumlah:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" class="form-control" name="harga" value="{{($action!='penjualan.store') ? $penjualan->harga:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Jual</label>
                    <input type="date" class="form-control" name="tanggal_jual" value="{{($action!='penjualan.store') ? $penjualan->tanggal_order:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total Jual</label>
                    <input type="text" class="form-control" name="total_jual" value="{{($action!='penjualan.store') ? $penjualan->total_harga:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Info Penjualan</label>
                    <input type="text" class="form-control" name="info_jual" value="{{($action!='penjualan.store') ? $penjualan->total_harga:''}}">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class="btn btn-success" value="{{ ($action!='penjualan.store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
              @endsection


