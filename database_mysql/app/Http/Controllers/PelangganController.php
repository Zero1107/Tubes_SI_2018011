<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pelanggan = Pelanggan::all();
        // return $pelanggan;
        return view('pelanggan/index', compact('pelanggan'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan/create');
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
            'nama_pelanggan' => 'required',
            'jenis_kelamin' => 'required'
        ], [
            'nama_pelanggan.required' => 'Nama Tidak Boleh Kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diisi'
        ]);

        // return $request;

        $pelanggan = new Pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        return redirect('pelanggan')->with('status', 'Data Pelanggan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {

        return $pelanggan;
        return view('pelanggan/show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        // $pelanggan = Pelanggan::all();
        return view('pelanggan.edit', compact('pelanggan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'jenis_kelamin' => 'required'
        ], [
            'nama_pelanggan.required' => 'Nama Tidak Boleh Kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diisi'
        ]);

        // return $request;

        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        return redirect('pelanggan')->with('status', 'Data Pelanggan Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('pelanggan')->with('status', 'Data Pelanggan Berhasil Dihapus!');
    }

    // public function cetak(){
    //     $pelanggan = Pelanggan::get();
    //     return view('pelanggan.cetak', compact('pelanggan'));
    // }

    public function cetak()
    {
        $pelanggan = Pelanggan::all();
        $pdf = Pdf::loadview('pelanggan.cetak', ['pelanggan' => $pelanggan]);
        return $pdf->download('Laporan Pelanggan.pdf');
    }


}
