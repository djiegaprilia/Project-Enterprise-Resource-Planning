@extends('master')
@section('judul','Form Staff HRM')
@section('content')
<form role="form" action="{{($action!='staff_hrm.store') ? url($action): route($action) }}" method="POST">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ ($action!='staff_hrm.store') ? $staff_hrm->id : ''}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama </label>
                    <input type="text" class = "form-control" name="nama" value="{{ ($action!='staff_hrm.store') ? $staff_hrm->nama : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class = "form-control" name="alamat" value="{{ ($action!='staff_hrm.store') ? $staff_hrm->alamat : ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No Hp</label>
                    <input type="text" class = "form-control" name="no_hp" value="{{ ($action!='staff_hrm.store') ? $staff_hrm->no_hp : ''}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" class = "btn btn-success" value="{{ ($action!='store') ? 'Update' : 'Simpan' }}">
                </div>
              </form>
@endsection