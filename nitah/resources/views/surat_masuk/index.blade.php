@extends('surat_masuk.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Surat Masuk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('surat_masuk.create') }}"> Tambah</a>
            </div>
            <br>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>Pengirim</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $surat)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $surat->no_surat }}</td>
            <td>{{ $surat->tgl_surat }}</td>
            <td>{{ $surat->pengirim }}</td>
            <td>
                <form action="{{ route('surat_masuk.destroy',$surat->id) }}" method="POST">      
                    <a class="btn btn-primary" href="{{ route('surat_masuk.edit',$surat->id) }}">Update</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection