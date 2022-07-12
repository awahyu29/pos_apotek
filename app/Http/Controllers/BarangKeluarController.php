<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\barang_keluar;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = barang_keluar::all();
        return view('barangkeluar.index',compact(
            'barangkeluar'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        return view('barangkeluar.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $barang = Barang::where('nama','=', $data['nama'])->first();
        barang_keluar::create([
            'nama'      => $data['nama'],
            'jumlah'     => $data['jumlah'],
            'harga'     => $barang->harga * $data['jumlah']
        ]);

        $barma = barang_keluar::first();
        $jumbar = $barang->jumlah;
        $jumbarma = $barma->jumlah;
        $jumlah = $jumbar - $jumbarma;
        $barang->update([
            'jumlah'        => $jumlah
        ]);

        toast()->success('Data have been succesfully saved!');
        return redirect()->route('barangkeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(barang_keluar $barang_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangkeluar = barang_keluar::find($id);
        $barang = barang::all();
        return view('barangkeluar.edit', compact(
            'barangkeluar','barang'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $barangkeluar = barang_keluar::find($id);
        $barangkeluar->update($data);
        toast()->success('Success', 'Data have been succesfully updated!');
        return redirect()->route('barangkeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = barang_keluar::find($id);
        $barangkeluar->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
    }

    public function cetak()
    {
        $barangkeluar = barang_keluar::all();
        $pdf = PDF::loadview('barangkeluar_nota',['barangkeluar'=>$barangkeluar]);
        return $pdf->download('nota_barangkeluar');
    }
}
