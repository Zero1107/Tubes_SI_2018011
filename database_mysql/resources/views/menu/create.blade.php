@extends('main')
 
@section('title', 'Menu')
 
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Menu</h1>
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
                    <strong>Tambah Menu</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('menu') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('menu') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama Menu</label>
                                <input type="text" name="nama_menu" class="form-control @error('nama_menu') is-invalid @enderror" value="{{ old('nama_menu') }}" autofocus>
                                @error('nama_menu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Menu</label>
                                <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" value="{{ old('jenis') }}" autofocus>
                                @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="image">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror">
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