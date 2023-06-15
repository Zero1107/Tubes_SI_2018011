<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $pelanggan = Pelanggan::all();
        // return $transaksi;
        return view('transaksi/index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('transaksi/create', compact('pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_pelanggan' => 'required',
            'status' => 'required',
            'tanggal_transaksi' => 'required',
            'total' => 'required'
        ], [
            'id_pelanggan.required' => 'Nama Pelanggan Tidak Boleh Kosong',
            'status.required' => 'Status Pembayaran Harus Diisi (Bayar / Belum)',
            'tanggal_transaksi.required' => 'Tanggal Harus Diisi',
            'total.required' => 'Total Harus Diisi'
        ]);

        $transaksi = new Transaksi;
        $transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->tgl_transaksi = $request->tanggal_transaksi;
        $transaksi->status = $request->status;
        $transaksi->total = $request->total;
        $transaksi->save();

        return redirect('transaksi')->with('status', 'Data Transaksi Berhasil Ditambahkan!');
        
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $pelanggan = Pelanggan::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'status' => 'required',
            'tanggal_transaksi' => 'required',
            'total' => 'required'
        ], [
            'id_pelanggan.required' => 'Nama Pelanggan Tidak Boleh Kosong',
            'status.required' => 'Status Pembayaran Harus Diisi (Bayar / Belum)',
            'tanggal_transaksi.required' => 'Tanggal Harus Diisi',
            'total.required' => 'Total Harus Diisi'
        ]);

        $transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->tgl_transaksi = $request->tanggal_transaksi;
        $transaksi->status = $request->status;
        $transaksi->total = $request->total;
        $transaksi->save();

        return redirect('transaksi')->with('status', 'Data Transaksi Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('transaksi')->with('status', 'Data Transaksi Berhasil Dihapus!');
    }

    public function cetak()
    {
        $transaksi = Transaksi::all();
        $pdf = Pdf::loadview('transaksi.cetak', ['transaksi' => $transaksi]);
        return $pdf->download('Laporan Transaksi.pdf');
    }
}
