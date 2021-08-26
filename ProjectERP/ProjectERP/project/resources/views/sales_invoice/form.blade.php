@extends('master')
@section('judul','Sales Invoice')
@section('content')
<form role="form" method="post" action="{{ route('salesInvoice.store')}}">
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
                <span style="display: inline-block; width: 140px;">Invoice Date :</span>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest" style="display: inline-block; width: 50%;">
                        <input type="date" class="form-control" name="invoicedate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker" name="invoicedate">
                        </div>
                    </div>
                </td>
                <td style="width:33.3%">
                <span  style="display: inline-block; width: 140px;">Invoice # :</span>
                    <input type="number" class="form-control" placeholder="#100000" style="display: inline-block; width: 50%;" name="invoice">
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <span style="display: inline-block; width: 140px;">Due Date :</span>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest" style="display: inline-block; width: 50%;">
                        <input type="date" class="form-control" name="duedate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker" name="duedate">
                        </div>
                    </div>
                </td>
                <td>
                <span  style="display: inline-block; width: 140px;">Sales Order # :</span>
                    <select class="form-control" style="display: inline-block; width: 50%;" name="idsalesorder" id="idsalesorder" onchange="myfunction()">
                        @foreach($idsalesorder as $key => $value)
                            <option value="{{ $value->salesorder }}">{{$value->salesorder}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>

                </td>
                <td>
                <span  style="display: inline-block; width: 140px;">Tax :</span>
                    <select class="form-control" style="display: inline-block; width: 50%;" name="pajak">
                        <option value="PPN">PPN</option>
                    </select>
                </td>
            </tr>
        </table>
        <table class="table table-bordered table-hover" style="margin-top:20px;">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Line Total</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($sales_order as $key2 => $value2)
                    @foreach($barang as $key3 => $value3)
                        @if($value3->id == $value2->id_barang)
                        <tr>
                            <td>{{$value3->nama_barang}}</td>
                            <td>{{$value3->harga}}</td>
                            <td>{{$value2->jumlah}}</td>
                            <td>{{$value3->harga * $value2->jumlah}}</td>
                            <?php $total += $value3->harga * $value2->jumlah;?>
                        </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <table style="width:100%; margin-top:20px;">
            <tr>
                <td  style="float:right; width:50%;">
                    <label style="width: 140px">Subtotal </label>
                    <label style="float:right;">{{$total}}</label>
                </td>
            </tr>
             <tr>
                <td  style="float:right; width:50%;">
                    <label style="width: 140px">Tax </label>
                    <label style="float:right;">{{$total/10}}</label>
                </td>
            </tr>
            <tr>
                <td  style="float:right; width:50%;">
                    <label style="width: 140px">Total Due</label>
                    <label style="float:right;">{{$total+($total/10)}}</label>
                </td>
            </tr>
        </table>
    </div>
    <input type="hidden" name="total" value="{{$total+($total/10)}}"/>
    <!-- /.card-body -->
    <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right"> Submit</button>
        </div>
</div>
</form>
@endsection