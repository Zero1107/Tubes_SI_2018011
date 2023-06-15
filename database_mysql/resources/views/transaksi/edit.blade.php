@extends('main')
 
@section('title', 'Pelanggan')
 
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pelanggan</h1>
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
                    <strong>Edit Transaksi</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('transaksi') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('transaksi/' .$transaksi->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <select name="id_pelanggan" class="form-control @error('id_pelanggan') is-invalid @enderror">
                                    <option value="">- Pilih -</option>
                                    @foreach ($pelanggan as $item)
                                        <option value="{{ $item->id }}" {{ old('id_pelanggan', $transaksi->id_pelanggan) == $item->id ? 'selected' : null }}>{{ $item->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input type="date" name="tanggal_transaksi" class="form-control @error('tanggal_transaksi') is-invalid @enderror" value="{{ old('tanggal_transaksi', $transaksi->tgl_transaksi) }}" autofocus>
                                @error('tanggal_transaksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $transaksi->status) }}">
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" value="{{ old('total', $transaksi->total) }}">
                                @error('total')
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