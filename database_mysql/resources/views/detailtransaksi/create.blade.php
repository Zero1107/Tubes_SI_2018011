@extends('main')
 
@section('title', 'Detail Transaksi')
 
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Transaksi</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    
    
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('content')
<div class="content mt-3">
 
    <div class="animated fadeIn">
 
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Tambah Detail Transaksi</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('detailtransaksi') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('detailtransaksi') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Status Transaksi Sebelumnya</label>
                                <select name="id_transaksi" class="form-control @error('id_transaksi') is-invalid @enderror">
                                    <option value="">- Pilih -</option>
                                    @foreach ($transaksi as $item)
                                        <option value="{{ $item->id }}" {{ old('id_transaksi') == $item->id ? 'selected' : null }}>{{ $item->status }}</option>
                                    @endforeach
                                </select>
                                @error('id_transaksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Menu</label>
                                <select name="id_menu" class="form-control @error('id_menu') is-invalid @enderror">
                                    <option value="">- Pilih -</option>
                                    @foreach ($menu as $item)
                                        <option value="{{ $item->id }}" {{ old('id_menu') == $item->id ? 'selected' : null }}>{{ $item->nama_menu }}</option>
                                    @endforeach
                                </select>
                                @error('id_menu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Qyt</label>
                                <input type="text" name="qyt" class="form-control @error('qyt') is-invalid @enderror">
                                @error('qyt')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
 
            </div>
        </div>      
 
    </div>
 
</div>
@endsection