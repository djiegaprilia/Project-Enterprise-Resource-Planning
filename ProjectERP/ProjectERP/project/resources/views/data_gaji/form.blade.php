@extends('master')
@section('judul','Form Data_Gaji')
@section('content')
<form role="form" action="{{($action!='data_gaji.store') ? url($action): route($action) }}" method="POST">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ ($action!='data_gaji.store') ? $data_gaji->id : ''}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama </label>
                    <input type="text" class = "form-control" name="nama" value="{{ ($action!='data_gaji.store') ? $data_gaji->nama : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">NIP</label>
                    <input type="text" class = "form-control" name="nip" value="{{ ($action!='data_gaji.store') ? $data_gaji->nip : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total_gaji</label>
                    <input type="text" class = "form-control" name="total_gaji" value="{{ ($action!='data_gaji.store') ? $data_gaji->total_gaji : ''}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class = "btn btn-success" value="{{ ($action!='store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
@endsection