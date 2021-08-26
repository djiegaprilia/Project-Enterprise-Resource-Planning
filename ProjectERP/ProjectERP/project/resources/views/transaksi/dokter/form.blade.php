@extends('master')
@section('judul','Form Dokter')
@section('content')
<form role="form" action="{{($action!='dokter.store') ? url($action): route($action) }}" method="POST">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ ($action!='dokter.store') ? $dokter->id : ''}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Dokter</label>
                    <input type="text" class = "form-control" name="nama_dokter" value="{{ ($action!='dokter.store') ? $dokter->nama_dokter : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Spesialis</label>
                    <input type="text" class = "form-control" name="spesialis" value="{{ ($action!='dokter.store') ? $dokter->spesialis : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No Hp</label>
                    <input type="text" class = "form-control" name="no_hp" value="{{ ($action!='dokter.store') ? $dokter->no_hp : ''}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class = "btn btn-success" value="{{ ($action!='store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
@endsection