<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        // return $supplier;
        return view('supplier/index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier/create');
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
            'nama_supplier' => 'required',
            'nama_makanan' => 'required',
            'qyt' => 'required',
            'harga' => 'required'
        ], [
            'nama_supplier.required' => 'Nama Supplier Tidak Boleh Kosong',
            'nama_makanan.required' => 'Nama Makanan Tidak Boleh Kosong',
            'qyt.required' => 'Qyt Harus Disi',
            'harga.required' => 'Harga Harus Diisi'
        ]);

        // return $request;

        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->nama_makanan = $request->nama_makanan;
        $supplier->qyt = $request->qyt;
        $supplier->harga = $request->harga;
        $supplier->save();

        return redirect('supplier')->with('status', 'Data Supplier Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('supplier/show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier/edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'nama_makanan' => 'required',
            'qyt' => 'required',
            'harga' => 'required'
        ], [
            'nama_supplier.required' => 'Nama Supplier Tidak Boleh Kosong',
            'nama_makanan.required' => 'Nama Makanan Tidak Boleh Kosong',
            'qyt.required' => 'Qyt Harus Disi',
            'harga.required' => 'Harga Harus Diisi'
        ]);

        // return $request;

        
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->nama_makanan = $request->nama_makanan;
        $supplier->qyt = $request->qyt;
        $supplier->harga = $request->harga;
        $supplier->save();

        return redirect('supplier')->with('status', 'Data Supplier Berhasil Ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('supplier')->with('status', 'Data Supplier Berhasil Dihapus!');
    }
}
