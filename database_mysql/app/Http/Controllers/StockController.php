<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = Stock::all();
        // return $stock;
        return view('stock/index', compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock/create');
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
            'jumlah' => 'required',
            'waktu_stock' => 'required'
        ], [
            'jumlah.required' => 'Jumlah Stock Tidak Boleh Kosong',
            'waktu_stock.required' => 'Waktu Stock Tidak Boleh Kosong'
        ]);

        // return $stock;

        $stock = new Stock;
        $stock->jumlah = $request->jumlah;
        $stock->waktu_stock = $request->waktu_stock;
        $stock->save();

        return redirect('stock')->with('status', 'Data Stock Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('stock/edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'jumlah' => 'required',
            'waktu_stock' => 'required'
        ], [
            'jumlah.required' => 'Jumlah Stock Tidak Boleh Kosong',
            'waktu_stock.required' => 'Waktu Stock Tidak Boleh Kosong'
        ]);

        // return $stock;
        $stock->jumlah = $request->jumlah;
        $stock->waktu_stock = $request->waktu_stock;
        $stock->save();

        return redirect('stock')->with('status', 'Data Stock Berhasil Ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect('stock')->with('status', 'Data Stock Berhasil Dihapus!');
    }
}
