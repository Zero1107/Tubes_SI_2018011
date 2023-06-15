@extends('main')

@section('title', 'Detail Transaksi')
    



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

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


    
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Detail Transaksi</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('detailtransaksi/create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i>Tambah
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status Transaksi Sebelumnya</th>
                            <th>Menu</th>
                            <th>Qyt</th>
                            {{-- <th class="text-center">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailTransaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->data_transaksi->status }}</td>
                            <td>{{ $item->data_menu->nama_menu }}</td>
                            <td>{{ $item->qyt }}</td>
                            {{-- <td class="text-center">
                                <a href="{{ url('detailtransaksi/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ url('detailtransaksi/'.$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                
                            </td> --}}

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection