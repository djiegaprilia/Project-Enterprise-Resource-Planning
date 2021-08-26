@extends('master')
@section('judul','Sales Order')
@section('content')
<form role="form" method="post" action="{{ url('salesOrder/store')}}">
{{csrf_field()}}
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table style="width:100%">
            <tr>
                <td style="width:33.3%">
                    <span style="display: inline-block; width: 140px;">Business Partner :</span>
                    <select class="form-control" style="display: inline-block; width: 50%;" name="businesspartner">
                        <option>Vendor 1</option>
                        <option>Vendor 2</option>
                        <option>Vendor 3</option>
                        <option>Vendor 4</option>
                        <option>Vendor 5</option>
                    </select>
                </td>
                <td style="width:33.3%">
                    <span style="display: inline-block; width: 140px;">Order Date :</span>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest" style="display: inline-block; width: 50%;">
                        <input type="date" class="form-control" name="orderdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        </div>
                    </div>
                </td>
                <td style="width:33.3%">
                <span  style="display: inline-block; width: 140px;">Sales Order # :</span>
                    <input type="number" class="form-control" placeholder="#100000" style="display: inline-block; width: 50%;" name="salesorder">
                </td>
            </tr>
        </table>
        <a href="{{ url('addItem')}}"><small class="badge badge-primary"><i class="fa fa-plus"></i>Tambah Item </small></a>
        <table class="table table-bordered table-hover" style="margin-top:20px;">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Line Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach($sales_item as $key => $value)
                        @foreach($barang as $key2 => $value2)
                            @if($value2->id == $value->id_barang)
                            <tr>
                                <td>{{$value2->nama_barang}}</td>
                                <td>{{$value->deskripsi}}</td>
                                <td>{{$value2->harga}}</td>
                                <td>{{$value->jumlah}}</td>
                                <td>{{$value2->harga * $value->jumlah}}</td>
                                <td><a href="{{url('salesItem/delete/'.$value->id)}}"><i class="nav-icon fa fa-trash"></td>
                                <?php $total += $value2->harga * $value->jumlah ?>
                            </tr>
                            @endif
                        @endforeach
                    @endforeach
            </tbody>
        </table>
        <table style="width:100%; margin-top:20px;">
            <tr>
                <td  style="float:right; width:50%;">
                    <label style="width: 140px">Total </label>
                    <label style="float:right;">Rp. {{$total}}</label>
                </td>
            </tr>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right"> Submit</button>
        </div>
</div>
</form>
@endsection