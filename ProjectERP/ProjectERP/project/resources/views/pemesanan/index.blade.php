<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemesanan</title>
</head>
<body>
@extends('master')
@section('judul','Laporan Pemesanan')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<a href="{{url('pemesanan/create')}}" class="btn btn-primary">Tambah</a>
 <a href="cetakpemesanan" class="btn btn-primary" target="_blank"> CETAK PDF</a> <hr/>


<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<Table id="data_pemesanan" class="table table-bordered table-striped">
<thead>
<tr>
<th>No.</th>
<th>Nama Barang</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Tanggal Order</th>
<th>Alamat</th>
<th>No.Telp</th>
<th>Total Harga</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($pemesanan as $key=>$value)
<tr>
<td>{{$key+1}}</td>
<td>{{$value->nama_barang}}</td>
<td>{{$value->jumlah}}</td>
<td>{{$value->harga}}</td>
<td>{{$value->tanggal_order}}</td>
<td>{{$value->tempat}}</td>
<td>{{$value->no_telp}}</td>
<td>{{$value->total_harga}}</td>

<td> 
<a href = "{{url('pemesanan/'.$value->id.'/edit')}}"><small class="badge badge-warning"><i class="fa fa-edit text-white"></i></small></a></a>
<a href = "{{url('pemesanan/delete/'.$value->id)}}"><small class="badge badge-danger"><i class="fa fa-trash"></i></small></a>
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
    $("#data_pemesanan").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
</body>
</html>
