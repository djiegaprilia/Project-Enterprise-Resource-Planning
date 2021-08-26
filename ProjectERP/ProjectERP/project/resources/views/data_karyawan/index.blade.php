@extends('master')
@section('judul','Data Karyawan')
@section('css')
<!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<a href="{{url('data_karyawan/create')}}">Tambah </a>
<table id="tabel_data_karyawan" class="table table-bdata_karyawaned table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Karyawan</th>
            <th>Jenis Kelamin</th>
            <th>NIP</th>
            <th>No Hp</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_karyawan as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->nama}}</td>
            <td>{{$value->jenis_kelamin}}</td>
            <td>{{$value->nip}}</td>
            <td>{{$value->no_hp}}</td>
            <td>{{$value->agama}}</td>
            <td>{{$value->alamat}}</td>
            <td><a href="{{url('data_karyawan/'.$value->id.'/edit')}}" class="btn btn-warning"> <i class="fa fa-edit"></i></a> |
                <a href="{{url('data_karyawan/delete/'.$value->id)}}" class="btn btn-danger"> <i class="fa fa-trash"></i></a></td>
        </tr>
        @endforeach
</tbody>
</table>
@endsection
@section('js')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#tabel_data_karyawan").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
  });
  </script>
  @endsection