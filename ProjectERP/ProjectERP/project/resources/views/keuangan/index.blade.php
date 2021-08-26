<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>keuangan</title>
</head>
<body>
@extends('master')
@section('judul','Laporan keuangan')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<a href="{{url('keuangan/create')}}" class="btn btn-primary">Tambah</a> <a href="cetakUang" class="btn btn-primary" target="_blank"> CETAK PDF</a> <hr/>

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
<Table id="data_pemesanan" class="table table-bordered table-striped">
<thead>
<tr>
<th>Nomor Akun</th>
<th>Nama Laporan Keuangan</th>
<th>Jumlah</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($keuangan1 as $key=>$value)
<tr>
<td>{{$value->no_akun}}</td>
<td>{{$value->nama_akun}}</td>
<td>{{$value->jumlah}}</td>
<?php $total += $value->jumlah; ?>


<td> 
<a href = "{{url('keuangan/'.$value->id.'/edit')}}"><small class="badge badge-warning"><i class="fa fa-edit text-white"></i></small></a></a>
<a href = "{{url('keuangan/delete/'.$value->id)}}"><small class="badge badge-danger"><i class="fa fa-trash"></i></small></a>
</td>
</tr>
@endforeach
@foreach($keuangan2 as $key2 =>$value2)
<tr>
<td>{{$value2->no_akun}}</td>
<td>{{$value2->nama_akun}}</td>
<td>{{$value2->jumlah}}</td>
<?php $total -= $value2->jumlah; ?>
<td> 
<a href = "{{url('keuangan/'.$value->id.'/edit')}}"><small class="badge badge-warning"><i class="fa fa-edit text-white"></i></small></a></a>
<a href = "{{url('keuangan/delete/'.$value->id)}}"><small class="badge badge-danger"><i class="fa fa-trash"></i></small></a>
</td>
</tr>
@endforeach
@foreach($keuangan3 as $key3 =>$value3)
<tr>
<td>{{$value3->no_akun}}</td>
<td>{{$value3->nama_akun}}</td>
<td>{{$value3->jumlah}}</td>
<?php $total -= $value3->jumlah; ?>
<td> 
<a href = "{{url('keuangan/'.$value->id.'/edit')}}"><small class="badge badge-warning"><i class="fa fa-edit text-white"></i></small></a></a>
<a href = "{{url('keuangan/delete/'.$value->id)}}"><small class="badge badge-danger"><i class="fa fa-trash"></i></small></a>
</td>
</tr>
@endforeach
</tbody>
<tfoot>
  <th colspan="2">Total</th>
  <th>{{$total}}</th>
</tfoot>
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
