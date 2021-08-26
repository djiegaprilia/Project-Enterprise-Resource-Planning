@extends('master')
@section('judul', 'Data Rekrut Pegawai')
@section('content')

<a href="{{ url('rekrut_pegawai/create')}}" class="btn btn-primary">Tambah Data</a><hr/>
<hr>
<table id = data_rekrut_pegawai class="table table-borderless table-striped table-earning">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>No Hp</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Pendidikan Terakhir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rekrut_pegawai as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->nama_pegawai}}</td>
            <td>{{$value->jenis_kelamin}}</td>
            <td>{{$value->no_hp}}</td>
            <td>{{$value->agama}}</td>
            <td>{{$value->alamat}}</td>
            <td>{{$value->pendidikan}}</td>
            <td><a href="{{url('rekrut_pegawai/'.$value->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <a href="{{url('rekrut_pegawai/delete/'.$value->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>     
        </tr>
        @endforeach
    </tbody>
</table>  
@endsection    
@section('js')

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>


<script>
  $(function () {
    $("#data_rekrut_pegawai").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection