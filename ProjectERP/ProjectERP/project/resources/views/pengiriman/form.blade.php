@extends('master')
@section('judul', 'Form Pengiriman')
@section('content')
<form role="form" action ="{{($action!='pengiriman.store')? url($action): route($action)}}" method = "POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{($action!='pengiriman.store') ? $pengiriman->id:''}}">
<div class="card-body">
<div class="form-group">
                  <label for="exampleInputEmail1">Kode Pengiriman</label>
                    <input type="text" class="form-control" name="kode_pengiriman" value="{{($action!='pengiriman.store') ? $pengiriman->kode_pengiriman:''}}">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Kode Supplier</label>
                    <input type="text" class="form-control" name="kode_supplier" value="{{($action!='pengiriman.store') ? $pengiriman->kode_supplier:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value="{{($action!='pengiriman.store') ? $pengiriman->jumlah:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" class="form-control" name="harga" value="{{($action!='pengiriman.store') ? $pengiriman->harga:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Pesan</label>
                    <input type="date" class="form-control" name="tgl_permintaan" value="{{($action!='pengiriman.store') ? $pengiriman->tgl_permintaan:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Kirim</label>
                    <input type="date" class="form-control" name="tgl_pengiriman" value="{{($action!='pengiriman.store') ? $pengiriman->tgl_pengiriman:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total Harga</label>
                    <input type="text" class="form-control" name="total_harga" value="{{($action!='pengiriman.store') ? $pengiriman->total_harga:''}}">
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class="btn btn-success" value="{{ ($action!='pengiriman.store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
              @endsection


