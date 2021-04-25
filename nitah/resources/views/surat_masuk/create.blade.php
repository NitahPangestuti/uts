@extends('surat_masuk.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Data</h2>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('surat_masuk.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Surat</strong>
                <input type="text" name="no_surat" class="form-control" placeholder="No Surat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Surat</strong>
                <input type="text" name="tgl_surat" class="form-control" placeholder="Tanggal Surat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pengirim</strong>
                <input type="text" name="pengirim" class="form-control" placeholder="Pengirim">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-dark" href="{{ route('surat_masuk.index') }}"> Kembali</a>
        </div>
    </div>
   
</form>
@endsection