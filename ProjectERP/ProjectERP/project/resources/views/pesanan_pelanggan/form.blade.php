@extends('master')
@section('judul', 'Form Pesanan_pelanggan')
@section('content')
<form role="form" action ="{{($action!='pesanan_pelanggan.store')? url($action): route($action)}}" method = "POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{($action!='pesanan_pelanggan.store') ? $pesanan_pelanggan->id:''}}">
<div class="card-body">
                
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="{{($action!='pesanan_pelanggan.store') ? $pesanan_pelanggan->nama_barang:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value="{{($action!='pesanan_pelanggan.store') ? $pesanan_pelanggan->jumlah:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" class="form-control" name="harga" value="{{($action!='pesanan_pelanggan.store') ? $pesanan_pelanggan->harga:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Order</label>
                    <input type="date" class="form-control" name="tanggal_order" value="{{($action!='pesanan_pelanggan.store') ? $pesanan_pelanggan->tanggal_order:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tempat</label>
                    <input type="text" class="form-control" name="tempat" value="{{($action!='pesanan_pelanggan.store') ? $pesanan_pelanggan->tempat:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No.Telp</label>
                    <input type="text" class="form-control" name="no_telp" value="{{($action!='pesanan_pelanggan.store') ? $pesanan_pelanggan->no_telp:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total Harga</label>
                    <input type="text" class="form-control" name="total_harga" value="{{($action!='pesanan_pelanggan.store') ? $pesanan_pelanggan->total_harga:''}}">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class="btn btn-success" value="{{ ($action!='pesanan_pelanggan.store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
              @endsection


