@extends('master')
@section('judul','Staff HRD')
@section('css')
<!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<a href="{{url('staff_hrm/create')}}">Tambah </a>
<table id="tabel_staff_hrm" class="table table-bstaff_hrm$staff_hrmed table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama </th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staff_hrm as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->nama}}</td>
            <td>{{$value->alamat}}</td>
            <td>{{$value->no_hp}}</td>
            <td><a href="{{url('staff_hrm/'.$value->id.'/edit')}}" class="btn btn-warning"> <i class="fa fa-edit"></i></a> |
                <a href="{{url('staff_hrm/delete/'.$value->id)}}" class="btn btn-danger"> <i class="fa fa-trash"></i></a></td>
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
    $("#tabel_staff_hrm").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
  });
  </script>
  @endsection