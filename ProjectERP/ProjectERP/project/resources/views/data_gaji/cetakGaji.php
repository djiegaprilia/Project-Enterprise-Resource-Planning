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
    <title>Cetak Data gaji</title>
</head>
<body>
        <div class="form-group">
            <p align="center"><b>Laporan Data gaji</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
<th>No.</th>
<th>Nama </th>
<th>NIP</th>
<th>Total</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($data_gaji as $key=>$value)
<tr>
<td>{{$key+1}}</td>
<td>{{$value->nama}}</td>
<td>{{$value->nip}}</td>
<td>{{$value->total_gaji}}</td>
</tr>
                @endforeach
            </table>
        </div>

        <script type="text/javascript">
                window.print();
        </script>
</body>
</html>
