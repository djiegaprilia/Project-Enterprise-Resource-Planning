@extends('master')
@section('judul', 'Laporan Akun Laba')
@section('content')
<form role="form" action ="{{($action!='akunLaba.store')? url($action): route($action)}}" method = "POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{($action!='akunLaba.store') ? $akunLaba->id:''}}">
<div class="card-body">
                <input type="hidden" name="id" value="{{ ($action!='akunLaba.store') ? $akunLaba->id : ''}}">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Akun Laba</label>
                    <input type="text" class="form-control" name="no_akunLaba" value="{{($action!='akunLaba.store') ? $akunLaba->no_akunLaba:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Laporan Akun Laba</label>
                    <input type="text" class="form-control" name="nama_akunLaba" value="{{($action!='akunLaba.store') ? $akunLaba->nama_akunLaba:''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value="{{($action!='akunLaba.store') ? $akunLaba->jumlah:''}}">
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class="btn btn-success" value="{{ ($action!='akunLaba.store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
              @endsection


