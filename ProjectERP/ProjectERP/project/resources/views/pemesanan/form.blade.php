@extends('master')
@section('judul', 'Form Pemesanan')
@section('content')
<form role="form" action="{{($action!='pemesanan.store')? url($action): route($action)}}" method="POST">
  {{csrf_field()}}
  <input type="hidden" name="id" value="{{($action!='pemesanan.store') ? $pemesanan->id:''}}">
  <div class="card-body">
    <input type="hidden" name="id" value="{{ ($action!='pemesanan.store') ? $pemesanan->id : ''}}">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Barang</label>
      <select class="form-control" style="display: inline-block;" name="nama_barang">
        @foreach($barang as $key => $value)
        <option value="{{ $value->nama_barang }}">{{$value->nama_barang}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Jumlah</label>
      <input type="text" class="form-control" name="jumlah" value="{{($action!='pemesanan.store') ? $pemesanan->jumlah:''}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Harga</label>
      <input type="text" class="form-control" name="harga" value="{{($action!='pemesanan.store') ? $pemesanan->harga:''}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Tanggal Order</label>
      <input type="date" class="form-control" name="tanggal_order" value="{{($action!='pemesanan.store') ? $pemesanan->tanggal_order:''}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Alamat</label>
      <input type="text" class="form-control" name="tempat" value="{{($action!='pemesanan.store') ? $pemesanan->tempat:''}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">No.Telp</label>
      <input type="text" class="form-control" name="no_telp" value="{{($action!='pemesanan.store') ? $pemesanan->no_telp:''}}">
    </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <input type="submit" class="btn btn-success" value="{{ ($action!='pemesanan.store') ? 'Update' : 'Simpan' }}">
    </div>
</form>
@endsection