<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengiriman</title>
</head>
<body>
@extends('master')
@section('judul','Data Pengiriman')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<a href="{{url('pengiriman/create')}}" class="btn btn-primary">Tambah</a> <hr/>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<Table id="data_pengiriman" class="table table-bordered table-striped">
<thead>
<tr>
<th>No.</th>
<th>Kode Pengiriman</th>
<th>Kode Supplier</th>
<th>jumlah</th>
<th>Harga</th>
<th>Tanggal Pesan</th>
<th>Tanggal Kirim</th>
<th>Total Harga</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($pengiriman as $key=>$value)
<tr>
<td>{{$key+1}}</td>
<td>{{$value->kode_pengiriman}}</td>
<td>{{$value->kode_supplier}}</td>
<td>{{$value->jumlah}}</td>
<td>{{$value->harga}}</td>
<td>{{$value->tgl_permintaan}}</td>
<td>{{$value->tgl_pengiriman}}</td>
<td>{{$value->total_harga}}</td>

<td> 
<a href = "{{url('pengiriman/'.$value->id.'/edit')}}"><small class="badge badge-warning"><i class="fa fa-edit text-white"></i></small></a></a>
<a href = "{{url('pengiriman/delete/'.$value->id)}}"><small class="badge badge-danger"><i class="fa fa-trash"></i></small></a>
</td>
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
    $("#data_pengiriman").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
</body>
</html>
