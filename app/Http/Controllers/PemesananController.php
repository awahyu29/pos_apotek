<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\suplier;
use App\Models\barang;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = pemesanan::all();
        return view('pemesanan.index',compact(
            'pemesanan'
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
        $suplier = suplier::all();
        return view('pemesanan.create',compact(
            'barang','suplier'
        ));
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
        pemesanan::create([
            'suplier'   => $data['suplier'],
            'nama'      => $data['nama'],
            'jumlah'    => $data['jumlah'],
            'harga_beli' => $data['harga_beli'],
            'ongkir'    => $data['ongkir'],
            'biaya'     => $data['jumlah'] * $data['harga_beli'] + $data['ongkir'],
            'status' => 1
        ]);

        toast()->success('Data have been succesfully saved!');
        return redirect()->route('pemesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesanan = pemesanan::find($id);
        $barang = barang::all();
        $suplier = suplier::all();
        return view('pemesanan.edit', compact(
            'pemesanan','barang','suplier'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $pemesanan = pemesanan::find($id);
        $pemesanan->update([
            'suplier'   => $data['suplier'],
            'nama'      => $data['nama'],
            'jumlah'    => $data['jumlah'],
            'harga_beli' => $data['harga_beli'],
            'ongkir'    => $data['ongkir'],
            'biaya'     => $data['jumlah'] * $data['harga_beli'] + $data['ongkir']
        ]);
        toast()->success('Success', 'Data have been succesfully updated!');
        return redirect('pemesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemesanan = pemesanan::find($id);
        $pemesanan->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
    }
}
