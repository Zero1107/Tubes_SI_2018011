@extends('main')

@section('title', 'Pelanggan')
    

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <a href="{{ url('cetakpelanggan') }}" class="btn btn-info btn-sm">
                    <i ></i>Export PDF
                </a>                
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">
 
    <div class="animated fadeIn">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


    
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Pelanggan</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('pelanggan/create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i>Tambah
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="text-center">
                                <a href="{{ url('pelanggan/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ url('pelanggan/'.$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection