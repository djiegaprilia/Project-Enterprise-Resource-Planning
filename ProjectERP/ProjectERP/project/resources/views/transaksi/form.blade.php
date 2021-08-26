@extends('master')
@section('judul','Form Transaksi')
@section('content')
<form role="form" action="{{($action!='transaksi.store') ? url($action): route($action) }}" method="POST">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ ($action!='transaksi.store') ? $transaksi->id : ''}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="text" class = "form-control" name="nip" value="{{ ($action!='transaksi.store') ? $transaksi->nama_transaksi : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <input type="text" class = "form-control" name="keterangan" value="{{ ($action!='transaksi.store') ? $transaksi->keterangan : ''}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class = "btn btn-success" value="{{ ($action!='store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
@endsection