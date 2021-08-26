@extends('master')
@section('judul','Data Dokter')
@section('css')
<!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<a href="{{url('dokter/create')}}">Tambah </a>
<table id="tabel_dokter" class="table table-bdoktered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>No Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dokter as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->nama_dokter}}</td>
            <td>{{$value->spesialis}}</td>
            <td>{{$value->no_hp}}</td>
            <td><a href="{{url('dokter/'.$value->id.'/edit')}}" class="btn btn-warning"> <i class="fa fa-edit"></i></a> |
                <a href="{{url('dokter/delete/'.$value->id)}}" class="btn btn-danger"> <i class="fa fa-trash"></i></a></td>
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
    $("#tabel_dokter").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
  });
  </script>
  @endsection