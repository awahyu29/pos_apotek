<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\barang_masuk;
use App\Models\pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = barang_masuk::all();
        return view('barangmasuk.index',compact(
            'barangmasuk'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemesanan = pemesanan::all();
        return view('barangmasuk.create', compact('pemesanan'));
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
        $pemesanan = pemesanan::where('nama','=',$data['nama'])
        ->where('status','=',1)
        ->first();
        $hargapemesanan = $pemesanan->biaya;
        barang_masuk::create([
            'nama'      => $data['nama'],
            'tgl_masuk'    => $data['tgl_masuk'],
            'jumlah'     => $data['jumlah'],
            'harga'     => $hargapemesanan
        ]);
        $barma = barang_masuk::first();
        $barang = Barang::where('nama','=', $data['nama'])->first();
        $jumbar = $barang->jumlah;
        $jumbarma = $barma->jumlah;
        $jumlah = $jumbar + $jumbarma;
        $barang->update([
            'jumlah'        => $jumlah
        ]);

        $pemesanan->update([
            'status'    => 2
        ]);

        toast()->success('Data have been succesfully saved!');
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangmasuk = barang_masuk::find($id);
        $pemesanan = pemesanan::all();
        return view('barangmasuk.edit', compact(
            'barangmasuk','pemesanan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $barangmasuk = barang_masuk::find($id);
        $barangmasuk->update($data);
        toast()->success('Success', 'Data have been succesfully updated!');
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = barang_masuk::find($id);
        $barangmasuk->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
    }
}
