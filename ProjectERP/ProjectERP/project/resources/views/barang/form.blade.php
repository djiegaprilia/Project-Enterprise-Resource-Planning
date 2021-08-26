@extends('master')
@section('judul', 'Form Barang')
@section('content')
<form role="form" action ="{{($action!='barang.store')? url($action): route($action)}}" method = "POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{($action!='barang.store') ? $barang->id:''}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" value="{{($action!='barang.store') ? $barang->nama_barang:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value="{{($action!='barang.store') ? $barang->jumlah:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" class="form-control" name="harga" value="{{($action!='barang.store') ? $barang->harga:''}}">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Order</label>
                    <input type="date" class="form-control" name="tanggal_order" value="{{($action!='barang.store') ? $barang->tanggal_order:''}}">
                  </div>        
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class="btn btn-success" value="{{ ($action!='barang.store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
@endsection
