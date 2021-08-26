@extends('master')
@section('judul', 'Laporan Keuangan')
@section('content')
<form role="form" action ="{{($action!='keuangan.store')? url($action): route($action)}}" method = "POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{($action!='keuangan.store') ? $keuangan->id:''}}">
<div class="card-body">
<input type="hidden" name="id" value="{{ ($action!='akun.store') ? $akun->id : ''}}">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Akun</label>
                    <input type="text" class="form-control" name="no_akun" value="{{($action!='akun.store') ? $akun->no_akun:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Laporan Akun</label>
                    <input type="text" class="form-control" name="nama_akun" value="{{($action!='akun.store') ? $akun->nama_akun:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value="{{($action!='akun.store') ? $akun->jumlah:''}}">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <input type="submit" class="btn btn-success" value="{{ ($action!='keuangan.store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
              @endsection


