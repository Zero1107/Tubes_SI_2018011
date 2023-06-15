<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Transaksi</title>
  <style>
    .table-data {
      border-collapse: collapse;
      width: 100%;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      padding: 10px 20px;
      text-align: center;
    }

    .table-data tr th {
      background-color: #2c3e50;
      color: white;
    }

    .table-data tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-data tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <h3 text="center">Data Transaksi</h3>
  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal Transaksi</th>
        <th>Status</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($transaksi as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->data_pelanggan->nama_pelanggan }}</td>
        <td>{{ $item->tgl_transaksi }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->total }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="4" align="center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
</body>
</html>
