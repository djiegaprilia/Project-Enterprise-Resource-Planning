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
    <title>Cetak Data Laba Rugi</title>
</head>
<body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Laba Rugi</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                <th>Nomor Akun</th>
                <th>Nama Akun</th>
                <th>Jumlah</th>
                </tr>
                @foreach ($labarugi1 as $key => $value)
                <tr>
                     <td>{{$value->no_akun}}</td>
                     <td>{{$value->nama_akun}}</td>
                     <td>{{$value->jumlah}}</td>
                </tr>
                @endforeach
                @foreach ($labarugi2 as $key => $value)
                <tr>
                     <td>{{$value->no_akun}}</td>
                     <td>{{$value->nama_akun}}</td>
                     <td>{{$value->jumlah}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <script type="text/javascript">
                window.print();
        </script>
</body>
</html>
