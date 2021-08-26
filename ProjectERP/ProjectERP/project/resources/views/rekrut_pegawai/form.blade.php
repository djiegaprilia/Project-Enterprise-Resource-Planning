@extends('master')
@section('judul', 'Form Rekrut Pegawai')
@section('content')

<form role="form" action="{{($action!='rekrut_pegawai.store') ? url($action): route($action) }}" method="POST">
{{ csrf_field() }}
  <input type="hidden" name="id" value="{{ ($action!='rekrut_pegawai.store') ? $rekrut_pegawai->id : '' }}">
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Pegawai</label>
            <input type="text" class="form-control" name="nama_pegawai" 
              value="{{ ($action!='rekrut_pegawai.store') ? $rekrut_pegawai->nama_pegawai : ''}}" placeholder="Nama Lengkap Pegawai">
                </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Jenis Kelamin</label>
            <input type="text" class="form-control" name="jenis_kelamin" 
              value="{{ ($action!='rekrut_pegawai.store') ? $rekrut_pegawai->jenis_kelamin : ''}}" placeholder="Jenis Kelamin">
                </div>
                <div class="form-group">
        <label for="exampleInputEmail1">No Hp</label>
            <input type="text" class="form-control" name="no_hp" 
              value="{{ ($action!='rekrut_pegawai.store') ? $rekrut_pegawai->no_hp : ''}}" placeholder="No HP">
              </div>
                <div class="form-group">
        <label for="exampleInputEmail1">Agama</label>
            <input type="text" class="form-control" name="agama" 
              value="{{ ($action!='rekrut_pegawai.store') ? $rekrut_pegawai->agama : ''}}" placeholder="Agama">
                </div>
        <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" name="alamat" 
              value="{{ ($action!='rekrut_pegawai.store') ? $rekrut_pegawai->alamat : ''}}" placeholder="Alamat">
                </div>
        <label for="exampleInputEmail1">Pendidikan Terakhir</label>
            <input type="text" class="form-control" name="pendidikan" 
              value="{{ ($action!='rekrut_pegawai.store') ? $rekrut_pegawai->pendidikan : ''}}" placeholder="Pendidikan">
                </div>
              </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <input type="submit" class="btn btn-success" value="{{ ($action!='rekrut_pegawai.store') ? 'Update' : 'Simpan' }}">
                </div>
            <!-- /.card-footer -->    
              </form>
@endsection