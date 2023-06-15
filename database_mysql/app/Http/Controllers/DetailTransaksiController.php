<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Menu;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $menu = Menu::all();
        $detailTransaksi = DetailTransaksi::all();
        // return $detailtransaksi;
        return view('detailtransaksi/index', compact('detailTransaksi', 'menu', 'transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = Transaksi::all();
        $menu = Menu::all();
        $detailTransaksi = DetailTransaksi::all();
        return view('detailtransaksi/create', compact('detailTransaksi', 'transaksi' , 'menu'));
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
            'id_transaksi' => 'required',
            'id_menu' => 'required',
            'qyt' => 'required'
        ], [
            'id_transaksi.required' => 'Status Transaksi Sebelumnya Tidak Boleh Kosong',
            'id_menu.required' => 'Nama Menu Harus Diisi',
            'qyt.required' => 'Qyt Harus Di isi'
        ]);

        $detailTransaksi = new DetailTransaksi;
        $detailTransaksi->id_transaksi = $request->id_transaksi;
        $detailTransaksi->id_menu = $request->id_menu;
        $detailTransaksi->qyt = $request->qyt;
        $detailTransaksi->save();

        return redirect('detailtransaksi')->with('status', 'Data Detail Transaksi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        // return view('detailtransaksi/show', compact('detailTransaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        // $transaksi = Transaksi::all();
        // $menu = Menu::all();
        // $detailTransaksi = DetailTransaksi::all();
        // return view('detailtransaksi/edit', compact('detailTransaksi', 'transaksi', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        // $request->validate([
        //     'id_transaksi' => 'required',
        //     'id_menu' => 'required',
        //     'qyt' => 'required'
        // ], [
        //     'id_transaksi.required' => 'Status Transaksi Sebelumnya Harus Diisi',
        //     'id_menu.required' => 'Nama Menu Harus Diisi',
        //     'qyt.required' => 'Qyt Harus Di isi / Boleh Diubah'
        // ]);

        // $detailTransaksi->id_transaksi = $request->id_transaksi;
        // $detailTransaksi->id_menu = $request->id_menu;
        // $detailTransaksi->qyt = $request->qyt;
        // $detailTransaksi->save();

        // return redirect('detailtransaksi')->with('status', 'Data Detail Transaksi Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        DetailTransaksi::destroy($detailTransaksi->id);
        return redirect('detailtransaksi')->with('status', 'Data Detail Transaksi Berhasil Dihapus!');
    }
}
