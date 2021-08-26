@extends('master')
@section('judul', 'Tambah Item')
@section('content')
<form role="form" method="post" action="{{ url('storeItem')}}">
    {{csrf_field()}}
    <input type="hidden" name="id" />
    <div class="form-group">
        <div class="form-group row ">
            <label for="inputName" class="col-sm-2 col-form-label">Nama Product</label>
            <div class="col-sm-10">
                <select class="form-control" style="display: inline-block;" name="id_barang">
                @foreach($barang as $key => $value)
                    <option value="{{ $value->id }}">{{$value->nama_barang}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="ex : 10" name="jumlah">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="ex : Warna Putih" name="deskripsi">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <input type="submit" value="Tambah">
            <button type="reset" class="btn btn-default float-right">Cancel</button>
        </div>
        <!-- /.card-footer -->
    </div>
</form>
@endsection