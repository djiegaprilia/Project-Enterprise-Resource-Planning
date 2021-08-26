@extends('master')
@section('judul', 'Laporan Labarugi')
@section('content')
<form role="form" action ="{{($action!='labarugi.store')? url($action): route($action)}}" method = "POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{($action!='labarugi.store') ? $labarugi->id:''}}">
<div class="card-body">
                <input type="hidden" name="id" value="{{ ($action!='labarugi.store') ? $labarugi->id : ''}}">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Akun</label>
                    <input type="text" class="form-control" name="no_akun" value="{{($action!='labarugi.store') ? $labarugi->no_akun:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Laporan Laba Rugi</label>
                    <input type="text" class="form-control" name="nama_akun" value="{{($action!='labarugi.store') ? $labarugi->account:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value="{{($action!='labarugi.store') ? $labarugi->jumlah:''}}">
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class="btn btn-success" value="{{ ($action!='labarugi.store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
              @endsection


