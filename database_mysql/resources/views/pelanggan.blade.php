@extends('main')

@section('title', 'TEMPLATE')
    



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
                    <li class="active"><i >Cetak</i></li>
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
                    <strong>TEMPLATE</strong>
                </div>
                <div class="pull-right">
                    <a href="" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i>Tambah
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Data 1</th>
                            <th>Data 2</th>
                            <th>Data 3</th>
                            <th>Data 4</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($collection as $item) --}}
                        <tr>
                            <td>Data 1</td>
                            <td>Data 2</td>
                            <td>Data 3</td>
                            <td>Data 4</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>


                                <form action="#" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                
                            </td>

                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

        
        



    </div>

</div>
@endsection