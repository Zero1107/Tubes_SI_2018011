@extends('main')
 
@section('title', 'Stock')
 
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Stock</h1>
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
                    <strong>Tambah Stock</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('stock') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('stock/') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Jumlah Stock</label>
                                <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" autofocus>
                                @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Waktu Stock</label>
                                <input type="date" name="waktu_stock" class="form-control @error('waktu_stock') is-invalid @enderror" value="{{ old('waktu_stock') }}">
                                @error('waktu_stock')
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