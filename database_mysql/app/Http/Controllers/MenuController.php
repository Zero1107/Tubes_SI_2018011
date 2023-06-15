<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //Nampilkan data
    {
        $menu = Menu::all();
        return view('menu/index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //membuat tampilan tambah data
    {
        return view('menu/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //2menambahkan data
    {

        // $request->validate([
        //     'nama_menu' => 'required',
        //     'jenis_menu' => 'required',
        //     'deskripsi' => 'required',
        //     'harga' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        // ], [
        //     'nama_menu.required' => 'Menu Tidak Boleh Kosong',
        //     'jenis_menu.required' => 'Jenis Menu Tidak Boleh Kosong',
        //     'deskripsi.required' => 'Deskripsi Menu Tidak Boleh Kosong',
        //     'harga.required' => 'Harga Menu Tidak Boleh Kosong',
        //     'image.required' => 'Harus Berupa Gambar'
        // ]);

        $menu = New Menu;
        $menu->nama_menu = $request->nama_menu;
        $menu->jenis = $request->jenis;
        $menu->deskripsi = $request->deskripsi;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('fotomenu/', $filename);
            $menu->image = $filename;
        }
        $menu->harga = $request->harga;
        $menu->save();

        return redirect('menu')->with('status', 'Data Menu Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu) //menampilkan detail data
    {
        return view('menu/show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu) //4menampilkan tampilan edit
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu) //4fungsi updatenya
    {
        $menu->nama_menu = $request->nama_menu;
        $menu->jenis = $request->jenis;
        $menu->deskripsi = $request->deskripsi;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('fotomenu/', $filename);
            $menu->image = $filename;
        }
        $menu->harga = $request->harga;
        $menu->save();

        return redirect('menu')->with('status', 'Data Menu Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu) //3menghapus data
    {
        $menu->delete();
        return redirect('menu')->with('status', 'Data menu Berhasil Dihapus!');
    }

    public function cetak() //5mencetak data ke pdf/report
    {
        $menu = Menu::all();
        $pdf = Pdf::loadview('menu.cetak', ['menu' => $menu]);
        return $pdf->download('Laporan Menu.pdf');
    }
}
