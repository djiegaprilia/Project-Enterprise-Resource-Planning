@extends('master')
@section('judul','Data Sales Invoice')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ url('salesInvoice/create')}}"><small class="badge badge-primary"><i class="fa fa-plus"></i>Tambah Data </small></a>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel_product" class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Invoice #</th>
                    <th>Sales Order #</th>
                    <th>Business Partner</th>
                    <th>Total Due</th>
                    <th>Invoice Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales_invoice as $key => $value)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$value->invoice}}</td>
                        <td>{{$value->idsalesorder}}</td>
                        <td>{{$value->businesspartner}}</td>
                        <td>{{$value->total}}</td>
                        <td>{{$value->invoicedate}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- /.card-body -->
</div>
@endsection

