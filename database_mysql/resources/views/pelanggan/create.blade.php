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
                    <strong>Tambah Pelanggan</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('pelanggan') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('pelanggan') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" value="{{ old('nama_pelanggan') }}" autofocus>
                                @error('nama_pelanggan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="null">- Pilih -</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    {{-- @foreach ($id_pelanggan as $item)
                                        <option value="{{ $item->id }}" {{ old('id_pelanggan') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @endforeach --}}
                                </select>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                                @error('alamat')
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