<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Tagihan</title>
</head>
<body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Tagihan</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
<tr>

                <tr>
                <th>No.</th>
<th>Nama Barang</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Tanggal Order</th>
<th>Alamat</th>
<th>No.Telp</th>
<th>Total Harga</th>
                </tr>
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
                </tr>
                @endforeach
            </table>
        </div>

        <script type="text/javascript">
                window.print();
        </script>
</body>
</html>