@extends('main')
 
@section('title', 'Supplier')
 
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Supplier</h1>
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
                    <strong>Edit Supplier</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('supplier') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('supplier/' .$supplier->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" autofocus>
                                @error('nama_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Makanan Dipesan</label>
                                <input type="text" name="nama_makanan" class="form-control @error('nama_makanan') is-invalid @enderror" value="{{ old('nama_makanan', $supplier->nama_makanan) }}">
                                @error('nama_makanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Qyt</label>
                                <input type="text" name="qyt" class="form-control @error('qyt') is-invalid @enderror" value="{{ old('qyt', $supplier->qyt) }}">
                                @error('qyt')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga Makanan</label>
                                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $supplier->harga) }}">
                                @error('harga')
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