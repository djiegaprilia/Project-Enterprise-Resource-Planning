@extends('master')
@section('judul','Form Data_Karyawan')
@section('content')
<form role="form" action="{{($action!='data_karyawan.store') ? url($action): route($action) }}" method="POST">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ ($action!='data_karyawan.store') ? $data_karyawan->id : ''}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Karyawan</label>
                    <input type="text" class = "form-control" name="nama" value="{{ ($action!='data_karyawan.store') ? $data_karyawan->nama : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Kelamin</label>
                    <input type="text" class = "form-control" name="jenis_kelamin" value="{{ ($action!='data_karyawan.store') ? $data_karyawan->jenis_kelamin : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">NIP</label>
                    <input type="text" class = "form-control" name="nip" value="{{ ($action!='data_karyawan.store') ? $data_karyawan->nip : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No Hp</label>
                    <input type="text" class = "form-control" name="no_hp" value="{{ ($action!='data_karyawan.store') ? $data_karyawan->no_hp : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Agama</label>
                    <input type="text" class = "form-control" name="agama" value="{{ ($action!='data_karyawan.store') ? $data_karyawan->agama : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class = "form-control" name="alamat" value="{{ ($action!='data_karyawan.store') ? $data_karyawan->alamat : ''}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class = "btn btn-success" value="{{ ($action!='store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
@endsection