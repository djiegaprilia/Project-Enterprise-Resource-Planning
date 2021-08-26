@extends('master')
@section('judul','Data Sales Order')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ url('salesOrder/create')}}"><small class="badge badge-primary"><i class="fa fa-plus"></i>Tambah Data </small></a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel_product" class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Sales Order #</th>
                    <th>Business Partner</th>
                    <th>Order Date</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales_order as $key => $value)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$value->salesorder}}</td>
                    <td>{{$value->businesspartner}}</td>
                    <td>{{$value->orderdate}}</td>
                    <td>
                    <a href="{{url('salesOrder/delete/'.$value->salesorder)}}"><i class="nav-icon fa fa-trash"></i></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
        
    </div>
    <!-- /.card-body -->
</div>
@endsection

