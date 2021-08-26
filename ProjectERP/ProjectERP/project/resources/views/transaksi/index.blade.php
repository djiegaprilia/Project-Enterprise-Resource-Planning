@extends('master')
@section('judul','Data transaksi')
@section('css')
<!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<a href="{{url('transaksi/create')}}">Tambah </a>
<table id="tabel_transaksi" class="table table-btransaksied table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->nip}}</td>
            <td>{{$value->keterangan}}</td>
            <td><a href="{{url('transaksi/'.$value->id.'/edit')}}" class="btn btn-warning"> <i class="fa fa-edit"></i></a> |
                <a href="{{url('transaksi/delete/'.$value->id)}}" class="btn btn-danger"> <i class="fa fa-trash"></i></a></td>
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
    $("#tabel_transaksi").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
  });
  </script>
  @endsection